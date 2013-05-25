<?php

class Bluecare_Model_Base extends Zend_Db_Table_Abstract{
	
	public function preSave(& $form, & $form_data){
		return TRUE;
	}
	
	public function postSave($values){
		return TRUE;
	}
	
	public function getUserData($id_user){
		$user_model = new Default_Model_Usuarios();
		$user_data = $user_model->getRow("id_usuario = {$id_user}");
		
		return $user_data;
	}
}