<?php

require_once "input.php";
require_once "lingkaran.php";

$input = new input();
echo "Masukan Jari - Jari Lingkaran : ";
$jari = $input->read_stdin();

if(filter_var($jari, FILTER_VALIDATE_INT))
{
$lingkar = new lingkaran();
$luas = $lingkar->luas($jari);
$keli = $lingkar->keliling($jari);

echo "Jari - Jari Yang Anda Masukan Adalah : $jari".PHP_EOL;
echo "Luas Lingkaran : $luas ".PHP_EOL;
echo "Keliling Lingkaran : $keli ".PHP_EOL;
}
else
{
    echo "Input Yang Anda Masukan Salah".PHP_EOL;
} 
