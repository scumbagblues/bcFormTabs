<?php

class Pacientes_Model_Padecimiento extends Weezer_Model_Base{
	
	protected $_name = 'paciente_padecimiento';
	protected $_primary = 'pad_id';
	public $_table_prefix = 'pad';
	
	public function addElements($data){
		$paciente_data 	= new Zend_Session_Namespace('paciente');
		$paciente_id 	= $paciente_data->info;	
		$paciente_padecimiento = new Zend_Session_Namespace('paciente_padecimiento');
		$data 			= array_merge($data,array('pad_pacid' =>  $paciente_id['pac_id'])); 
		$paciente_padecimiento->info = $data;     	
	}
}