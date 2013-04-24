<?php

class HistorialClinico_Model_Antecedenteshf extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_heredofam';
	protected $_primary = 'ahf_id';
    public $_table_prefix = 'ahf';
    
	public function addElements($data){
		$antecedentes_hfm = new Zend_Session_Namespace('antencedentes_heredofam');
		$antecedentes_hfm->info = $data;     	
	}

}

