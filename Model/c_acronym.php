<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}

$text = $_POST["text"];

$words = [];
$cont = 0;
$initials = "";

for ($i = 0; $i < mb_strlen($text, 'UTF-8'); $i++) {
    if ((preg_match('/^[a-zA-Z]+$/', substr($text, $i, 1))) && (substr($text, $i + 1, 1) == " " || substr($text, $i + 1, 1) == "-")) {
        $cont++;    
    }elseif (preg_match('/^[a-zA-Z]+$/', substr($text, $i, 1 ))) {
        $words[$cont] .= substr($text, $i, 1);
    }
}

for ($i = 0; $i < count($words); $i++) {
    $initials .= strtoupper(substr($words[$i], 0, 1));
}

header("Location: ../acronym.php?i=$initials");