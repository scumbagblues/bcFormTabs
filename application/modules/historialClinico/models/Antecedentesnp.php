<?php

class HistorialClinico_Model_Antecedentesnp extends Weezer_Model_Base
{
	protected $_name = 'antecedentes_nopatologicos';
	protected $_primary = 'anp_id';
    public $_table_prefix = 'anp';
    
	public function addElements($data){
		$antecedentes_np= new Zend_Session_Namespace('antecedentes_nopatologicos');
		$antecedentes_np->info = $data;     	
	}

}

