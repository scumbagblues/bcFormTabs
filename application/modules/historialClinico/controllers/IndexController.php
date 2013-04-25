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
        
    }
    
    public function addidAction(){
		$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addpad'));
    										 			
    	$this->createForm('add','Pacientes_Model_Identificacion',$params); 
    	$this->_forward('catalogform','index','default');   	
    }
    
    public function addpadAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addahf'));
    										 			
    	$this->createForm('add','Pacientes_Model_Padecimiento',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addahfAction(){
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addanp'));
    	$this->createForm('add','HistorialClinico_Model_Antecedenteshf',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addanpAction(){
    	
    	$params = array('labelSubmit' => 'Siguiente',
    					 'redirect' => array('module' => 'historialClinico'
    										 			,'controller' => 'index'
    										 			,'action' => 'addapa'));
    	$this->createForm('add','HistorialClinico_Model_Antecedentesnp',$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function addapaAction(){
    	
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
    	
    	$session_data = array('paciente','paciente_identificacion','paciente_padecimiento','antencedentes_heredofam','antencedentes_nopatologicos'
    						  ,'antencedentes_patologicos','exploracion_fisica','pacientes_extras');
    	$info_paciente = array();
    	
    	foreach ($session_data as $info){
    		$info_session = new Zend_Session_Namespace($info);
    		$info_paciente[$info] = $info_session->info;
    	}
    	//var_dump($info_paciente);
    	$this->view->info_paciente = $info_paciente;
    	
    	//TODO validar que si viene por POST guardar los datos
    	//cambiar las etiquetas de campos de bd por etiquetas legibles
    }
   
}

