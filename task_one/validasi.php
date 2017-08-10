<?php

class validasi
{

    function validnama($allplayer, $nama)
    {
        if (!count($allplayer) == 0) {
            foreach ($allplayer as $key => $value) {
                if ($value['name'] == $nama) {
                    return false;
                } else {
                    return true;
                }
            }
        } else {
            return true;
        }
    }

    function finddeath($data)
    {
        $dataupdate = array();
        foreach ($data as $key => $value) 
        {
            if ($value['blood'] < 0 || $value['mana'] < 0 ) 
            {
                continue;
            }
            else
            {
                $dataupdate[]=$value;
            }
        }

        return $dataupdate;
    }

}
