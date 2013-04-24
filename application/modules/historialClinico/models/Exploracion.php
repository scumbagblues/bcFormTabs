<?php

class HistorialClinico_Model_Exploracion extends Weezer_Model_Base
{
	protected $_name = 'exploracion_fisica';
	protected $_primary = 'exp_id';
    public $_table_prefix = 'exp';
    
	public function addElements($data){
		$exploracion		= new Zend_Session_Namespace('exploracion_fisica');
		$exploracion->info 	= $data;     	
	}

}

