<?php

class HistorialClinico_Form_Historial extends Weezer_Catalog_Form_Abstract
{
	protected $_decorators_default 	= array('Composite');

    public function init()
    {
        $this->setName( 'frmhistorial');
		$this->setAction('#');
		//Path hacia los decoradores
		$this->addElementPrefixPaths(array(
			'decorator' => array(
				'Weezer_Form_Decorator' => 'Weezer/Form/Decorator/'
				)
			)
		);
		
		$this->_attribs = array('name' => 'frmRoles'
				,'class' => 'form-horizontal');
		
		
		$options['required'] = TRUE;
		$options ['decorators'] = array('Composite');
		$options ['multiOptions'] = array('Si' => 'Si','No' => 'No');
		
		$options_interr = array_merge($options,array('label' => 'Interrogatorio directo'));
		$options_ministerio = array_merge($options,array('label' => 'Se aviso al ministerio publico'));
		
		$this->addElement('select','pid_interrogatorio',$options_interr);
		$this->addElement('select','pid_ministerio',$options_ministerio);
    }

	
}

