<?php

class Weezer_Form_Decorator_SelectPaciente extends Zend_Form_Decorator_Abstract
	implements Weezer_Form_Decorator_Interface{

	public function getDecoratorInfo(){
		
		$select_paciente[''] = 'Nuevo paciente';	
		$pacientes_table = new Pacientes_Model_Pacientes();
		$pacientes = $pacientes_table->fetchAll();
		
		foreach ($pacientes->toArray() as $key => $paciente){
			$nombre_paciente =	$paciente['pac_nexpediente'] . ' ' . 
							   	utf8_encode($paciente['pac_nombre'] . ' ' . $paciente['pac_apellidoP'] . ' ' . $paciente['pac_apellidoM']);
							   	
			$select_paciente[$paciente['pac_id']] = $nombre_paciente;
		}
		
		return $select_paciente;
	}
	
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
	
	public function render($content){
		$element = $this->getElement ();
		$element->helper = 'formSelect';
		$helper = $element->helper;
		
		$form_table 	= new $element->table_name ();
		$table_prefix 	= $form_table->_table_prefix;


		$label = '';
		$html_select = "<div class='control-group'>";
		
		if ($element->isRequired ()) {
			$label .= '*';
		}
		$label .= $element->getLabel ();
		$label .= ':';
		
		$html_label = $element->getView ()->formLabel ( $element->getName (), $label, array ('class' => 'control-label' ) );
		
		$select_pacientes 	= $this->getDecoratorInfo();
		
		$attribs 			= (is_array($element->field_attribs)) ? array_merge($element->field_attribs, array('class' => 'input-medium')) : array('class' => 'input-medium');
		$pacientes 			= $element->getView()->$helper( $element->getName (), $element->getValue (), $attribs, $select_pacientes );
		$mensajesError 		= $this->getErrorMessages($element);
		
		$html_select .= $html_label;
		$html_select .= "<div class='controls'><div id='city'>{$pacientes}{$mensajesError}</div></div></div>";

		return $html_select;
	}
}