<?php

class Bluecare_Catalog_Form extends Zend_Form{
	
	protected $_form_name;
	protected $_enfermedad;
	protected $_usuario;
	protected $_decorators_default 	= array('Composite');
	protected $_label_submit = 'Guardar';
	protected $_idpaciente;
	
	
	public function render($view = NULL){
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
		
		$this->setDecorators(array(
				'FormElements',
				'Form',
				new Zend_Form_Decorator_FormErrors(array('placement' => 'prepend',
														'ignoreSubForms'=>true,
														'markupElementLabelEnd'=> '</b>',
														'markupElementLabelStart'=> '<b>',
														'markupListEnd' => '</div>',
														'markupListItemEnd'=>'</span>',
														'markupListItemStart'=>'<span>',
														'markupListStart'=>"<div class='alert-error'>"
														)),
			));
		
		$webservice_class = new Bluecare_Webservice_Epidemiologia();
		$catalog_info = $webservice_class->getFormResult($this->_enfermedad);
		
		$view = $this->getView();
		$view->catalog_name = $catalog_info->Descripcion;
		$sections = $this->getSections($catalog_info);
		if (!is_null($sections)){
			//$this->addElement('hidden','CODIGO_APLICACION',array('value' => $catalog_info->Codigo));
			$this->_processSections($sections);
			$concepts = $this->getConceptNames($sections);
			
			$concepts_data = new Zend_Session_Namespace('concepts');
			$concepts_data->info = $concepts;
			
			
		}else{
			$view->no_form = 'No existen datos para esta enfermedad';
		}
		
		
	
	}
	
	public function getSections($catalog_info){
		return $catalog_info->Secciones->SeccionDTO;
	}
	
	public function getConceptNames($sections){
		
		$concepts = array();

		foreach ($sections as $key => $questions){
			
			if (is_array($questions->Preguntas->PreguntaDTO)){
				foreach ($questions->Preguntas->PreguntaDTO as $key => $question){
					$concepts[] = $question->Concepto;
				}
			}else{
				$concepts[] = $questions->Preguntas->PreguntaDTO->Concepto;
			}	
		}
		
		return $concepts;
	}
	
