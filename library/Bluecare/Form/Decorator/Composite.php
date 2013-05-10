<?php
/**
 * 
 * Clase que sirve de decorador principal para las formas de epidemiologia
 * @author rcortes
 *
 */
class Bluecare_Form_Decorator_Composite extends Zend_Form_Decorator_Abstract{
	
	/**
	 * 
	 * Metodo para crear la etiqueta del campo
	 */
	public function buildLabel(){
		$label = '';
		$element = $this->getElement();
		
		//Si el elemento es obligatorio antepone un asterisco
		if ($element->isRequired ()) {
			$label .= '*';
		}
		
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
		
		return $html_element;
	}
	
	/**
	 * 
	 * Metodo para modificar el decorador de errores
	 */
	public function buildErrors(){
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Form_Decorator_Abstract::render()
	 */
	public function render($content){
		
	}
} 