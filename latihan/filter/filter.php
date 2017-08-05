<?php

require_once "../lingkaran/input.php";

$input = new input();
echo "Masukan Data : ";
$data = $input->read_stdin();

if (filter_var($data, FILTER_VALIDATE_INT) || filter_var($data, FILTER_VALIDATE_INT) === 0 ) {
    echo "Data Yang Anda Masukan Adalah : $data".PHP_EOL;
    echo "Data Adalah Angka ".PHP_EOL;
} else {
    echo "Data Yang Anda Masukan Adalah : $data".PHP_EOL;
    echo "Data Adalah Huruf ".PHP_EOL;
}