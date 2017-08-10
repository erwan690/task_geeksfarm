<?php

require_once "./player.php";
require_once "../latihan/lingkaran/input.php";
require_once "./validasi.php";
require_once "./battle.php";

$input = new input();
$player = new player();
$validasi = new validasi();
$battle = new battle();
$allplayer = array();

$menu = true;
while ($menu) {
    echo "# ======================== #".PHP_EOL;
    echo "# Welcome To Battle Arena  #".PHP_EOL;
    echo "# ======================== #".PHP_EOL;
    echo "# Please Select Options :  #".PHP_EOL;
    echo "# ======================== #".PHP_EOL;
    echo "# 1.Create New Player      #".PHP_EOL;
    echo "# 2.Status Player          #".PHP_EOL;
    echo "# 3.Start Battle           #".PHP_EOL;
    echo "# ======================== #".PHP_EOL;
    echo "# Crtl + C for Exit        #".PHP_EOL;
    echo "# ======================== #".PHP_EOL;
    echo "  Options (1-3) :";
    $option1 = $input->read_stdin();

    if (strcasecmp( $option1, '1' ) == 0) {
        echo "  Please Insert New Name : ";
        $name = strtolower($input->read_stdin());
        if ($validasi->validnama($allplayer, $name)) {
            $player->set_nama($name);
            $allplayer []= array( 'name'=>$name,
                                'blood'=>$player->get_blood(),
                                'mana'=>$player->get_mana()
                                );
        } else {
            echo "  Sorry Your Name Already Exist".PHP_EOL;
        }
        //var_dump($allplayer);
    } elseif (strcasecmp( $option1, '2' ) == 0) {
        $jml = count($allplayer);
        echo "  Current Player : $jml".PHP_EOL;
        $j = 1;
        foreach ($allplayer as $key => $value) {
            echo "  $j.".$value['name'];
            echo " Mana = ".$value['mana'];
            echo " Blood = ".$value['blood'].PHP_EOL;
            $j++;
        }
    } elseif (strcasecmp( $option1, '3' ) == 0) {
        $jmldata=count($allplayer);
        if ($jmldata > 1) {
            echo "# ======================== #".PHP_EOL;
            echo "# Please Select Player :   #".PHP_EOL;
            echo "# ======================== #".PHP_EOL;
            $y = 1;
            foreach ($allplayer as $key => $value) {
                echo "  $y.".$value['name'].PHP_EOL;
                $y++;
            }
            echo "  Options (1-$jmldata) :";
            $attack = $input->read_stdin();
            if (filter_var($attack, FILTER_VALIDATE_INT) && $attack-1 < $jmldata) {
                echo "# ======================== #".PHP_EOL;
                echo "# Please Select Victim :   #".PHP_EOL;
                echo "# ======================== #".PHP_EOL;
                $z = 1;
                foreach ($allplayer as $key => $value) {
                       echo "  $z.".$value['name'].PHP_EOL;
                       $z++;
                }
                echo "  Options (1-$jmldata) :";
                $victim = $input->read_stdin();
                if (filter_var($victim, FILTER_VALIDATE_INT) && $victim-1 < $jmldata) {
                    if ($victim != $attack) {
                        $dataupdate = $battle->attack($allplayer, $attack-1, $victim-1);
                        $cekmati = $validasi->finddeath($dataupdate);
                        //var_dump($cekmati);
                        //die();
                        $allplayer = $cekmati;
                        if (count($allplayer) == 1 || count($allplayer) == 1) {
                            echo "  Congrats Is only One Player survive !!!".PHP_EOL;
                            echo "  This The End Of Game".PHP_EOL;
                             echo "Try Again? Press Y for Continue : ";
                            $pilih = $input->read_stdin();

                            if (!strcasecmp( $pilih, 'y' ) == 0 || !strcasecmp( $pilih, 'Y' ) == 0) {
                                $menu = false;
                            }
                        }
                    } else {
                        echo "  You Can't Attack Yourself !!!".PHP_EOL;
                    }
                } else {
                    echo "  Wrong Options !!!".PHP_EOL;
                }
            } else {
                echo "  Wrong Options !!!".PHP_EOL;
            }
        } else {
            echo "  Please Create At Least 2 Player !!!".PHP_EOL;
        }
    } else {
        echo "  Wrong Options !!!".PHP_EOL;
    }
}
