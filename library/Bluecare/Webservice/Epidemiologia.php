<?php
/**
 * 
 * Clase para obtener el webservice de epidemiologia
 * @author rcortes
 *
 */
class Bluecare_Webservice_Epidemiologia{
	
	protected $_KEY_CATEGORIA = '7705FEC6B7F4AC5533CEA9DD409C636C94A823A3';
	protected $_WSDL_URL = 'http://epidemiologia.grupoplenum.com:8185/WS/FormulariosWS.asmx?wsdl';
	protected $_client_wsdl;
	
	public function __construct(){
		$this->_client_wsdl = new Zend_Soap_Client($this->_WSDL_URL);
	}
	
	public function getFormResult($cie_enfermedad){
		$params = array('Key' => $this->_KEY_CATEGORIA, 'CIE10Code'=> $cie_enfermedad);
		$form_result = $this->_client_wsdl->RetrieveFormulario($params);
		
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
		
		foreach ($resultado->OpcionCatalogoDTO as $key => $value){
			$cat_opciones[$value->Valor] = $value->Texto;
		}
		
		return $cat_opciones;
	}
	
}