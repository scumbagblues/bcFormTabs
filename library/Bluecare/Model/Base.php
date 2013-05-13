<?php

class Bluecare_Model_Base extends Zend_Db_Table_Abstract{
	
	public function preSave(& $form, & $form_data){
		return TRUE;
	}
	
	public function postSave($values){
		return TRUE;
	}
}