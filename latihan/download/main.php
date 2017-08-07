<?php

require_once "./cdownload.php";
require_once "../lingkaran/input.php";



$coba = true;

while ($coba) {
    echo "Download Script Cli php".PHP_EOL;

    $input = new input();
    echo "Masukan URL Download : ";
    $url = $input->read_stdin();
    $url = filter_var($url, FILTER_SANITIZE_URL);

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $cdown = new cdownload();

    // start loop here

    //$new_file_name = "testfile.jpg";
    //$url = "http://localhost/apk/akse.JPG";
        $new_file_name = basename($url);

        $temp_file_contents = $cdown->collect_file($url);
        $log = $cdown->write_to_file($temp_file_contents, $new_file_name);
    // end loop here
        echo "Saved In same Directory with this script as $new_file_name".PHP_EOL;
    }
    echo "Coba Lagi ? Press Y untuk melanjutkan : ";
    $pilih = $input->read_stdin();

    if (!strcasecmp( $pilih, 'y' ) == 0 || !strcasecmp( $pilih, 'Y' ) == 0) {
        $coba = false;
    }
}