	/**
	 * 
	 * Método para procesar las secciones y generar los campos
	 * @param unknown_type $sections
	 */
	protected function _processSections($sections){		
		/*
		 * TEST CODE
		 * Quitar el foreach e iterar de 1 en 1
		 * 	$section_name = $sections[4]->Nombre;
			$this->_processQuestions($sections[6]);
		 */
		$sections_array = array();
		$total_sections = count($sections);
		$inc_sec = 1;
		foreach ($sections as $key => $questions){
			$section_name = $questions->Nombre;
			$sections_array[$this->filterName($section_name)] = $section_name;
			//$this->addElement('text',$section_name,array('decorators' => array('SectionSeparator')));
			//$element_group[] = $section_name . $inc;	
			//$elements[] = $section_name;											 
			if (!is_null($questions->Preguntas)){
				$question_elements = $this->_processQuestions($questions);
				
				if ($inc_sec == $total_sections){
					$this->addElement ( 'submit', $this->_label_submit, array ('class' => 'btn btn-primary btn-large', 'decorators' => array ('Submit' ) ) );
					$question_elements = array_merge($question_elements,array($this->_label_submit));
				}
				$this->addDisplayGroup($question_elements, $section_name);
				
				$group_fields = $this->getDisplayGroup($section_name);
				$group_fields->removeDecorator('HtmlTag');
				$group_fields->removeDecorator('DtDdWrapper');
				
				$decorators['Group'] = new Bluecare_Form_Decorator_Group($this->filterName($section_name));
				$group_fields->addDecorators($decorators);
				$group_fields->setLegend($section_name);	
			}
			$inc_sec++;							 
		}
		$view = $this->getView();
		$view->tabs = $sections_array;
		
		
}
	
	
	/**
	 * 
	 * Metodo para generar los campos de las preguntas
	 * que el WS provee
	 * @param unknown_type $questions
	 */
	protected function _processQuestions($quest){
		
		$elements = array();
		
		if (is_array($quest->Preguntas->PreguntaDTO)){
			foreach ($quest->Preguntas->PreguntaDTO as $key => $question){
			
				$label 			= $question->Nombre;
				$tipo_pregunta 	= $question->TipoPregunta;
				$options		= array();
				$element 		= new stdClass();
				
				switch ($tipo_pregunta){
						
					case 'ListaDesplegable':
						$element->html_type = 'select';
						$element->multioptions = $this->getCatalogoOpciones($question);
						break;
				
					case 'Fecha':
						$element->html_type = 'text';
						$element->decorator = 'Calendar';
						break;
				
					case 'Abierta':
						$element->html_type = 'text';
						break;
				
					case 'Cerrada':
					case 'Mixta':	
						if (!is_null($question->Opciones->OpcionDTO)){
							$element->html_type = 'select';
							$element->multioptions = $this->_getMultiOptions($question->Opciones->OpcionDTO);
						}else{
							$element->html_type = 'text';
						}
						
						break;
				}
				
				$field_required = $question->Obligatoria;
				if ($field_required){
					$element->required = TRUE;
				}
				
				$element->label = $label;
				$element->value = $question->ValorDefecto;
				$element->name = $question->Concepto;
			
				$this->_processElement($element);
				$elements[] = $this->filterName($element->name);
			}
		}else{
				$label 			= $quest->Preguntas->PreguntaDTO->Nombre;
				$tipo_pregunta 	= $quest->Preguntas->PreguntaDTO->TipoPregunta;
				$options		= array();
				$element 		= new stdClass();
				
				switch ($tipo_pregunta){
						
					case 'ListaDesplegable':
						$element->html_type = 'select';
						$element->multioptions = $this->getCatalogoOpciones($quest->Preguntas->PreguntaDTO);
						break;
				
					case 'Fecha':
						$element->html_type = 'text';
						$element->decorator = 'Calendar';
						break;
				
					case 'Abierta':
						$element->html_type = 'text';
						break;
				
					case 'Cerrada':
					case 'Mixta':	
						if (!is_null($question->Opciones->OpcionDTO)){
							$element->html_type = 'select';
							$element->multioptions = $this->_getMultiOptions($quest->Preguntas->PreguntaDTO->Opciones->OpcionDTO);
						}else{
							$element->html_type = 'text';
						}
						
						break;
				}
				
				$field_required = $question->Obligatoria;
				if ($field_required){
					$element->required = TRUE;
				}
				
				$element->label = $label;
				$element->value = $quest->Preguntas->PreguntaDTO->ValorDefecto;
				$element->name = $quest->Preguntas->PreguntaDTO->Concepto;
				
				$this->_processElement($element);
				
				$elements[] = $this->filterName($element->name);
		}
		
		return $elements;
	}
	
	protected function _processElement($element){
		$options = array();
		
		if($element->required){
			//$options['field_attribs'] = array('data-required' => 'true');
			$options['required'] = TRUE;
			//$options['validators'] = array(array('Digits', false,array('messages' => array('notDigits' => 'Only digits are allowed here'))));
		}
			
		$options['label'] = $element->label;
			
		if ($element->html_type == 'select') {
			//$element->multioptions = array_merge(array('' => ''),$element->multioptions);
			$options['multiOptions'] = $element->multioptions;
			$options['registerInArrayValidator'] = false;
		}
		
		$options ['decorators'] = $this->_decorators_default;
		if (!is_null($element->decorator)){
			$decorador = $element->decorator;
			$options['decorators'] = array($decorador);
		}else{
			$options['decorators'] = $this->_decorators_default;
		}

		$options['disableLoadDefaultDecorators'] = true;
		//Zend_Debug::dump($options);
		$concept_names = new Zend_Session_Namespace('concepts');
		$concept_names->data[] = $element->name;
		$element_object = $this->createElement($element->html_type, $element->name, $options );	
		$element_object->clearFilters();
		$this->addValuePacientes($element);
		$element_object->setValue($element->value);
		$element = $this->addElement($element_object);
	
		return $element->name;
	}
	
