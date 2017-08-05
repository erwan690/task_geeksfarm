<?php

class urut
{
    function sortingnumber($data)
    {
        $total = count($data);
        for ($i=0; $i < $total; $i++) {
            for ($x=$i; $x < $total; $x++) {
                if ($data[$i]< $data[$x]) {
                    $temp=$data[$i];
                    $data[$i]=$data[$x];
                    $data[$x]=$temp;
                }
            }
        }
        return $data;
    }
}
