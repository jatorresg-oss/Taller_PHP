<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}

$text = $_POST["text"];
$patron = '/^[- \d. ]+$/';
$numbers = [];
$count = 0;
$avg = 0;
$frecuency = 0;
$mode = 0;
$sum = 0;

//verificación de numeros
if (!preg_match($patron, $text)) {
    header("Location: ../stats.php?error=1");
}

//creación de array con los numeros enviados
for ($i = 0; $i < mb_strlen($text); $i++) {
    if  (ctype_digit(mb_substr($text, $i,1)) && mb_substr($text, $i + 1,1) == " ") {
        $count++;
    } elseif (ctype_digit(mb_substr($text, $i,1)) ) {
        $numbers[$count] .= mb_substr($text, $i, 1);
    }
}

//sumatoria de los numeros
$sum = array_sum($numbers);

//media
$avg = $sum / count($numbers);
//moda
$frecuency = array_count_values($numbers);
$max = max($frecuency);
$mode = array_search($max, $frecuency);


header("Location: ../stats.php?a=$sum&m=$mode");

