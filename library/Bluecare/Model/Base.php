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
	
	public function getPacienteData($id_paciente){
		$paciente_model = new Pacientes_Model_Pacientes();
		$paciente_data = $paciente_model->getRow("id_paciente = {$id_paciente}");
		
		return $paciente_data;
	}
	
	public function getCity($id_ciudad,$id_estado){
		$ciudad_model = new Ciudades_Model_Ciudades();
		$ciudad = $ciudad_model->getRow("id_municipio = {$id_ciudad} AND id_entidad = {$id_estado}");

		return $ciudad['id_municpio'];
	}
		
}