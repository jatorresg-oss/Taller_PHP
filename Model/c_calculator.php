<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}

session_start();

$value1 = $_POST["value1"];
$value2 = $_POST["value2"];
$option = $_POST["option"];
$result = 0;
$history = "";


if (isset($_SESSION["History"])) {
    $save = $_SESSION["History"];
}

if (!ctype_digit($value)) {
    header("Location: ../calculator.php?error=1");
}

switch ($option) {
    case '1':
        $result = $value1 + $value2;
        $history = "<p>$value1 + $value2 = $result</p>" . $save;
        $_SESSION["History"] = $history;
        header("Location: ../calculator.php?r=$result");
        break;
    case '2':
        $result = $value1 - $value2;
        $history = "<p>$value1 - $value2 = $result</p>" . $save;
        $_SESSION["History"] = $history;
        header("Location: ../calculator.php?r=$result");
        break;
    case '3':
        $result = $value1 * $value2;
        $history = "<p>$value1 * $value2 = $result</p>" . $save;
        $_SESSION["History"] = $history;
        header("Location: ../calculator.php?r=$result");
        break;
    case '4':
        $result = $value1 / $value2;
        $history = "<p>$value1 / $value2 = $result</p>" . $save;
        $_SESSION["History"] = $history;
        header("Location: ../calculator.php?r=$result");
        break;
    case '5':
        $result = $value1 % $value2;
        $history = "<p>$value1 % $value2 = $result</p>" . $save;
        $_SESSION["History"] = $history;
        header("Location: ../calculator.php?r=$result");
        break;
}
