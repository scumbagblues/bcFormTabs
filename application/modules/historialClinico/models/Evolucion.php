<?php

class HistorialClinico_Model_Evolucion extends Weezer_Model_Base
{
	protected $_name = 'evolucion_medica';
	protected $_primary = 'evo_id';
    public $_table_prefix = 'evo';
		
    public function preSave(& $form, & $form_data){
    	$paciente_data = new Zend_Session_Namespace('paciente');
    	$info = $paciente_data->info;
    	$form_data = array_merge($form_data,array('evo_pacid' => $info['pac_id']));
    	
    	return TRUE;
    }
}

