<?php

class HistorialClinico_Model_Antecedentespat extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_patologicos';
	protected $_primary = 'apa_id';
    public $_table_prefix = 'apa';
    
	public function addElements($data){
		$paciente_data = new Zend_Session_Namespace('paciente');
		$paciente_id = $paciente_data->info;	
		$antecedentes_pat= new Zend_Session_Namespace('antecedentes_patologicos');
		$data = array_merge($data,array('apa_pacid' => $paciente_id['id'])); 
		$antecedentes_pat->info = $data;   
	}

}

