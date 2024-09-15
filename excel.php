<?php
require "src/spout-master/src/Spout/Autoloader/autoload.php";
include 'dbconfig.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql_tieudiem = "SELECT * FROM TieuDiem WHERE id = '$id'";

$list_tieudiem = $conn->query($sql_tieudiem);
$row = $list_tieudiem->fetch_assoc();

$name = $row['name'];

$writer = WriterEntityFactory::createXLSXWriter();
// $writer = WriterEntityFactory::createODSWriter();
// $writer = WriterEntityFactory::createCSVWriter();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="{$name}.xlsx"');

$writer->openToBrowser($name.".xlsx"); // write data to a file or to a PHP stream
//$writer->openToBrowser($fileName); // stream data directly to the browser

$sql_cauhoi = "SELECT * FROM CauHoi WHERE idtieudiem = '{$row['id']}'";

$list_cauhoi = $conn->query($sql_cauhoi);

while($cauhoi = $list_cauhoi->fetch_assoc()) {
    $cells = [
        WriterEntityFactory::createCell($cauhoi['noidung'])
    ];
    $singleRow = WriterEntityFactory::createRow($cells);
    $writer->addRow($singleRow);
    
    $sql_dapan = "SELECT * FROM DapAn WHERE idcauhoi = '{$cauhoi['id']}'";
    
    $chr = 65;
    
    $list_dapan = $conn->query($sql_dapan);
    while($dapan = $list_dapan->fetch_assoc()) {
        $cells = [
            WriterEntityFactory::createCell(chr($chr)),
            WriterEntityFactory::createCell($dapan['noidung']),
            WriterEntityFactory::createCell($dapan['status']),
        ];
        $singleRow = WriterEntityFactory::createRow($cells);
        $writer->addRow($singleRow);
        $chr++;
    }
}




/** add a row at a time */


/** add multiple rows at a time */
$multipleRows = [
    WriterEntityFactory::createRow($cells),
    WriterEntityFactory::createRow($cells),
];
$writer->addRows($multipleRows); 

/** Shortcut: add a row from an array of values */
$values = ['Fc', 'is', 'great!'];
$rowFromValues = WriterEntityFactory::createRowFromArray($values);
$writer->addRow($rowFromValues);

$writer->close();
