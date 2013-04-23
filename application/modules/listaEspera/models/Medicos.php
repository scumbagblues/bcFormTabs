<?php

class ListaEspera_Model_Medicos extends Weezer_Model_Base{
	
	protected $_name = 'usuarios';
	protected $_primary = 'usu_id';
    public $_table_prefix = 'usu';
    
    
    public function getDoctoresInfo(){
    	
    	$where = "usu_especialidad <> 'Recepción' AND usu_especialidad <> 'Trabajo Social'";
    	
    	$doctores_rows = $this->fetchAll($where);
    	
    	$doctores_array = $doctores_rows->toArray();
    	$select_doctor[''] = '';
    	
    	foreach ($doctores_array as $key => $doctor){
    		$select_doctor[$doctor['usu_id']] = utf8_encode($doctor ['usu_nombre']);
    	}
    	
    	return $select_doctor;
    }
}