<?php

class Pacientes_Model_Registros extends Weezer_Model_Base{
	
	protected $_name = 'registros';
	protected $_primary = 'reg_id';
    public $_table_prefix = 'reg';
    
    /**
     * 
     * Metodo para obtener el total de pacientes en 
     * su estatus correspondiente
     */
	public function pacientesEstatus(){
    	
		$estatus = array('consulta' => '1','espera' => '2','atendido' => '3');
		$estatus_class = new stdClass();
		
		foreach ($estatus as $key => $row){
			$estatus_rowset = $this->fetchAll("reg_estatus='{$row}' AND reg_fecha=current_date");
    		$total = count($estatus_rowset);
    		$estatus_class->$key = $total;
		}
    	
    	
    	return $estatus_class;
    }
    
   //Contenido de la tabla para lista de espera 
   public function getQuerycontent(){
   	
	   	$db_adapter = Zend_Db_Table_Abstract::getDefaultAdapter ();
	    $query      = $db_adapter->select()
					       			->from(array('r' => 'registros'),
					                    		array('reg_nexpediente as reg_nexpedientepac', "CONCAT_WS(' ',reg_nombre,reg_apellidoP,reg_apellidoM) as reg_nombre",'reg_hentrada'
					                    			  ,'reg_hconsulta','reg_hsalida')) 
					             	->joinInner(array('u' => 'usuarios'),
					                    			  'r.reg_idmedico = u.usu_id',
					                    			array('usu_nombre as reg_idmedico'))
					                ->where('r.reg_fecha = CURRENT_DATE');
		
		return $query;		      
					                
   }
    
    public function preSave(& $form, & $form_data){
    	
    	$validate_fields = array('reg_nombre','reg_apellidoP','reg_apellidoM');
    	$return = true;
    	if (empty($form_data['reg_nexpediente'])){
    		foreach ($validate_fields as $key){
    			if ($form_data[$key] == ''){
    				$return = false;
    				break;
    			}else{
    				$return = true;
    				$form_data['reg_nexpediente'] = 'Por asignar';	
    			}
    		}    		
    		
    	}else{

    		$pacientes_table = new Pacientes_Model_Pacientes();
    		$pacientes_row   = $pacientes_table->fetchRow("pac_id = {$form_data['reg_nexpediente']}");
    		$pacientes_array = $pacientes_row->toArray();
    		
    		$form_data['reg_nombre'] 		= $pacientes_array['pac_nombre'];
    		$form_data['reg_apellidoP']		= $pacientes_array['pac_apellidoP'];
    		$form_data['reg_apellidoM'] 	= $pacientes_array['pac_apellidoM'];
    		$form_data['reg_nexpediente'] 	= $pacientes_array['pac_nexpediente'];

    	}
    	
    	$medico = new ListaEspera_Model_Medicos();
    	$id_medico = $form_data['reg_idmedico'];
    	$row_medico = $medico->fetchRow("usu_id = {$id_medico}");
    	
    	$form_data['reg_hentrada']	= date('H:i:s');
    	$form_data['reg_fecha']		= date('Y-m-d');
    	$form_data['reg_estatus']	= '2';
    	$form_data['reg_coordinacion'] = $row_medico['usu_coordinacion'];

    	return $return;
    }
    
}