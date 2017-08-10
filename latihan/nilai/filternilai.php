<?php

class filternilai
{
    function indexnilai($nilai)
    {
        $inilai = "F";
       
        switch ($nilai) {
            case $nilai >= 80:
                $inilai = "A";
                break;
            case $nilai >= 65 && $nilai < 80:
                $inilai = "B";
                break;
            case $nilai >= 45 && $nilai < 65:
                $inilai = "C";
                break;
            case $nilai >= 30 && $nilai < 45:
                $inilai = "D";
                break;
            case $nilai < 30:
                $inilai = "E";
                break;
            
            default:
                $inilai = "F";
                break;
        }

        return $inilai;
    }
}
