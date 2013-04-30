<?php
/**
 * 
 * Decorador para que los campos DATETIME se agregue un calendario
 * @author rcortes
 *
 */
class Weezer_Form_Decorator_Calendar extends Zend_Form_Decorator_Abstract
implements Weezer_Form_Decorator_Interface{
	
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
		
	}
	
	public function render($content){
		$element = $this->getElement();
		$options = array();
		$calendar_element = new ZendX_JQuery_Form_Element_DatePicker($element->getName(), array(
														    'jQueryParams' => array(
														        'dateFormat' => 'yy-mm-dd',
																'nextText' => 'Siguiente',
																'prevText' => 'Anterior',
																'nextText' => 'Siguiente',
																'currentText' => 'Hoy',
																'monthNames' => array('Enero', 'Febrero', 
																					   'Marzo', 'Abril', 'Mayo'
																					 , 'Junio', 'Julio', 'Agosto'
																					 , 'Septiembre', 'Octubre', 'Noviembre'
																					 , 'Diciembre'),
																'dayNamesMin' =>  array('Do','Lu','Ma','Mi','Ju','Vi','Sá'),					 
														    ),
														   
														));
		$label = '';
		$html_select = "<div class='control-group'>";
		
		if ($element->isRequired ()) {
			$label .= '*';
		}
		$label .= $element->getLabel ();
		$label .= ':';
		
		$html_label = $element->getView ()->formLabel ( $element->getName (), $label, array ('class' => 'control-label' ) );
		
		$this->removeDecoratorsPicker($calendar_element);
		
	   	$mensajesError = $this->getErrorMessages($element);
		$html_select .= $html_label;
		$html_select .= "<div class='controls'>{$calendar_element}{$mensajesError}</div></div>";

		return $html_select;
		
	}
	
	protected function removeDecoratorsPicker($element){
		$decorators = array('Description','HtmlTag','Label');      
		foreach ($decorators as $decorator){
         	$element->removeDecorator($decorator);
         }                 
	}
}