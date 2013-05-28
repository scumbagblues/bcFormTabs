<?php
class Bluecare_Form_Decorator_Divend extends Zend_Form_Decorator_Abstract{
	
	public function render($content){
		
		$html_section = "</div>";
		
		return $html_section;
	}
}