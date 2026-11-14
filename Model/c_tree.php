<?php

// Si se abre este archivo directamente sin enviar el formulario, vuelve al inicio.
// tree.php también lo incluye para poder usar sus funciones.
if ($_SERVER["REQUEST_METHOD"] != "POST" && basename($_SERVER["PHP_SELF"]) == "c_tree.php") {
    header("Location: ../index.php");
    exit;
}

// Convierte "A, B, C" en ["A", "B", "C"]
function convertirRecorrido($texto)
{
    $resultado = [];

    if (trim($texto) == "") {
        return $resultado;
    }

    $partes = explode(",", $texto);

    for ($i = 0; $i < count($partes); $i++) {
        $valor = trim($partes[$i]);

        if ($valor != "") {
            $resultado[] = $valor;
        }
    }

    return $resultado;
}

// Comprueba si dos recorridos tienen los mismos nodos
function mismoContenido($a, $b)
{
    sort($a);
    sort($b);

    return $a == $b;
}

// Comprueba si un recorrido tiene nodos repetidos
function tieneRepetidos($lista)
{
    return count($lista) != count(array_unique($lista));
}

// Construye el árbol con preorden e inorden
function crearArbolPreIn($pre, $in)
{
    if (count($pre) == 0) {
        return null;
    }

    $raiz = $pre[0];
    $posicion = array_search($raiz, $in);

    return [
        "valor" => $raiz,
        "izq" => crearArbolPreIn(
            array_slice($pre, 1, $posicion),
            array_slice($in, 0, $posicion)
        ),
        "der" => crearArbolPreIn(
            array_slice($pre, $posicion + 1),
            array_slice($in, $posicion + 1)
        )
    ];
}

// Construye el árbol con postorden e inorden
function crearArbolPostIn($post, $in)
{
    if (count($post) == 0) {
        return null;
    }

    $raiz = $post[count($post) - 1];
    $posicion = array_search($raiz, $in);

    return [
        "valor" => $raiz,
        "izq" => crearArbolPostIn(
            array_slice($post, 0, $posicion),
            array_slice($in, 0, $posicion)
        ),
        "der" => crearArbolPostIn(
            array_slice($post, $posicion, count($post) - $posicion - 1),
            array_slice($in, $posicion + 1)
        )
    ];
}

// Construye el árbol con preorden y postorden
function crearArbolPrePost($pre, $post)
{
    if (count($pre) == 0) {
        return null;
    }

    $raiz = [
        "valor" => $pre[0],
        "izq" => null,
        "der" => null
    ];

    if (count($pre) == 1) {
        return $raiz;
    }

    $postSinRaiz = array_slice($post, 0, count($post) - 1);
    $posicion = array_search($pre[1], $postSinRaiz);
    $cantidadIzquierda = $posicion + 1;

    $raiz["izq"] = crearArbolPrePost(
        array_slice($pre, 1, $cantidadIzquierda),
        array_slice($post, 0, $cantidadIzquierda)
    );

    $raiz["der"] = crearArbolPrePost(
        array_slice($pre, $cantidadIzquierda + 1),
        array_slice(
            $post,
            $cantidadIzquierda,
            count($post) - $cantidadIzquierda - 1
        )
    );

    return $raiz;
}

// Obtienen los recorridos del árbol construido
function obtenerPreorden($nodo, &$lista)
{
    if ($nodo == null) {
        return;
    }

    $lista[] = $nodo["valor"];
    obtenerPreorden($nodo["izq"], $lista);
    obtenerPreorden($nodo["der"], $lista);
}

function obtenerInorden($nodo, &$lista)
{
    if ($nodo == null) {
        return;
    }

    obtenerInorden($nodo["izq"], $lista);
    $lista[] = $nodo["valor"];
    obtenerInorden($nodo["der"], $lista);
}

function obtenerPostorden($nodo, &$lista)
{
    if ($nodo == null) {
        return;
    }

    obtenerPostorden($nodo["izq"], $lista);
    obtenerPostorden($nodo["der"], $lista);
    $lista[] = $nodo["valor"];
}


// ==========================================
// RECIBIR LOS DATOS DEL FORMULARIO
// ==========================================

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pre = convertirRecorrido($_POST["preorden"]);
    $in = convertirRecorrido($_POST["inorden"]);
    $post = convertirRecorrido($_POST["postorden"]);

    $cantidad = 0;

    if (!empty($pre)) {
        $cantidad++;
    }

    if (!empty($in)) {
        $cantidad++;
    }

    if (!empty($post)) {
        $cantidad++;
    }

    if ($cantidad < 2) {
        header("Location: ../tree.php?error=1");
        exit;
    }

    if (tieneRepetidos($pre) || tieneRepetidos($in) || tieneRepetidos($post)) {
        header("Location: ../tree.php?error=2");
        exit;
    }

    $base = [];

    if (!empty($pre)) {
        $base = $pre;
    } else if (!empty($in)) {
        $base = $in;
    } else {
        $base = $post;
    }

    if (
        (!empty($pre) && !mismoContenido($base, $pre)) ||
        (!empty($in) && !mismoContenido($base, $in)) ||
        (!empty($post) && !mismoContenido($base, $post))
    ) {
        header("Location: ../tree.php?error=3");
        exit;
    }

    // Se usan los dos primeros recorridos disponibles
    if (!empty($pre) && !empty($in)) {
        $arbol = crearArbolPreIn($pre, $in);
    } else if (!empty($in) && !empty($post)) {
        $arbol = crearArbolPostIn($post, $in);
    } else {
        $arbol = crearArbolPrePost($pre, $post);
    }

    $preResultado = [];
    $inResultado = [];
    $postResultado = [];

    obtenerPreorden($arbol, $preResultado);
    obtenerInorden($arbol, $inResultado);
    obtenerPostorden($arbol, $postResultado);

    // Comprobar que los recorridos escritos por el usuario sean correctos
    if (
        (!empty($pre) && $preResultado != $pre) ||
        (!empty($in) && $inResultado != $in) ||
        (!empty($post) && $postResultado != $post)
    ) {
        header("Location: ../tree.php?error=4");
        exit;
    }

    $direccion = "../tree.php?" .
        "p=" . urlencode(implode(",", $preResultado)) .
        "&i=" . urlencode(implode(",", $inResultado)) .
        "&o=" . urlencode(implode(",", $postResultado));

    header("Location: " . $direccion);
    exit;
}
