<?php
/**
 * 
 * Decorador para que los campos DATETIME se agregue un calendario
 * @author rcortes
 *
 */
class Bluecare_Form_Decorator_Calendar extends Zend_Form_Decorator_Abstract{
	
	public function getErrorMessages($element){
		$element = $this->getElement();
		$messages = $element->getMessages();
		
		if (empty ( $messages )) {
			return '';
		}
		//Se settea los elementos html de inicio y fin para el html de errores
		$form_errors_helper = $element->getView()->getHelper('formErrors');
		$form_errors_helper	->setElementStart('<div class="alert alert-error alert-font-size">') 
               				->setElementSeparator('<br />') 
               				->setElementEnd('</div>'); 

		return $element->getView()->formErrors( $messages );
		
	}
	
	public function getDecoratorInfo(){
		
	}
	
	public function render($content){
		$element = $this->getElement();
		$options = array();
		$calendar_element = new ZendX_JQuery_Form_Element_DatePicker($element->getName(), array(
														    'jQueryParams' => array(
														        'dateFormat' => 'dd/mm/yy',
																'nextText' => 'Siguiente',
																'prevText' => 'Anterior',
																'nextText' => 'Siguiente',
																'currentText' => 'Hoy',
																'changeMonth' => true,
																'changeYear'=> true,
																'yearRange' => 'c-120:c+10',
																'monthNames' => array('Enero', 'Febrero', 
																					   'Marzo', 'Abril', 'Mayo'
																					 , 'Junio', 'Julio', 'Agosto'
																					 , 'Septiembre', 'Octubre', 'Noviembre'
																					 , 'Diciembre'),
																'monthNamesShort' => array('Ene','Feb','Mar','Abr'
																					 	   ,'May','Jun','Jul','Ago'
																					 	   ,'Sep','Oct','Nov','Dic'),					 
																'dayNamesMin' =>  array('Do','Lu','Ma','Mi','Ju','Vi','Sá'),
																'timeFormat' => 'hh:mm:ss',
																'hourText' => 'Hora',
																'minuteText' => 'Minutos',
																'secondText' => 'Segundos',
																'closeText' => 'Seleccionar hora'					 	   					 
														    ),
														   
														));
		$calendar_element->setAttribs($element->field_attribs);												
		$calendar_element->setValue($element->getValue());												
		$label = '';
		$html_select = "";
		
		if ($element->isRequired ()) {
			$label .= '*';
		}
		$label .= $element->getLabel ();
		
		
		$html_label = $element->getView ()->formLabel ( $element->getName (), $label, array ('class' => 'control-label' ) );
		
		$this->removeDecoratorsPicker($calendar_element);

		$html_select .= "<span class='span6 show-grid'>{$html_label} {$calendar_element}</span>";

		return $html_select;
		
	}
	
	protected function removeDecoratorsPicker($element){
		$decorators = array('Description','HtmlTag','Label');      
		foreach ($decorators as $decorator){
         	$element->removeDecorator($decorator);
         }                 
	}
}