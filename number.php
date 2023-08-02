<?php

function printPattern($n)
{
    for ($i = 1; $i <= $n; $i++) {
        // Mencetak spasi sebelum angka
        for ($j = $n - $i; $j > 0; $j--) {
            echo "-";
        }

        // Mencetak angka
        for ($k = 1; $k <= $i; $k++) {
            echo $k;
        }

        // Mencetak baris baru setelah mencetak satu baris
        echo "<br>";
    }
}

// Input dari pengguna
$number = 3;

// Mencetak pola berdasarkan input pengguna
printPattern($number);
