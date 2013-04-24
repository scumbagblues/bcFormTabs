<?php
class Pacientes_Model_Identificacion extends Weezer_Model_Base{

	protected $_name = 'paciente_identificacion';
	protected $_primary = 'pid_id';
	public $_table_prefix = 'pid';
	
	
	public function addElements($data){
		//$datos_paciente = new Zend_Session_Namespace('paciente_data');
		$paciente_identificacion = new Zend_Session_Namespace('paciente_identificacion');
		$paciente_identificacion->info = $data;
		
		/*
		$paciente_info = array('paciente' => $datos_paciente->info
							   ,'identificacion' => $paciente_identificacion->info);*/
		
     	
     	
	}
	
}