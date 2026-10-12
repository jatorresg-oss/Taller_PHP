<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acrónimo</title>
</head>

<body>
    <h1>Crear Acrónimo</h1>
    <div>
        <p>Por farvor, ingrese el texto que desea convertir a un Acrónimo</p>
        <form action="Model/c_acronym.php" method="post">
            <input type="text" name="text" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <?php
    if (!empty($_GET["i"])) {
        $initials = $_GET["i"];
        echo "<p>Acrónimo: $initials</p>";
    }
    ?>
</body>

</html>