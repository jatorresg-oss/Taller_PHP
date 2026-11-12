<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbol Binario</title>
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
        <h2>Crear Arbol Binario</h2>
        <form action="Model/c_tree.php" method="post">
            <label>Preorden:</label><br>
            <input type="text" name="preorden" placeholder="A,B,D,E,C">
            <br>
            <label>Inorden:</label><br>
            <input type="text" name="inorden" placeholder="D,B,E,A,C">
            <br>
            <label>Postorden:</label><br>
            <input type="text" name="postorden" placeholder="D,E,B,C,A">
            <br>
            <button type="submit" name="enviar" class="op">Construir arbol</button>
        </form>
    </div>



    <br>
    <a href="index.php" class="back">Volver</a>
</body>