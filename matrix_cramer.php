<?php

function determinant($matrix = array()) {
    foreach ($matrix as $row) {
        if (sizeof($matrix) != sizeof($row)) {
            return false;
        }
    }
    $dimension = sizeof($matrix);
    if ($dimension == 1) {
        return $matrix[0][0];
    }
    if ($dimension == 2) {
        return ($matrix[0][0] * $matrix[1][1] - $matrix[0][1] * $matrix[1][0]);
    }
    $sum = 0;
    for ($i = 0; $i < $dimension; $i++) {
        $smallMatrix = array();
        for ($j = 0; $j < $dimension - 1; $j++) {
            $smallMatrix[$j] = array();
            for ($k = 0; $k < $dimension; $k++) {
                if ($k < $i) $smallMatrix[$j][$k] = $matrix[$j + 1][$k];
                if ($k > $i) $smallMatrix[$j][$k - 1] = $matrix[$j + 1][$k];
            }
        }
        if ($i % 2 == 0){
            $sum += $matrix[0][$i] * determinant($smallMatrix);
        } else {
            $sum -= $matrix[0][$i] * determinant($smallMatrix);
        }
    }
    return $sum;
}

function equationSystem($leftMatrix = array(), $rightMatrix = array()) {
    if (!is_array($leftMatrix) || !is_array($rightMatrix)) {
        return false;
    }
    if (sizeof($leftMatrix) != sizeof($rightMatrix)) {
        return false;
    }
    $M = determinant($leftMatrix);
    if (!$M) {
        return false;
    }
    $x = array();
    foreach ($rightMatrix as $rk => $rv) {
        $xMatrix = $leftMatrix;
        foreach ($rightMatrix as $rMk => $rMv) {
            $xMatrix[$rMk][$rk] = $rMv;
        }
        $x[$rk] = determinant($xMatrix) / $M;
    }
    return $x;
}
