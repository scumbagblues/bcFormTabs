<?php
/**
 * 
 * Interface para implementar los select que necesiten
 * cargar info de uan tabla
 * @author rcortes
 *
 */
interface Weezer_Form_Decorator_Interface{
	
	public function getDecoratorInfo();
	public function getErrorMessages($element);

}