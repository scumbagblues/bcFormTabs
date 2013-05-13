<?php

class Epidemiologia_IndexController extends Bluecare_Controller_Base
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
    	$params = array('enfermedad' => 'A300');
    	
        $form = $this->createForm($params);
       
    }


}

