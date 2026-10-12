<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}



$value = $_POST["value"];
$mod = 3;

