<?php

class Bluecare_Controller_Base extends Zend_Controller_Action{
	
	protected $_form_name;
	protected $_enfermedad_cie;
	
	public function createForm($params){
		
		$model = new Bluecare_Model_Base();
		$form_data = '';

		if (isset($params['enfermedad'])){
			$this->_enfermedad_cie = $params['enfermedad'];
		}
		
		$form_params = array(
				'formName' => 'epidemiologia',
				'formAttribs' => array(
						'class' => 'form-inline',
						'data-validate'=> 'parsley',
						'data-show-errors' => 'true',
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
			$form_data = $this->getRequest()->getPost();
			
			//Se guardan los datos
			$result = $this->_processRequest($form_data);
			if (!is_null($result)){
				//redirige
				var_dump($result);die;
			}else{
				//muestra error
			}
		}
	}
	
	protected function _processRequest($form_data){
		$bluecare_ws = new Bluecare_Webservice_Epidemiologia(true);
		$key_ws = $bluecare_ws->getKeyWs();
		$send_data = array();
		
		$concepts = new Zend_Session_Namespace('concepts');
		$conceptos = $concepts->info;
		
		$form_data = $this->getArrayFormData($conceptos, $form_data);
	
		foreach ($form_data as $key => $value){
			$concepto = new stdClass();
			$concepto->Nombre = $key;
			$concepto->Valor = $value;
			
			array_push($send_data, $concepto);
		}
		
		$parametros_ws = array("Key" => $key_ws, "Conceptos" => $send_data);
		//var_dump($parametros_ws);die;
		$resultado = $bluecare_ws->insertData($parametros_ws);
		
		return $resultado;
	}
	
	protected function getArrayFormData($concepts,$form_data){
		//array_unshift($concepts, 'CODIGO_APLICACION');
		//var_dump($concepts,$form_data,array_diff($concepts, $form_data));die;
		$form_data = array_combine($concepts, $form_data);
		
		return $form_data;
		
	}
	
}