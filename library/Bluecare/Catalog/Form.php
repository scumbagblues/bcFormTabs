<?php

class Bluecare_Catalog_Form extends Zend_Form{
	
	protected $_form_name;
	protected $_form_attribs;
	protected $_enfermedad;
	
	
	public function render($view){
		return parent::render($view);	
	}
	
	public function init(){
		$this->setName('frm' . $this->_form_name);
		$this->setAction('#');
		
		
		$this->addElementPrefixPaths(array(
			'decorator' => array(
				'Bluecare_Form_Decorator' => 'Bluecare/Form/Decorator/'
				)
			)
		);
		
		$webservice_class = new Bluecare_Webservice_Epidemiologia();
		$catalog_info = $webservice_class->getFormResult($this->_enfermedad);
		
		$view = $this->getView();
		$view->catalog_name = $catalog_info->Descripcion;
		
		$sections = $this->getSections($catalog_info);
		
		//Next step
		//$this->_processSections($sections);
		
	
	}
	
	public function getSections($catalog_info){
		return $catalog_info->Secciones->SeccionesDTO;
	}
	
	/**
	 * 
	 * Método para procesar las secciones y generar los campos
	 * @param unknown_type $sections
	 */
	protected function _processSections($sections){
		foreach ($sections as $key => $questions){
			$section_name = $questions->Nombre;
			
			foreach ($questions->PreguntaDTO as $key => $quest){
					
			}
		}
	}
	
	/**
	 * 
	 * Metodo para generar los campos de las preguntas
	 * que el WS provee
	 * @param unknown_type $questions
	 */
	protected function _processQuestions($questions){
		$label 			= $questions->Nombre;
		$tipo_pregunta 	= $questions->TipoPregunta;
		$options		= array();
		$element 		= new stdClass();
		
		switch ($tipo_pregunta){
			
			case 'ListaDesplegable':
				$element->html_type = 'select';
				$element->multioptions = $this->getCatalogoOpciones($questions->Catalogo);
			break;

			case 'Fecha':
				$element->html_type = 'text';
				$element->decorator = 'Calendar';
			break;

			case 'Abierta':
				$element->html_type = 'text';
			break;

			case 'Cerrada':
				$element->html_type = 'select';
				$element->multioptions = $this->_getMultiOptions($questions->Opciones->OpcionDTO);
			break;	
		}
		
		$field_required = $questions->Obligatoria;
		if ($field_required){
			$element->required = TRUE;
		}
		
		$element->name = $questions->Concepto;
		
		return $element;
	}
	
	
	/**
	 * 
	 * Metodo para obtener las opciones de los campos de tipo pregunta "Cerrada"
	 * @param unknown_type $opciones_object
	 */
	protected function _getMultiOptions($opciones_object){
		$opciones = $opciones_object;
		$multioptions = array();
		
		foreach ($opciones as $key => $value){
			$multioptions[$value->Orden] = utf8_encode($value->Texto);
		}
		
		return $multioptions;
	}
	
	/**
	 * 
	 * Metodo para obtener las opciones del catalogo
	 * de los campos con multiples opciones
	 * @param unknown_type $catalogo
	 */
	public function getCatalogoOpciones($catalogo){
		$bluecare_ws = new Bluecare_Webservice_Epidemiologia();
		$catalog_options = $bluecare_ws->getCatalogOptions($catalogo);
		
		return $catalog_options;
	}
	/**
	 * 
	 * Se asigna el nombre a la forma
	 * @param string $name
	 */
	public function setFormName($name){
		$this->_form_name = $name;	
	}
	
	/**
	 * Se asigna el codigo del a enfermedad para 
	 * generar la forma
	 * @param string $cie_id_enfermedad
	 */
	public function setEnfermedad($cie_id_enfermedad){
		$this->_enfermedad = $cie_id_enfermedad;
	}
	
	/**
	 *
	 * Metodo para agregar atributos a una forma
	 * Ej: array('class' => 'form-horizontal')
	 * Se pasara este arreglo desde el controlador
	 * @param array $attribs
	 */
	public function setFormAttribs($attribs){
		$this->_form_attribs = $attribs;
	}
	
	/**
	 *
	 * Se le indica si se enviaran archivos por el formulario
	 * @param bool $flag
	 */
	public function setEncTypeMultipart($flag = false){
		if ($flag){
			$this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
		}
	}
}