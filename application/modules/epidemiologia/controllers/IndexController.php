<?php

class Epidemiologia_IndexController extends Bluecare_Controller_Base
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
    	$params = array('enfermedad' => 'A09X');
    	
        $form = $this->createForm($params);
       
    }


}

