<?php

class player
{
    private $nama;
    private $blood = 100;
    private $mana = 40;

    function get_nama()
    {
        return $this->nama;
    }
    function get_blood()
    {
        return $this->blood;
    }
    function get_mana()
    {
        return $this->mana;
    }
    function set_nama($nama)
    {
        $this->nama = $nama;
    }

    function set_blood($blood)
    {
        $this->blood = $blood;
    }

    function set_mana($mana)
    {
        $this->mana = $mana;
    }
}
