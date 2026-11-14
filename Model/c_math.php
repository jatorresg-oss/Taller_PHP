<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}

$value = $_POST["value"];
$option = $_POST["option"];

if (!ctype_digit($value)) {
    header("Location: ../math.php?error=1");
}

switch ($option) {
    case "1":
        $num1 = 0;
        $num2 = 1;
        $num3 = 0;
        $result = "| ";

        for ($i = 0; $i < $value; $i++) {
            $result .= "$num1" . " | ";
            $num3 = $num1 + $num2;
            $num1 = $num2;
            $num2 = $num3;
        }

        header("Location: ../math.php?r=$result");
        break;
    case "2":
        $total = 1;

        for ($i = 0; $i < $value; $i++) {
            $total *= ($i + 1);
            $mult .= ($i + 1);

            if (($i + 1) != $value) {
                $mult .= " x ";
            }
        }

        $result = $value . "!= " . $mult . " = " . $total;

        header("Location: ../math.php?r=$result");
        break;
}