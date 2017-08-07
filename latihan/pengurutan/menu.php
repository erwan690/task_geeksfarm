<?php

require_once "../lingkaran/input.php";
require_once "./urut.php";

$coba = true;

while ($coba) {
    $input = new input();
    echo "Masukan Jumlah Nilai Yang Akan Di Urutkan (1-n): ";
    $jml = $input->read_stdin();
    if (filter_var($jml, FILTER_VALIDATE_INT)) {
        $data = array();

        for ($i=0; $i < $jml; $i++) {
            $urutan = $i+1;
            echo "Masukan Nilai ke - $urutan : ";
            $inputna = $input->read_stdin();
            if (filter_var($inputna, FILTER_VALIDATE_INT)) {
                $data[]=$inputna;
            } else {
                echo "Nilai Masukan Salah".PHP_EOL;
                $i--;
            }
        }

        $urut = new urut();
        $dataurut = $urut->sortingnumber($data);

        for ($x=0; $x < $jml; $x++) {
            $uruta = $x+1;
            echo "Nilai Setelah Di Sorting ke - $uruta adalah : ".$dataurut[$x].PHP_EOL;
        }
    } else {
            echo "Nilai Masukan Salah".PHP_EOL;
    }
    echo "Coba Lagi ? Press Y untuk melanjutkan (Y/y) : ";
    $pilih = $input->read_stdin();

    if (!strcasecmp( $pilih, 'y' ) == 0 || !strcasecmp( $pilih, 'Y' ) == 0) {
        $coba = false;
    }
}
