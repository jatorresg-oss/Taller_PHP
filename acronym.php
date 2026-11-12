<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acrónimo</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
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
        <h1>Crear Acrónimo</h1>
        <p>Por farvor, ingrese el texto que desea convertir a un Acrónimo</p>
        <form action="Model/c_acronym.php" method="post">
            <input type="text" name="text" required>
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>
    <?php
    if (!empty($_GET["i"])) {
        $initials = $_GET["i"];
        echo "<p class='r'>Acrónimo: $initials</p>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>