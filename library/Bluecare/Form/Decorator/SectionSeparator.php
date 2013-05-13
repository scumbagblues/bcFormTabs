<?php

class Bluecare_Form_Decorator_SectionSeparator extends Zend_Form_Decorator_Abstract{
	
	public function render($content){
		$element = $this->getElement();
		$html_section = "<div class='table-header'>
							<h4>{$element->getAttrib('name')}</h4>
						</div>";
		
		return $html_section;
	}
}