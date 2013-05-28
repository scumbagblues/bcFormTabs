<?php

class Epidemiologia_IndexController extends Bluecare_Controller_Base
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction(){
    	$params 	= $this->_getAllParams();
    	$id_cie 	= $params['id'];
    	$id_user 	= $params['iduser'];
    	$id_paciente= $params['idpaciente'];
    	$params = array('enfermedad' => $id_cie,'usuario' => $id_user,'paciente' => $id_paciente);
    	$form = $this->createForm($params);
    }


}

