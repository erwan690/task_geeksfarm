<?php


class lingkaran
{
    
    function luas($jari)
    {
        $phi = 22/7;
        $luas = $phi*$jari*$jari;
        return $luas;

    }

    function keliling($jari)
    {
        $phi = 22/7;
        $keliling = $phi*($jari+$jari);
        return $keliling;

    }
    
}