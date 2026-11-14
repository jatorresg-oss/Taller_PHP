<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
}

$A = $_POST["A"];
$B = $_POST["B"];

$setA = explode(",", trim($A));
$setB = explode(",", trim($B));

// Unión: elementos de A y elementos de B que no estén en A.
$unionElements = $setA;

foreach ($setB as $element) {
    if (!in_array($element, $unionElements, true)) {
        $unionElements[] = $element;
    }
}

// Intersección: elementos que están en A y también en B.
$intersectionElements = [];

foreach ($setA as $element) {
    if (in_array($element, $setB, true)) {
        $intersectionElements[] = $element;
    }
}

// A - B: elementos que están en A pero no en B.
$setABElements = [];

foreach ($setA as $element) {
    if (!in_array($element, $setB, true)) {
        $setABElements[] = $element;
    }
}

// B - A: elementos que están en B pero no en A.
$setBAElements = [];

foreach ($setB as $element) {
    if (!in_array($element, $setA, true)) {
        $setBAElements[] = $element;
    }
}

$union = implode(", ", $unionElements);
$intersection = implode(", ", $intersectionElements);
$setAB = implode(", ", $setABElements);
$setBA = implode(", ", $setBAElements);

header("Location: ../set.php?u=$union&i=$intersection&ab=$setAB&ba=$setBA");
