<?php

//
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
//$demas = array(
//    array('label' => __('Reporte entradas y salidas por pasaporte del dia '.$fecha), 'width' => 'auto', 'filter' => FALSE),
//    
//);
$table = array(
    array('label' => __('CODIGO DE PASAPORTE'), 'width' => 'auto', 'filter' => true),
    array('label' => __('TIPO DE PASAPORTE'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CANTIDAD DE ENTRADAS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CANTIDAD DE SALIDAS'), 'width' => 'auto', 'filter' => true),
);

// heading
//$this->PhpExcel->addTableHeader($demas, array('name' => 'Cambria', 'bold' => true))->mergeCells('A1:D1');
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data

//if($datos != null) {
    foreach ($datos2 as $dato) {
        $this->PhpExcel->addTableRow(array(
            $dato['Codigo'],
            $dato['Tipo'],
            $dato['Cantidad'],
            $dato['Cantidad'],
        ));
    }
//}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte de entradas y salidas por pasaporte del $fecha.xlsx");
?>