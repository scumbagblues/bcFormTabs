<?php

class HistorialClinico_Model_Extras extends Weezer_Model_Base
{
	protected $_name = 'paciente_extras';
	protected $_primary = 'pex_id';
    public $_table_prefix = 'pex';
    
	public function addElements($data){
		$extras			= new Zend_Session_Namespace('pacientes_extras');
		$extras->info 	= $data;     	
	}
	

}

