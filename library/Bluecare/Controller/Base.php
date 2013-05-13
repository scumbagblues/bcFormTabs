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
			//Si la forma es valida y el preSave devuelve TRUE..
			if ($form->isValid($form_data) &&  $model->preSave($form, $form_data)){
				//Se guardan los datos
				
				if ($model->postSave($form_data)){
					//acciones a realizar despues de insercion exitosa
				}else{
						
				}
		
			}else{
				$form->populate($form_data);
			}
		}else{
			//$form->populate($form_data);
		}
	}
	
}