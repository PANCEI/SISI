<?php
function bintang($number)
{
    for ($i = $number; $i > 0; $i--) {

        for ($space = 1; $space <= $i; $space++) {
            echo "&nbsp";
        }
        for ($bintang = $number; $bintang >= $i; $bintang--) {
            echo "*";
        }
        echo "<br>";
    }
}
bintang(5);
bintang(2);
