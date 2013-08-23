<?php
/**
 * 
 * Clase para obtener el webservice de epidemiologia
 * @author rcortes
 *
 */
class Bluecare_Webservice_Epidemiologia{
	
	protected $_KEY_CATEGORIA = '7705FEC6B7F4AC5533CEA9DD409C636C94A823A3';
	protected $_WSDL_URL_FORMS = 'http://ws.epidemiologia.sesaqroo.mx/WS/FormulariosWS.asmx?wsdl';
	protected $_WSDL_URL_CASOS = 'http://ws.epidemiologia.sesaqroo.mx/WS/CasosEstudioWS.asmx?WSDL';
	protected $_client_wsdl;
	
	public function __construct($insert = false){
		if ($insert){
			$this->_client_wsdl = new Zend_Soap_Client($this->_WSDL_URL_CASOS);
		}else{
			$this->_client_wsdl = new Zend_Soap_Client($this->_WSDL_URL_FORMS);
		}
		
	}
	
	public function getFormResult($cie_enfermedad){
		$params = array('Key' => $this->_KEY_CATEGORIA, 'CIE10Code'=> $cie_enfermedad);
		$form_result = $this->_client_wsdl->RetrieveFormulario($params);
		//var_dump($this->_client_wsdl->getFunctions());die;
		return $form_result->RetrieveFormularioResult;
	}
	
	public function getCatalogOptions($catalog){
		$cat_opciones	= array();
		$valor_defecto 	= NULL;
		$columna_filtro = NULL;
		$valor_padre	= NULL;
		
		$params_ws = array('Key' => $this->_KEY_CATEGORIA
							,'Catalogo' => $catalog->Nombre
							,'ColumnaID' => $catalog->CampoIdentificador
							,'ColumnaTexto' => $catalog->CampoTexto
							,'ValorDefecto' => $valor_defecto
							,'ColumnaFiltro'=> $columna_filtro
							,'ValorPadre' => $valor_padre);
		
		$catalog_options 	= $this->_client_wsdl->RetrieveOpcionesCatalogo($params_ws);
		$resultado 			= $catalog_options->RetrieveOpcionesCatalogoResult;
		
		if(is_array($resultado->OpcionCatalogoDTO)){
			foreach ($resultado->OpcionCatalogoDTO as $key => $value){
				$cat_opciones[$value->Valor] = $value->Texto;
			}
		}else{
			$key_field = $resultado->OpcionCatalogoDTO->Valor;
			$value_field = $resultado->OpcionCatalogoDTO->Texto;
			$cat_opciones[$key_field] = $value_field;
		}
		
		
		return $cat_opciones;
	}
	
	public function getKeyWs(){
		return $this->_KEY_CATEGORIA;
	}
	
	public function insertData($data){
		try {
			$mensaje = $this->_client_wsdl->Insert($data);
			$resultado = $mensaje->InsertResult;
		}catch (Exception $e){
			throw new Exception("Ocurrio un error al procesar la información: {$e->getMessage()}");
		}	
		return $resultado;
	}
	
}