	/**
	 * 
	 * Metodo para agregar valores por default a los campos del paciente
	 * @param unknown_type $element
	 */
	protected function addValuePacientes(& $element){
		
		$paciente_data = $this->getPacienteInfo();								
		foreach ($paciente_data as $key => $value){
			$pattern = "/^{$key}+\./";
			
			if (preg_match($pattern, $element->name)){
				$element->value = $value;
			}else{
				//$element->value = '';
			}
		}						
								
						
	}
	
	
	/**
	 * 
	 * Metodo para obtener las opciones de los campos de tipo pregunta "Cerrada"
	 * @param unknown_type $opciones_object
	 */
	protected function _getMultiOptions($opciones_object){
		$opciones = $opciones_object;
		$multioptions = array();
		if(is_array($opciones)){
			foreach ($opciones as $key => $value){
				$multioptions[$value->Orden] = $value->Texto;
			}	
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
		
		
		if (property_exists($catalogo->Catalogo,'Nombre')){
			$bluecare_ws = new Bluecare_Webservice_Epidemiologia();
			$catalog_options = $bluecare_ws->getCatalogOptions($catalogo->Catalogo);
		}else{
			$catalog_options = $this->_getMultiOptions($catalogo->Opciones->OpcionDTO);
		}
		
		
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
	
	
	public function setUsuario($id_usuario){
		$this->_usuario = $id_usuario;
	}
	
	/**
	 *
	 * Metodo para agregar atributos a una forma
	 * Ej: array('class' => 'form-horizontal')
	 * Se pasara este arreglo desde el controlador
	 * @param array $attribs
	 */
	public function setFormAttribs($attribs){
		if (is_array($attribs) && !is_null($attribs)){
			$this->_attribs = $attribs; //Atributos para la forma
		}
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
	
	public function getPacienteInfo(){

		$element_values = array();
		$form_model = new Bluecare_Model_Base();
		$paciente_data = $form_model-> getPacienteData($this->_idpaciente);
		$tipo_edades = $this->getTypeAges($paciente_data['fecha_nacimiento']);
		
		
		$element_values['APPATERNO'] = $paciente_data['app'];
		$element_values['APMATERNO'] = $paciente_data['apm'];
		$element_values['NOMBRE'] = $paciente_data['nombre'];
		$element_values['FECHA_NACIMIENTO'] = $this->_modifyTypeDate($paciente_data['fecha_nacimiento']);
		$element_values['EDAD_ANIOS'] = $tipo_edades['anios'];
		$element_values['EDAD_MESES'] = $tipo_edades['meses'];
		$element_values['EDAD_DIAS'] = $tipo_edades['dias'];
		$element_values['DOMICILIO_CALLE'] = $paciente_data['calle'];
		$element_values['DOMICILIO_COLONIA'] = $paciente_data['colonia'];
		$element_values['SEXO'] = $this->_getSexoPaciente($paciente_data['sexo']);
		//$element_values['ESTADO'] = $paciente_data['entidad'];
		//$element_values['CIUDAD'] = $this->_getCity($paciente_data['municipio'], $paciente_data['entidad']);
		$element_values['CIUDAD'] = $paciente_data['municipio'];
		
		
		return $element_values;
	}
	
	protected function getTypeAges($year){
		$edades = array();
		
		$anios = date('Y') - $year;
		$anios_meses = $anios * 12;
		$anios_dias = $anios * 365;
		
		$edades['anios'] = $anios;
		$edades['meses'] = $anios_meses;
		$edades['dias'] = $anios_dias;
		
		return $edades;
		
	}
	
	protected function _getCity($id_ciudad,$id_estado){
		$bluecare_model = new Bluecare_Model_Base();
		$form_id_ciudad = $bluecare_model->getCity($id_ciudad, $id_estado);
		
		return $form_id_ciudad;
	}
	
	protected function _getSexoPaciente($sexo){
		$result = '';
		
		if ($sexo == 'h'){
			$result = '1';
		}else if ($sexo == 'm'){
			$result = '2';
		}
		
		return $result;
	}
	
	protected function _modifyTypeDate($date){
		$array_date = explode('-', $date);
		$new_date = $array_date[2] . '/' . $array_date[1]  . '/' . $array_date[0] /*. ' 00:00:00'*/;
		
		return $new_date;
	}
	
	public function setPaciente($idpaciente){
		$this->_idpaciente = $idpaciente;
	}
}