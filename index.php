<?php
session_start();
session_destroy();
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
</head>

<body>
    <header class="Main_bar">
        <div class="title">
            <h1>Taller </h1>
            <div class="php">
                <?php echo ("<h1>" . htmlspecialchars($title) . "</h1>"); ?>
            </div>
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

    <h2>Menú</h2>
</body>

</html>