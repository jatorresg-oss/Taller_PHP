<?php
session_start();
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
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
    <h1>Calculadora</h1>
    <div class="app">
        <form action="Model/c_calculator.php" method="post">
            <label>Valor 1</label>
            <br>
            <input type="text" name="value1">
            <br>
            <label>Valor 2</label>
            <br>
            <input type="text" name="value2">
            <br>
            <select name="option" id="option" class="op">
                <option value="1">Suma (+)</option>
                <option value="2">Resta (-)</option>
                <option value="3">Multiplicación (*)</option>
                <option value="4">División (/)</option>
                <option value="5">Modulo (%)</option>
            </select>
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["error"])) {
        echo "<p class='r'>El valor ingresado no es un número</p>";
    }
    if (!empty($_GET["r"])) {
        $result = $_GET["r"];
        echo "<p class='r'>Resultado: $result</p>";
    }


    if (isset($_SESSION["History"])) {
        echo "<p class='r'>HISTORIAL</p>" . $_SESSION["History"] ;
    }
    ?>
    <br>
    <div>
        <form action="calculator.php" method="get">
            <input type="text" value="1" name="rq" hidden>
            <button type="submit" class="back">Borrar Historial</button>
        </form>
    </div>
    <?php
    if (!empty($_GET["rq"])) {
        session_destroy();
        header("Location: calculator.php");
    }
    ?>
    <br>
    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>