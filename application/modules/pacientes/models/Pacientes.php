<?php

class Pacientes_Model_Pacientes extends Weezer_Model_Base{
	
	protected $_name = 'paciente';
	protected $_primary = 'pac_id';
    public $_table_prefix = 'pac';
    
    
     public function addElements($data){
     	$data = parent::addElements($data);
     	$paciente_data = new Zend_Session_Namespace('paciente_data');
     	$paciente_data->info = $data;
     } 
}