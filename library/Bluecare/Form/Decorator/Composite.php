<?php
/**
 * 
 * Clase que sirve de decorador principal para las formas de epidemiologia
 * @author rcortes
 *
 */
class Bluecare_Form_Decorator_Composite extends Zend_Form_Decorator_Abstract{
	protected $_placement = 'APPEND';
	/**
	 * 
	 * Metodo para crear la etiqueta del campo
	 */
	public function buildLabel(){
		$label = '';
		$element = $this->getElement();
		
		//Si el elemento es obligatorio antepone un asterisco
		if ($element->isRequired ()) {
			$label .= '* ';
		}
		$label = $label . $element->getLabel();
		$html_label = $element->getView ()->formLabel ( $element->getName (), ($label));
		
		return $html_label;
	}
	
	/**
	 * 
	 * Metodo para crear el input dependiendo
	 * los parametros enviados
	 */
	public function buildinput(){
		$element 	= $this->getElement();//Se obtiene el Zend_Form_Element_Text
		$helper 	= $element->helper;//Se obtiene el helper que crea el input "formText", "formSelect" ..etc

		switch ($helper){
			case 'formText':
				$html_element = $element->getView()->$helper( $element->getName (), $element->getValue (), $element->field_attribs );
				break;
			
			case 'formSelect':
				
				$html_element = $element->getView()->$helper($element->getName(), $element->getValue(), $element->field_attribs, $element->options);
			break;
			case 'formCheckbox':
				$options = $element->getAttribs();
				$element->checked_options = $options['options'];
				$html_element = $element->getView()->$helper($element->getName(), $element->getValue(), $element->field_attribs, $element->checked_options);
			break;
			
			default:
				$html_element = $element->getView()->$helper( $element->getName(), $element->getValue(),  $element->field_attribs );
		}
		
		$label = $this->buildLabel();
		
		$html_element = "<span class='span6 show-grid'>{$label} {$html_element}</span>";
		
		return $html_element;
	}
	
	/**
	 * 
	 * Metodo para modificar el decorador de errores
	 */
	public function buildErrors() {
		$element = $this->getElement();
		$messages = $element->getMessages();
		
		if (empty ( $messages )) {
			return '';
		}
		//Se settea los elementos html de inicio y fin para el html de errores
		$form_errors_helper = $element->getView()->getHelper('formErrors');
		$form_errors_helper	->setElementStart('<div class="alert-error alert-font-size">') 
               				->setElementSeparator('<br />') 
               				->setElementEnd('</div>'); 

		return $element->getView()->formErrors( $messages );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Form_Decorator_Abstract::render()
	 */
	public function render($content) {
		$element = $this->getElement ();
		if (! $element instanceof Zend_Form_Element) {
			return $content;
		}
		if (null === $element->getView()) {
			return $content;
		}
		
		$separator = $this->getSeparator();
		$placement = $this->getPlacement();
		$html_input= $this->buildInput();
		$errors = $this->buildErrors();
		$output = $html_input ;
		
		switch ($placement) {
			case (self::PREPEND) :
				return $output . $separator . $content;
			case (self::APPEND) :
			default :
				return $output;
		}
	}
} 