<?php

class Agenda_IndexController extends Weezer_Controller_Base
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $fecha = date("Y-m-d");
        $this->view->fecha = $this->showDate($fecha);
        
        //se obtienen los doctores para generar el select del calendario
        $doctores_table = new ListaEspera_Model_Medicos();
        $select_doctores = $doctores_table->getDoctoresInfo();
        $this->view->doctores = $select_doctores;
        
        $mes 	= ($this->_getParam('mes')) ? $this->_getParam('mes') : date('m');
        $anio	= ($this->_getParam('anio')) ? $this->_getParam('anio') : date('Y');

        if (is_null($mes) && is_null($anio)){
        	
        	if (date('m') -1 == 0){
        		$mes_anterior = 12;
        		$anio_anterior = date('Y') -1;
        	}else{
        		$mes_anterior = date('m') -1;
        		$anio_anterior = date('Y');
        	}
        	
        	if (date('m') +1 == 13){
        		$mes_siguiente = 1;
        		$anio_siguiente = date('Y') +1;
        	}else{
        		$mes_siguiente = date('m') +1;
        		$anio_siguiente = date('Y');
        	}
        	
        	$calendar_date = $this->getMonthName(date('m')) . ' ' . date(Y);
        	$this->view->calendar_date	= $calendar_date;
        	$this->view->mes_anterior 	= $mes_anterior;
        	$this->view->mes_siguiente 	= $mes_siguiente;
        	$this->view->anio_anterior 	= $anio_anterior;
        	$this->view->anio_siguiente = $anio_siguiente;
        }else{
        	
        	if ($mes -1 == 0){
        		$mes_anterior = 12;
        		$anio_anterior = $anio -1;
        	}else{
        		$mes_anterior = $mes -1;
        		$anio_anterior = $anio;
        	}
        	 
        	if ($mes +1 == 13){
        		$mes_siguiente = 1;
        		$anio_siguiente = $anio +1;
        	}else{
        		$mes_siguiente = $mes +1;
        		$anio_siguiente = $anio;
        	}
        	
        	$calendar_date = $this->getMonthName($mes) . ' ' . $anio;
        	$this->view->calendar_date	= $calendar_date;
        	$this->view->mes_anterior 	= $mes_anterior;
        	$this->view->mes_siguiente 	= $mes_siguiente;
        	$this->view->anio_anterior 	= $anio_anterior;
        	$this->view->anio_siguiente = $anio_siguiente;
        }
        
    	$grid_calendar = $this->gridCalendar($mes, $anio);
    	$this->view->calendar = $grid_calendar;
        
        
    }
    
    
    public function gridCalendar($mes,$year){
    	
    	$grid = "<tr>";
    	
    	$dia_actual = 1;
    	
    	//calculo el numero del dia de la semana del primer dia
    	$numero_dia = $this->calculaNumeroDiaSemana(1,$mes,$year);
    	//calculo el último dia del mes
    	$ultimo_dia = $this->ultimoDia($mes,$year);
    	
    	for ($i=0;$i<7;$i++){
    			
    		if ($i < $numero_dia){
    				
    			//si el dia de la semana i es menor que el numero del primer dia de la semana no pongo nada en la celda
    			$grid.= '<td class="diainvalido"><span></span></td>';
    				
    		} else{
    	
    			$grid.= "<td class='diavalido'><span><a href='javascript:devuelveFecha($dia_actual,$mes,$year)'";
    			$grid.= $this->getStyleCalendar($dia_actual,$mes,$year).">$dia_actual<br />".$ejes[$dia_actual];
    			$grid.= "</span></a></td>";
    					$dia_actual++;
    	
    		}
     	}
     	
     	//recorro todos los demás días hasta el final del mes
     	$numero_dia = 0;
     	
     	while ($dia_actual <= $ultimo_dia){
     	
     		//si estamos a principio de la semana escribo el <TR>
     		if ($numero_dia == 0)
     			$grid.= "<tr>";
	     		$grid.= "<td class='diavalido'><span><a href='javascript:devuelveFecha($dia_actual,$mes,$year)'";
	     		$grid.= $this->getStyleCalendar($dia_actual,$mes,$year).">$dia_actual <br />".$ejes[$dia_actual];
	     		$dia_actual++;
	     		$numero_dia++;
	     		//si es el ultimo de la semana, me pongo al principio de la semana y escribo el </tr>
	     		if ($numero_dia == 7){
	     		$numero_dia = 0;
	     		$grid.= "</tr>";
     		}
     		}
     	
     		//compruebo que celdas me faltan por escribir vacias de la última semana del mes
     		for ($i=$numero_dia;$i<7;$i++){
     			$grid.='<td class="diainvalido"><span></span></td>';
		}
     	
		$grid.= "</tr>";
		
		return $grid;
    	
    }
    
    public function getStyleCalendar($dia_imprimir,$mes,$ano){
    
    	$f = $ano."-".$mes."-".$dia_imprimir;
    
    	if($dias){
    		$estilo = " class='cita'";
    	}else{
    		//dependiendo si el día es Hoy, Domigo o Cualquier otro, devuelvo un estilo
    		if ($dia_solo_hoy == $dia_imprimir && $mes==date("n", $tiempo_actual) && $ano==date("Y", $tiempo_actual)){
    			//si es hoy
    			$estilo = " class='hoy'";
    		}else{
    			$fecha=mktime(12,0,0,$mes,$dia_imprimir,$ano);
    			if (date("w",$fecha)==0){
    				//si es domingo
    				$estilo = " class='domingo'";
    			}else{
    				//si es cualquier dia
    				$estilo = " class='diario'";
    			}
    		}
    	}
    	return $estilo;
    }
    
    public function ultimoDia($mes,$ano){
    	 
    	$ultimo_dia = 28;
    	while (checkdate($mes,$ultimo_dia + 1,$ano)){
    		$ultimo_dia++;
    	}
    		
    	return $ultimo_dia;
    }
    
    public function calculaNumeroDiaSemana($dia,$mes,$ano){
    	$numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$ano));
    	if ($numerodiasemana == 0)
    		$numerodiasemana = 6;
    	else
    		$numerodiasemana--;
    
    	return $numerodiasemana;
    }
    
    public function showDate($fecha){
    
    	list($a,$m,$d) = explode("-",$fecha);
    		
    	$months = array("0"=> "-"	,
    			"01"=>"Enero"	, "02"=>"Febrero","03"=>"Marzo"	 	,"04"=>"Abril"	,"05"=>"Mayo"	  ,"06"=>"Junio"	,
    			"07"=>"Julio"	, "08"=>"Agosto" ,"09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
    
    	$f = $d." de ".$months[$m]." del ".$a;
    
    	return($f);
    }
    
    
    
    
    protected function getMonthName($mes){
    
    	switch ($mes){
    		case 1:
    			$nombre_mes="Enero";
    			break;
    		case 2:
    			$nombre_mes="Febrero";
    			break;
    		case 3:
    			$nombre_mes="Marzo";
    			break;
    		case 4:
    			$nombre_mes="Abril";
    			break;
    		case 5:
    			$nombre_mes="Mayo";
    			break;
    		case 6:
    			$nombre_mes="Junio";
    			break;
    		case 7:
    			$nombre_mes="Julio";
    			break;
    		case 8:
    			$nombre_mes="Agosto";
    			break;
    		case 9:
    			$nombre_mes="Septiembre";
    			break;
    		case 10:
    			$nombre_mes="Octubre";
    			break;
    		case 11:
    			$nombre_mes="Noviembre";
    			break;
    		case 12:
    			$nombre_mes="Diciembre";
    			break;
    	}
    	return $nombre_mes;
    }


}

