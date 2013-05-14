<?php

class Bluecare_Form_Validate_Fieldsform extends Zend_Validate_Abstract{
	
	CONST ERROR_FIELD_EMPTY = 'error_field_empty';
	
	protected $_messageTemplates = array(self::ERROR_FIELD_EMPTY => "El campo '%value%' no puede estar vacio");
	
	
	public function isValid($value,$context = array()){
		
		$return = '';
		$error_flag = 0;
		
		if (is_null($value) || $value == ''){
				$this->_error(self::ERROR_FIELD_EMPTY,$value);
				$return = FALSE;
		}else{
			$return = TRUE;	
		}
		
		
		/*
		foreach ($value  as $key => $field) {
			if (is_null($field) || $field == ''){
				$this->_error($error_key,$value);
				$error_flag++;
			}else{
				
			}
		}
		
		if ($error_flag > 0){
			$return = FALSE;
		}else{
			$return = TRUE;
		}*/
		
		return $return;
	}
}