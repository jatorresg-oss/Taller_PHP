<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <h1>Calculadora</h1>
    <div>
        <form action="Model/c_calculator.php" method="post">
            <label>Valor 1</label>
            <br>
            <input type="text" name="value1">
            <br>
            <label>Valor 2</label>
            <br>
            <input type="text" name="value2">
            <br>
            <select name="option" id="option">
                <option value="1">Suma (+)</option>
                <option value="2">Resta (-)</option>
                <option value="3">Multiplicación (*)</option>
                <option value="4">División (/)</option>
                <option value="5">Modulo (%)</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["error"])) {
        echo "<p>El valor ingresado no es un número</p>";
    }
    if (!empty($_GET["r"])) {
        $result = $_GET["r"];
        echo "<p>Resultado: $result</p>";
    }


    if (isset($_SESSION["History"])) {
        echo "<p>HISTORIAL</p>" . $_SESSION["History"];
    }
    ?>
    <br>
    <div>
        <form action="calculator.php" method="get">
            <input type="text" value="1" name="rq" hidden>
            <button type="submit">Borrar Historial</button>
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
    <a href="index.php">Volver</a>
</body>

</html>