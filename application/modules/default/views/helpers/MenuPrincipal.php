<?php
/**
 * 
 * Helper para crear el menu principal de la aplicacion
 * @author rcortes
 *
 */

class Default_View_Helper_MenuPrincipal extends Zend_View_Helper_Abstract{
	
	/**
	 * 
	 * Variable con los elementos del menu
	 * @var unknown_type
	 */
	protected $_items = array('lista_espera' => array('label' => 'Lista de espera',
														 'url'   => "_BASEURL_/listaEspera/",
														 'module'  => 'listaEspera'
														),
								'agenda_medica' => array('label' => 'Agenda medica',
														 'url'	=> "_BASEURL_/agenda/",
														 'module'  => 'agenda'),
								'pacientes' => array('label' => 'Pacientes',
														 'url'	=> "_BASEURL_/pacientes/",
														 'module'  => 'pacientes'),						
								'historial_clinico' => array('label' => 'Historial clinico',
														 'url'	=> "_BASEURL_/historialClinico/",
														 'module'  => 'historialClinico'),						

								'datos_generales'=> array('label' => 'Datos Generales',
														  'url' => '#',
														  'module'  => 'datosGenerales'),
								'estudio_socioeco' => array('label' => 'Estudio Socio Económico',
														    'url' => '#',
															'module'  => 'estudioSE')																				
						 );
	
	
	/**
	 * 
	 * Método que devuelve el HTML del menu generado
	 */
	public function menuPrincipal(){
		
		$html_menu_principal = $this->crearMenu();
		return $html_menu_principal;								
	}
	
	/**
	 * 
	 * Método que crea el menú dinamicamente
	 */
	public function crearMenu(){
		
		$module_name = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();
		
		$html_menu 	= "<ul class='nav'>";
		$menu_items = $this->_getItems();
		$html_li = "";
	
		foreach ($menu_items as $key => $items){
			$html_li .= "<li ";
			
			if ($module_name == $items['module']){
				$html_li .= " class=active ";
			}
			
			if (isset($items['attribs'])){
				foreach ($items['attribs'] as $attrib => $value){
					$html_li .= "{$attrib}={$value} ";
				}
			}
			$base_url = str_replace('_BASEURL_', $this->view->baseUrl(), $items['url']);
			$html_li .= "><a href='{$base_url}'>{$items['label']}</a></li>";
		}
		
		$html_menu .= $html_li . "</ul>";
		
		return $html_menu;
	}

	protected function _getItems(){
		return $this->_items;
	}
}