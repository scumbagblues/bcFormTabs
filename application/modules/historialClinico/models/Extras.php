<?php

class HistorialClinico_Model_Extras extends Weezer_Model_Base
{
	protected $_name = 'paciente_extras';
	protected $_primary = 'pex_id';
    public $_table_prefix = 'pex';
    
	public function addElements($data){
		$paciente_data 	= new Zend_Session_Namespace('paciente');
		$paciente_id 	= $paciente_data->info;	
		$extras			= new Zend_Session_Namespace('paciente_extras');
		$data 			= array_merge($data,array('pex_pacid' => $paciente_id['pac_id'])); 
		$extras->info 	= $data;     	
	}
	

}

