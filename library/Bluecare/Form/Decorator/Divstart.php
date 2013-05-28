<?php
class Bluecare_Form_Decorator_Divstart extends Zend_Form_Decorator_Abstract{
	
	public function render($content){
	
		$html_section = "<div>";
		
		return $html_section;
	}
}