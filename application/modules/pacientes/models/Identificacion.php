<?php
class Pacientes_Model_Identificacion extends Weezer_Model_Base{

	protected $_name = 'paciente_identificacion';
	protected $_primary = 'pid_id';
	public $_table_prefix = 'pid';
	
	
	public function addElements($data){
		$paciente_data 	= new Zend_Session_Namespace('paciente');
		$paciente_id 	= $paciente_data->info;	
		$paciente_identificacion = new Zend_Session_Namespace('paciente_identificacion');
		$data 			= array_merge($data,array('pid_pacid' => $paciente_id['pac_id'])); 
		$paciente_identificacion->info = $data;

	}
	
}