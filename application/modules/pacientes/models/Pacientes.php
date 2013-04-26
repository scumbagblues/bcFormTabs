<?php

class Pacientes_Model_Pacientes extends Weezer_Model_Base{
	
	protected $_name = 'paciente';
	protected $_primary = 'pac_id';
    public $_table_prefix = 'pac';
    
    
     public function addElements($data){
     	$data = parent::addElements($data);
     	$paciente_data = new Zend_Session_Namespace('paciente');
     	$paciente_data->info = $data;
     }

     public function getEstadoCiudad($id_ciudad){
     	
     	$ciudad_model = new Ciudades_Model_Ciudades();
     	$cd_row = $ciudad_model->fetchRow("ciu_id = '{$id_ciudad}'");
     	
     	$estado_model = new Estados_Model_Estados();
     	$est_row =$estado_model->fetchRow("est_id = '{$cd_row['ciu_idestado']}'");
     	
     	$estado_ciudad['ciudad'] = $cd_row['ciu_nombre'];
     	$estado_ciudad['estado'] = $est_row['est_nombre'];
     	
     	return $estado_ciudad;
     }
     
     /**
      * 
      * Inserta toda la informacion del paciente y su historial clinico
      */
     public function insertAllDataPaciente($data){
     	
     	$historial_models = array('paciente_identificacion' => 'Pacientes_Model_Identificacion'
	     						  ,'paciente_padecimiento' => 'Pacientes_Model_Padecimiento'
	     						  ,'antecedentes_heredofam' => 'HistorialClinico_Model_Antecedenteshf'
	     						  ,'antecedentes_nopatologicos' => 'HistorialClinico_Model_Antecedentesnp'
	    						  ,'antecedentes_patologicos' => 'HistorialClinico_Model_Antecedentespat'
	    						  ,'exploracion_fisica' => 'HistorialClinico_Model_Exploracion'
	    						  ,'paciente_extras' => 'HistorialClinico_Model_Extras');

	    $paciente_id = $data['paciente']['id'];						  
		//var_dump($data);die;						  
    	foreach	($historial_models as $table => $model){
    		$historal_model = new $model ();

    		$info_insert = $data[$table];
    		$historal_model->insert($info_insert); 	
    	}				  
     	
     }
}