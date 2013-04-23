<?php

class ListaEspera_IndexController extends Weezer_Controller_Base
{
	protected $_registros_table = 'Pacientes_Model_Registros';

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       
    	$params = array('attribs' => array('decorators' => array('reg_idmedico' => 'SelectDoctor'
    															  ,'reg_nexpediente' => 'SelectPaciente'),
    										 'field_attribs' => array('reg_nexpediente' => array('onchange' => "javascript: bluecare.completefieldspaciente(this.value)")),
    										));
		 
       	$this->createForm('add', $this->_registros_table,$params);
       	
       	$pacientes_table = new $this->_registros_table();
       	$estatus 	= $pacientes_table->pacientesEstatus();
       	$query 		= $pacientes_table->getQuerycontent();
    
       	$options = array('query' => $query);
       	$this->createList($this->_registros_table,$options);
       	$this->view->estatus_consulta 	= $estatus->consulta;
       	$this->view->estatus_atendido 	= $estatus->atendido;
       	$this->view->estatus_espera 	= $estatus->espera;
       //$this->_forward('catalogform','index','default');//Se invoca a la accion - controlador - modulo para obtener el view de listado
    }
    
    public function ajaxAction(){
    	
    	if ($this->getRequest()->isXmlHttpRequest()){
	    		$id_paciente = $this->_getParam('id');
	    	if (empty($id_paciente)){
	    		$this->_helper->json($total_rows);
    		}else{
    			$pacientes_table 	= new Pacientes_Model_Pacientes();
	    		$row_paciente 		= $pacientes_table->fetchRow("pac_id = {$id_paciente}");
	    		$rows_utf8			= array('pac_nombre','pac_apellidoM','pac_apellidoP');
	    		$total_rows 		= array();
	    		
	    		if (!is_null($row_paciente)){
	    			$paciente_array = $row_paciente->toArray();
	    			foreach ($paciente_array as $key => $value){
	    				if (in_array($key, $rows_utf8)){
	    					$total_rows[$key] = utf8_encode($value);
	    				}else{
	    					$total_rows[$key] = $value;
	    				}
	    			}
	    		}
	    		
	    		$this->_helper->json($total_rows);
    		}
    		
    		
    	}
    }


}

