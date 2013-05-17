<?php

class Bluecare_Form_Decorator_Submit extends Zend_Form_Decorator_Abstract{
	
	protected $_format = "<div class='row-fluid'> 
							<div class='offset5 span5'>
            					<input type='submit' class='btn btn-primary' value=\"%s\"/>
            			   </div>
						 </div>";
 
    public function render($content){
       $element = $this->getElement();
       $label   = ($element->getLabel());
       $value   = htmlentities($element->getValue());
       $markup  = sprintf($this->_format, $label, $value);
  
       return $markup;
    }   
}