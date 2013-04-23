<?php

class Weezer_Form_Decorator_SelectCiudades extends Zend_Form_Decorator_Abstract{
	
	
	public function getErrorMessages($element){
	   //mensajes de error
		$messages = $element->getMessages ();
		$mensajesError = '';
		if (!empty ( $messages ))
		{
			//Se settea los elementos html de inicio y fin para el html de errores
    		$form_errors_helper = $element->getView()->getHelper('formErrors');
			$form_errors_helper->setElementStart('<div class="alert alert-error alert-font-size">') 
            	->setElementSeparator('<br />') 
               	->setElementEnd('</div>'); 
			$mensajesError = $element->getView()->formErrors($messages);
		}
		
		return $mensajesError;
	}
	
	public function getDecoratorInfo(){
		$element 		= $this->getElement ();
		$form_table 	= new $element->table_name ();
		$table_prefix 	= $form_table->_table_prefix;
		
		if (!is_null($element->form_data)){
			$id_estado = $element->form_data[$table_prefix .'_idestado'];
		}else{
			$id_estado = NULL;
		}
		$ciudades_model = new Ciudades_Model_Ciudades();
		if (!is_null($id_estado)){
			$where = "ciu_activo = '1' AND ciu_idestado = '{$id_estado}'";
		}else{
			$where = "ciu_activo = '1'";
		}
		$ciudades = $ciudades_model->fetchAll($where,'ciu_nombre');
		$valores_select_ciudades = array();
		//valor vacio por default
		$valores_select_ciudades[''] = '';
		foreach ($ciudades->toArray() as $ciudad){
			$valores_select_ciudades[$ciudad['ciu_id']] = utf8_encode($ciudad['ciu_nombre']);
		}
	
		return $valores_select_ciudades;
	}
	
	public function render($content) {
		
		$element = $this->getElement ();
		$element->helper = 'formSelect';
		$helper = $element->helper;
		
		$label = '';
		$html_select = "<div class='control-group'>";
		
		if ($element->isRequired ()) {
			$label .= '*';
		}
		$label .= $element->getLabel ();
		$label .= ':';
		
		$html_label = $element->getView ()->formLabel ( $element->getName (), $label, array ('class' => 'control-label' ) );
		$ciudades = $this->getDecoratorInfo();
		$attribs 		= (is_array($element->field_attribs)) ? array_merge($element->field_attribs, array('class' => 'span2')) : array('class' => 'span2');
		$select_ciudades = $element->getView()->$helper($element->getName(),$element->getValue(),$attribs,$ciudades);

	   	$mensajesError = $this->getErrorMessages($element);
		$html_select .= $html_label;
		$html_select .= "<div class='controls'><div id='city'>{$select_ciudades}{$mensajesError}</div></div></div>";
	
		return $html_select;
	}
}