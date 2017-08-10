<?php

class battle
{
    function attack($data, $nopl, $novc)
    {
        //var_dump($data,$nopl,$novc);
        //die();
        $mana = $data[$nopl]['mana'];
        $blood = $data[$novc]['blood'];
        $attacker = $data[$nopl]['name'];
        $victim = $data[$novc]['name'];


        $basic = 20;
        $fortune = rand(0, 10);
        $misfor = rand(0, 15);

        $attack = ($basic + $fortune)-$misfor;
        $sisa_mana = $mana - 5;
        $sisa_blood = $blood - $attack;
        echo "  Player $attacker Attack Player $victim Hit $attack Blood".PHP_EOL;
        echo "  Blood Player $victim decreased to $sisa_blood ".PHP_EOL;
        echo "  Mana $attacker decreased to $sisa_mana".PHP_EOL;
       
        $data[$novc]['blood'] = $sisa_blood;
        $data[$nopl]['mana'] = $sisa_mana;

        return $data;
    }
}
