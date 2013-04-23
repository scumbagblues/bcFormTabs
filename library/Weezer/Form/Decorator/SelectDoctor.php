<?php

class Weezer_Form_Decorator_SelectDoctor extends Zend_Form_Decorator_Abstract
	implements Weezer_Form_Decorator_Interface{
	
	protected $_doctor_table = "ListaEspera_Model_Medicos";
	
	
	public function getDecoratorInfo(){
		$doctor_table = new $this->_doctor_table();
		
		$select_doctor[''] = '';
		$where = "usu_especialidad <> 'Recepción' AND usu_especialidad <> 'Trabajo Social'";
		
		$doctores = $doctor_table->fetchAll($where);
		
		foreach ($doctores->toArray() as $key => $doctor){
			$select_doctor[$doctor['usu_id']] = utf8_encode($doctor ['usu_nombre']);
		}
		
		return $select_doctor;
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
	
	public function render($content) {

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
		
		$select_doctores 	= $this->getDecoratorInfo();
		//var_dump($select_doctores);die;
		$attribs 			= (is_array($element->field_attribs)) ? array_merge($element->field_attribs, array('class' => 'input-medium')) : array('class' => 'input-medium');
		$doctores 			= $element->getView()->$helper( $element->getName (), $element->getValue (), $attribs, $select_doctores );
		$mensajesError 		= $this->getErrorMessages($element);
		
		$html_select .= $html_label;
		$html_select .= "<div class='controls'><div id='city'>{$doctores}{$mensajesError}</div></div></div>";

		return $html_select;
	}
}