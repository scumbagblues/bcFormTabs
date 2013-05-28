<?php
class Bluecare_Form_Decorator_Group extends Zend_Form_Decorator_Abstract{
	
	protected $_tab_name;
	
	public function __construct($tab_name = null){
		parent::__construct($options = null);
		$this->_tab_name = $tab_name;
	}
	
	public function render($content){
			$html_group = "<div id='{$this->_tab_name}'>$content</div>";
			
			return $html_group;
	}
}