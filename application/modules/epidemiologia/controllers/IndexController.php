<?php

class Epidemiologia_IndexController extends Bluecare_Controller_Base
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction(){
    	$id_cie = $this->_getParam('id');
    	$params = array('enfermedad' => $id_cie);
    	$form = $this->createForm($params);
    }


}

