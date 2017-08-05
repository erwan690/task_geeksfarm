<?php

require_once "../lingkaran/input.php";
require_once "./kalkulator.php";

$input = new input();
echo "Masukan Nilai ke 1 : ";
$a = $input->read_stdin();
echo "Masukan Nilai ke 2 : ";
$b = $input->read_stdin();

echo "Pilih Operasi : ".PHP_EOL;
echo "1.Tambah".PHP_EOL;
echo "2.Kurang".PHP_EOL;
echo "3.Kali".PHP_EOL;
echo "4.Bagi".PHP_EOL;
echo "Silahkan Masukan pilihan (1-4) : ";
$bil = $input->read_stdin();

$kalku = new kalkulator();

$opena = 0;
$kal="operator";

switch ($bil) {
    case $bil==1:
        $kal="Tambah";
        $opena = $kalku->tambah($a, $b);
        break;
    case $bil==2:
        $kal="Kurang";
        $opena = $kalku->kurang($a, $b);
        break;
    case $bil==3:
        $kal="Kali";
        $opena = $kalku->kali($a, $b);
        break;
    case $bil==4:
        $kal="Bagi";
        $opena = $kalku->bagi($a, $b);
        break;
    
    default:
        echo "Masukan Salah".PHP_EOL;
        break;
}

if(!$opena == 0)
{
echo "Hasil dari $a $kal $b adalah $opena".PHP_EOL;
}