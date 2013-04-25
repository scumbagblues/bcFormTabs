<?php

class HistorialClinico_Model_Antecedentespat extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_patologicos';
	protected $_primary = 'apa_id';
    public $_table_prefix = 'apa';
    
	public function addElements($data){
		$antecedentes_pat= new Zend_Session_Namespace('antecedentes_patologicos');
		$antecedentes_pat->info = $data;   
	}

}

