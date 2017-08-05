<?php

require_once "../lingkaran/input.php";
require_once "filternilai.php";

$input = new input();
echo "Masukan Nilai : ";
$nilai = $input->read_stdin();
$min = 1;
$max = 100;

if (filter_var($nilai, FILTER_VALIDATE_INT,array("options" => array("min_range"=>$min, "max_range"=>$max))))
{
$nilaina = new filternilai();
$indexni = $nilaina->indexnilai($nilai);
echo "Nilai Yang Anda Masukan Adalah : $nilai".PHP_EOL;
echo "Index Nilai : $indexni ".PHP_EOL;
}
else
{
    echo "Input Yang Anda Masukan Salah".PHP_EOL;
} 
