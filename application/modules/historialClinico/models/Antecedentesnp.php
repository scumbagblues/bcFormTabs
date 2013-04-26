<?php

class HistorialClinico_Model_Antecedentesnp extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_nopatologicos';
	protected $_primary = 'anp_id';
    public $_table_prefix = 'anp';
    
	public function addElements($data){
		$paciente_data = new Zend_Session_Namespace('paciente');
		$paciente_id = $paciente_data->info;	
		$antecedentes_np= new Zend_Session_Namespace('antecedentes_nopatologicos');
		$data = array_merge($data,array('anp_pacid' => $paciente_id['id'])); 
		$antecedentes_np->info = $data;     	
	}

}

