<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculos Matemáticos</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
    <link rel="stylesheet" href="CSS/math.css" />
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
        <h1>Calcular Números Crecientes con Matemáticas</h1>
        <p>Por Favor, ingrese el número de repeticiones que desea obtener</p>
        <form action="Model/c_math.php" method="post">
            <input type="text" name="value" required>
            <select name="option" id="option" class="option">
                <option value="1">Fibonacci</option>
                <option value="2">Factorial</option>
            </select>
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["error"])) {
        echo "<p>El valor ingresado no es un número</p>";
    }
    if (!empty($_GET["r"])) {
        $result = $_GET["r"];
        echo "<p class='r'>Resultado: $result</p>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>