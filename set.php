<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjuntos</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
    <link rel="stylesheet" href="CSS/set.css" />
</head>

<body>
    <header class="Main_bar">
        <div class="title">
            <a href="index.php">
                <h1>Taller </h1>
                <div class="php">
                    <?php echo ("<h1>" . htmlspecialchars($title) . "</h1>"); ?>
                </div>
            </a>
        </div>
        <div class="options">
            <ul>
                <li><a href="acronym.php">Acrónimo</a></li>
                <li><a href="math.php">Fibonacci</a></li>
                <li><a href="stats.php">Estadistica</a></li>
                <li><a href="set.php">Conjuntos</a></li>
                <li><a href="convertion.php">Binario</a></li>
                <li><a href="tree.php">Árbol</a></li>
                <li><a href="calculator.php">Calculadora</a></li>
            </ul>
        </div>
    </header>
    <div class="app">
        <h1>Operaciones Entre Conjuntos</h1>
        <form action="Model/c_set.php" method="post">
            <label>Conjunto A</label><br>
            <label class="Text_set">A = { <input name="A" type="text" placeholder="1, 2, 3, 4, 5" required>
                }</label><br>
            <label>Conjunto B</label><br>
            <label class="Text_set">B = { <input name="B" type="text" placeholder="5, 6, 7, 8, 9" required>
                }</label><br>
            <button type="submit" class="op">Enviar</button>
        </form>

    </div>

    <?php
    if (isset($_GET["u"], $_GET["i"], $_GET["ab"], $_GET["ba"])) {
        $union = htmlspecialchars($_GET["u"]);
        $intersection = htmlspecialchars($_GET["i"]);
        $setAB = htmlspecialchars($_GET["ab"]);
        $setBA = htmlspecialchars($_GET["ba"]);
        echo "<p class='r'>A U B = { $union }</p>";
        echo "<p class='r'>A ∩ B = { $intersection }</p>";
        echo "<p class='r'>A - B = { $setAB }</p>";
        echo "<p class='r'>B - A = { $setBA }</p>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>