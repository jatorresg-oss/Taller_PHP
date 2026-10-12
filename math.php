<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculos Matemáticos</title>
</head>

<body>
    <h1>Calcular Números Crecientes con Matemáticas</h1>
    <div>
        <p>Por Favor, ingrese el número de repeticiones que desea obtener</p>
        <form action="Model/c_math.php" method="post">
            <input type="text" name="value" required>
            <select name="option" id="option">
                <option value="1">Fibonacci</option>
                <option value="2">Factorial</option>
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
    ?>
</body>

</html>