<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}


$value = $_POST["value"];
$number = (int) $value;

if ($number == 0) {
    $value .= $value;
    $result = $value;
}

while ($number != 0) {
    $result .= $number % 2;
    $number = intdiv($number, 2);
}

$result = strrev($result);


header("Location: ../convertion.php?b=$result&v=$value");