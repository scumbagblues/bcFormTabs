<?php

class HistorialClinico_Model_Exploracion extends Weezer_Model_Base
{
	protected $_name = 'exploracion_fisica';
	protected $_primary = 'exp_id';
    public $_table_prefix = 'exp';
    
	public function addElements($data){
		$paciente_data 	= new Zend_Session_Namespace('paciente');
		$paciente_id 	= $paciente_data->info;	
		$exploracion	= new Zend_Session_Namespace('exploracion_fisica');
		$data 			= array_merge($data,array('exp_pacid' => $paciente_id['id'])); 
		$exploracion->info 	= $data;     	
	}

}

