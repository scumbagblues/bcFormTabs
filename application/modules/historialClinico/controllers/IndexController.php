<?php

class HistorialClinico_IndexController extends Weezer_Controller_Base
{
	
	
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
    }
    
    public function addidAction(){
    	$this->createForm('add','Pacientes_Model_Identificacion',$params);    	
    }
	

}

