<?php
$title = "<?php?>";

// Se incluye el modelo para poder usar crearArbolPreIn()
include "Model/c_tree.php";

// Dibuja un nodo y sus hijos dentro de una lista HTML
function dibujarArbol($nodo)
{
    if ($nodo == null) {
        return;
    }

    echo "<li>";
    echo "<span class='stem'></span>";
    echo "<span class='node'>" . htmlspecialchars($nodo["valor"]) . "</span>";

    if ($nodo["izq"] != null || $nodo["der"] != null) {
        echo "<ul>";

        if ($nodo["izq"] != null) {
            dibujarArbol($nodo["izq"]);
        }

        if ($nodo["der"] != null) {
            dibujarArbol($nodo["der"]);
        }

        echo "</ul>";
    }

    echo "</li>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbol Binario</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
    <link rel="stylesheet" href="CSS/tree.css" />
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
        <p>Ingresa al menos dos recorridos separados por comas.</p>
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
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["error"])) {
        if ($_GET["error"] == 1) {
            echo "<p class='r'>Debes ingresar al menos dos recorridos.</p>";
        } else if ($_GET["error"] == 2) {
            echo "<p class='r'>No se permiten nodos repetidos.</p>";
        } else if ($_GET["error"] == 3) {
            echo "<p class='r'>Los recorridos deben tener los mismos nodos.</p>";
        } else if ($_GET["error"] == 4) {
            echo "<p class='r'>Los recorridos no forman un árbol válido.</p>";
        }
    }

    if (isset($_GET["p"]) && isset($_GET["i"])) {
        $pre = explode(",", $_GET["p"]);
        $in = explode(",", $_GET["i"]);

        $arbol = crearArbolPreIn($pre, $in);

        echo "<div class='tree-result'>";
        echo "<div class='tree-wrapper'>";
        echo "<ul class='tree'>";
        dibujarArbol($arbol);
        echo "</ul>";
        echo "</div>";

        echo "<p class='r'><b>Preorden:</b> " . htmlspecialchars($_GET["p"]) . "</p>";
        echo "<p class='r'><b>Inorden:</b> " . htmlspecialchars($_GET["i"]) . "</p>";

        if (isset($_GET["o"])) {
            echo "<p class='r'><b>Postorden:</b> " . htmlspecialchars($_GET["o"]) . "</p>";
        }

        echo "</div>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>
