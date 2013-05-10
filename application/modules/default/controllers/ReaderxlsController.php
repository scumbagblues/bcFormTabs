<?php

class Default_ReaderxlsController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
    	
    }

    public function indexAction()
    {
        // action body
	    //  Read your Excel workbook
	    // Se declara la clase PHPExcel para no tener problemas de que alguna clase no se "autocargue"
	
    	$phpexcel = new PHPExcel();
    	$base_url = realpath ( dirname ( '.' ) ) . "/uploads/";;

    	$inputFileName = $base_url . 'Enfermedades_CIE10.xlsx';
		try {
		    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
		    $objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
		    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		
		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$array_index = array('enf_codigo','enf_nombre','enf_descripcion');
		$enfermedades_model = new Default_Model_Enfermedades();
		
		
    	for ($row = 2; $row <= $highestRow; ++$row) {  
			for ($col = 0; $col < $highestColumn; ++$col) {  
				    $value	= $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
				    $col_name = $array_index[$col];  
				    $rows_enfermedades[$col_name] = utf8_decode($value);
				    //$items_content[$row-1][$col_name] = utf8_decode($value);
			}  	    
			 $enfermedades_model->insert($rows_enfermedades);
		}
		
		
	 }

}

