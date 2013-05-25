<?php
/**
 *
 * Decorador para el select de estados
 * @author rcortes
 *
 */

class Weezer_Form_Decorator_SelectEstados extends Zend_Form_Decorator_Abstract
implements Weezer_Form_Decorator_Interface{

	
	public function getErrorMessages($element){
	   //mensajes de error
		$messages = $element->getMessages ();
		$mensajesError = '';
		if (!empty ( $messages ))
		{
			//Se settea los elementos html de inicio y fin para el html de errores
    		$form_errors_helper = $element->getView()->getHelper('formErrors');
			$form_errors_helper->setElementStart('<div class="alert alert-error alert-font-size">') 
            	->setElementSeparator('<br />') 
               	->setElementEnd('</div>'); 
			$mensajesError = $element->getView()->formErrors($messages);
		}
		
		return $mensajesError;
	}
	
	public function getDecoratorInfo(){
		$estados_model = new Estados_Model_Estados();
		
		$estados = $estados_model->fetchAll();
		
		$valores_select_estado = array();
		
		//valor vacio por default
		$valores_select_estado[''] = '';
		foreach ($estados->toArray() as $estado){
			$valores_select_estado[$estado['id_ent']] = $estado['entidad'];
		}
		
		return $valores_select_estado;
	}
	
	public function render($content){
		
		$element = $this->getElement();
		$element->helper = 'formSelect';
		$helper = $element->helper;
		
		$label = '';
		$html_select = "<div class='control-group'>";
		
		if ($element->isRequired ()) {
			$label.= '*';
		}
		$label .= $element->getLabel ();
		$label .= ':';
		
		$html_label = $element->getView ()->formLabel ( $element->getName (), $label, array ('class' => 'control-label' ) );
		
		$valores_select_estado = $this->getDecoratorInfo();
		
		$attribs 		= (is_array($element->field_attribs)) ? array_merge($element->field_attribs, array('class' => 'span2')) : array('class' => 'span2');
		$select_estados = $element->getView()->$helper($element->getName(),$element->getValue(),$attribs,$valores_select_estado);
		
		$mensajesError = $this->getErrorMessages($element);
		
		$html_select .= $html_label;
		$html_select .= "<div class='controls'>{$select_estados}{$mensajesError}</div></div>";
		
		return $html_select;
	}
}