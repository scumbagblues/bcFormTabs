<?php

class HistorialClinico_Model_Antecedenteshf extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_heredofam';
	protected $_primary = 'ahf_id';
    public $_table_prefix = 'ahf';
    
	public function addElements($data){
		$paciente_data = new Zend_Session_Namespace('paciente');
		$paciente_id = $paciente_data->info;	
		$antecedentes_hfm = new Zend_Session_Namespace('antecedentes_heredofam');
		$data = array_merge($data,array('ahf_pacid' => $paciente_id['pac_id'])); 
		$antecedentes_hfm->info = $data;     	
	}

}

