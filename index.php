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
    <div class="App_list">
        <h1>Menú</h1>
        <div>
            <h2>Acrónimo</h2>
            <p>
                Escribe una frase o un nombre compuesto por varias palabras y obtén automáticamente sus iniciales. Por
                ejemplo, al escribir «Portable Network Graphics», recibirás «PNG».
            </p>
            <button class="Btn_list"><a href="acronym.php">Acrónimo</a></button>
            <h2>Fibonacci</h2>
            <p>
                Ingresa un número y elige si deseas conocer su sucesión de Fibonacci o su factorial. La aplicación
                realizará el cálculo y te mostrará el resultado de forma sencilla.
            </p>
            <button class="Btn_list"><a href="math.php">Fibonacci</a></button>
            <h2>Estadistica</h2>
            <p>
                Ingresa los números que deseas analizar y obtén sus resultados estadísticos. La aplicación te permitirá
                conocer el promedio, la media y la moda de los datos.
            </p>
            <button class="Btn_list"><a href="stats.php">Estadistica</a></button>
            <h2>Conjuntos</h2>
            <p>
                Escribe los elementos de dos conjuntos y descubre cuáles tienen en común, cuáles son diferentes y qué
                elementos reúnen entre ambos.
            </p>
            <button class="Btn_list"><a href="set.php">Conjuntos</a></button>
            <h2>Binario</h2>
            <p>
                Ingresa cualquier número entero y conviértelo fácilmente al sistema binario. La aplicación te mostrará
                su equivalente utilizando únicamente ceros y unos.
            </p>
            <button class="Btn_list"><a href="convertion.php">Binario</a></button>
            <h2>Árbol</h2>
            <p>
                Ingresa dos recorridos de un árbol y observa cómo se reconstruye su estructura. También podrás
                visualizar cómo se organiza la información y conocer sus diferentes recorridos.
            </p>
            <button class="Btn_list"><a href="tree.php">Árbol</a></button>
            <h2>Calculadora</h2>
            <p>
                Realiza operaciones matemáticas básicas con números enteros o decimales. Además, podrás consultar las
                operaciones que has realizado anteriormente o borrar el historial cuando lo necesites.
            </p>
            <button class="Btn_list"><a href="calculator.php">Calculadora</a></button>
        </div>
    </div>
</body>

</html>