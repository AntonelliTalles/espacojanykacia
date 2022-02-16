<?php

function alphaID($in, $to_num = false, $pad_up = false) {
    // Letras que serão usadas no índice textual
    $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $base = strlen($index);

    if ($to_num) {
        // Tradução de texto para número
        $in = strrev($in);
        $out = 0;
        $len = strlen($in) - 1;
        for ($t = 0; $t <= $len; $t++) {
            $bcpow = bcpow($base, $len - $t);
            $out = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
        }

        if (is_numeric($pad_up)) {
            $pad_up--;
            if ($pad_up > 0) {
                $out -= pow($base, $pad_up);
            }
        }
    } else {
        // Tradução de número para texto
        if (is_numeric($pad_up)) {
            $pad_up--;
            if ($pad_up > 0) {
                $in += pow($base, $pad_up);
            }
        }

        $out = "";
        for ($t = floor(log10($in) / log10($base)); $t >= 0; $t--) {
            $a = floor($in / bcpow($base, $t));
            $out = $out . substr($index, $a, 1);
            $in = $in - ($a * bcpow($base, $t));
        }
        $out = strrev($out);
    }

    return $out;
}

?>