<?php

class HistorialClinico_IndexController extends Weezer_Controller_Base
{
	protected $_redirect_after_post = TRUE;
	
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
      $options = array('actions' => array('radio' => 'Seleccionar'));
    	
      $this->createList('Pacientes_Model_Pacientes',$options);
      	
    }
    
    public function addidAction(){
		$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addpadecimiento'));
    										 			
    	$this->createForm('add','Pacientes_Model_Identificacion',$params); 
    	$this->_forward('catalogform','index','default');   	
    }
    
    public function addpadecimientoAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addaheredofam'));
    										 			
    	$this->createForm('add','Pacientes_Model_Padecimiento',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addaheredofamAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addanopatologicos'));
    	$this->createForm('add','HistorialClinico_Model_Antecedenteshf',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addanopatologicosAction(){
    	
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addapatologicos'));
    	$this->createForm('add','HistorialClinico_Model_Antecedentesnp',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addapatologicosAction(){
    	
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addexploracion'));
    	$this->createForm('add','HistorialClinico_Model_Antecedentespat',$params);
    	$this->_forward('catalogform','index','default');

    }
    
    public function addexploracionAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addextras'));
    	$this->createForm('add','HistorialClinico_Model_Exploracion',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addextrasAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'resume'));
    	$this->createForm('add','HistorialClinico_Model_Extras',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function resumeAction(){
    	
    	$session_data = array('paciente','paciente_identificacion','paciente_padecimiento','antecedentes_heredofam','antecedentes_nopatologicos'
    						  ,'antecedentes_patologicos','exploracion_fisica','paciente_extras');
    	$info_paciente = array();
    	
    	foreach ($session_data as $info){
    		$info_session = new Zend_Session_Namespace($info);
    		$info_paciente[$info] = $info_session->info;
    	}
			
    	$fields_to_show = $this->_getLabelsAndValues($info_paciente);
    	//var_dump($fields_to_show);
    	
    	$this->view->info_paciente = $fields_to_show;
    	
    	//Si se envio la forma
    	if ($this->getRequest()->isPost()){
    		$paciente_model = new Pacientes_Model_Pacientes();
    		$paciente_model->insertAllDataPaciente($info_paciente);
    	}
    }
    
    /*
    public function mostrarpacienteAction(){
    	$paciente_model = new Pacientes_Model_Pacientes();
    	$pacientes_rows = $paciente_model->fetchAll("pac_activo = '1'")->toArray();
    	
    	$pacientes = $pacientes_rows;
    	
    }*/
    
    /**
     * 
     * Metodo para obtener las etiquetas de los campos generados en el 'wizard'
     * @param array $info_paciente
     * @param array $tables
     */
    protected function _getLabelsAndValues($info_paciente){
    		
    		$fields_labels = array();
    		foreach ($info_paciente as $table => $fields){
    			$config_table = Weezer_Catalog_Form_Abstract::getCatalogConfig($table);
    			if (!is_null($fields)){
    				foreach ($fields as $key => $value){
	    				if (is_object($config_table->labels)){
	    					$label_array = $config_table->labels->toArray();
	 						if (array_key_exists($key, $label_array)){
	 							$label = $label_array[$key];
	 							if ($table == 'paciente'){
	 								if ($key == 'pac_idestado' && !is_null($value)){
	 									$est_cd_array = $this->_getEstadoAndCiudadNombre($fields['pac_idciudad']);
	 									$fields_labels[$table][$label] = $est_cd_array['estado'];
	 								}
	 								else if ($key == 'pac_idciudad' && !is_null($value)){
	 									$est_cd_array = $this->_getEstadoAndCiudadNombre($fields['pac_idciudad']);
	 									$fields_labels[$table][$label] = $est_cd_array['ciudad'];
	 								}
	 								else{
	 									$fields_labels[$table][$label] = $value;
	 								}
	 							}else{
	 								
	 								$fields_labels[$table][$label] = $value;
	 							}
	 							
	 						}
	    				}
    				}		
    			}				
    		}
    	
    	return $fields_labels;
    }
    
    protected function _getEstadoAndCiudadNombre($id_ciudad){
    	$paciente_model = new Pacientes_Model_Pacientes();
    	$est_cd_array 	= $paciente_model->getEstadoCiudad($id_ciudad);
    	
    	return $est_cd_array;
    }
   
}

