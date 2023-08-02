<?php
for ($i = 1; $i <= 3; $i++) {
    // Membuat spasi sebelum karakter bintang
    for ($j = 3 - $i; $j > 0; $j--) {
        echo " ";
    }

    // Mencetak karakter bintang
    for ($k = 1; $k <= $i; $k++) {
        echo "*";
    }

    // Mencetak baris baru setelah mencetak satu baris
    echo "<br>";
}
