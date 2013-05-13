<?php

class Bluecare_Controller_Base extends Zend_Controller_Action{
	
	protected $_form_name;
	protected $_enfermedad_cie;
	
	public function createForm($params){
		
		$model = new Bluecare_Model_Base();
		$form_data = '';
		
		if ($this->getRequest()->isPost()){
			$form_data = $this->getRequest()->getPost();
		}
		
		if (isset($params['enfermedad'])){
			$this->_enfermedad_cie = $params['enfermedad'];
		}
		
		$form_params = array(
				'formName' => 'epidemiologia',
				'formAttribs' => array(
						'class' => 'form-inline'
				),
				'enfermedad' => $this->_enfermedad_cie,
				/*'formParams' 		=> $params,*/
				'formData'  		=> $form_data,
				/*'encTypeMultipart' 	=> $flag_enc_type*/
					
		);
		
		$form = new Bluecare_Catalog_Form($form_params);
		
		//var_dump('hola',$form);die;
		$this->view->form = $form;
		
		if ($this->getRequest()->isPost()){
			//var_dump($form_data);die;
			//$result = $this->_processRequest($form_data);
			//var_dump($result);die;
			//Si la forma es valida y el preSave devuelve TRUE..
			
			if ($form->isValid($form_data)){
				//Se guardan los datos
				$result = $this->_processRequest($form_data);
				var_dump($result);die;
			}else{
				var_dump($form_data);die;
				$form->populate($form_data);
			}
		}else{
			//$form->populate($form_data);
		}
	}
	
	protected function _processRequest($form_data){
		$bluecare_ws = new Bluecare_Webservice_Epidemiologia(true);
		$key_ws = $bluecare_ws->getKeyWs();
		$send_data = array();

		foreach ($form_data as $key => $value){
			$concepto = new stdClass();
			$concepto->Nombre = $key;
			$concepto->Valor = $value;
			
			array_push($send_data, $concepto);
		}
		
		$parametros_ws = array("Key" => $key_ws, "Conceptos" => $send_data);
		$resultado = $bluecare_ws->insertData($parametros_ws);
		
		return $resultado;
	}
	
}