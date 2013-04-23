<?php

class Pacientes_IndexController extends Weezer_Controller_Base
{

	protected $_table = 'Pacientes_Model_Pacientes'; 
	protected $_redirect_after_post = TRUE;

    public function indexAction()
    {
        $options = array('pagination' => TRUE);
       	$this->createList($this->_table,$options);
       	$this->_forward('cataloglist','index','default');
    }
    
    public function addAction(){
    	
    	$params = array('attribs' => array('decorators' => array('pac_idestado' => 'SelectEstados'
    															  ,'pac_idciudad' => 'SelectCiudades'),
    										 'field_attribs' => array('pac_idestado' => 
    															  		array('onchange' => "javascript: weezer.combos.select(this.value,'pacientes index ajax','pac_idciudad')")),
    										));
    	
    	$this->createForm('add', $this->_table,$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function editAction(){
    	$params = array('attribs' => array('decorators' => array('pac_idestado' => 'SelectEstados'
    															  ,'pac_idciudad' => 'SelectCiudades'),
    										 'field_attribs' => array('pac_idestado' => 
    															  		array('onchange' => "javascript: weezer.combos.select(this.value,'pacientes index ajax','pac_idciudad')")),
    										));
    	$this->createForm('edit', $this->_table,$params);
    	$this->_forward('catalogform','index','default');
    }
    
    public function deleteAction(){
    	$this->deleteRow($this->_table);
    	$this->_forward('catalogform','index','default');
    }
    
    public function ajaxAction(){
    	if ($this->getRequest()->isXmlHttpRequest()){
			
			$id =$this->_getParam('id');
			
			$ciudades_table = new Ciudades_Model_Ciudades();
			$ciudades 		= $ciudades_table->fetchAll("ciu_idestado = '{$id}'", 'ciu_nombre');
			$array_ciudades = array();
			$array_ciudades = $ciudades->toArray();

			if (empty($array_ciudades)){
				$select_ciudades = null;
			}else{
				
			    //valor vacio default
			    $valores_select_ciudad[''] = '';
				foreach ($array_ciudades as $ciudad){
					$valores_select_ciudad[$ciudad['ciu_id']] = utf8_encode($ciudad['ciu_nombre']);
				}
				$select_ciudades = $this->view->formSelect("cli_ciudad",null,array('class' => 'span2'),$valores_select_ciudad);
			}
			
			
			//encode your data into JSON and send the response
			$this->_helper->json($select_ciudades);
		}
    }


}

