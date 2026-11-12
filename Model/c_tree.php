<?php

class Nodo {

    public $valor;
    public $izquierdo;
    public $derecho;

    public function __construct($valor) {

        $this->valor = $valor;
        $this->izquierdo = null;
        $this->derecho = null;

    }
}


// ==========================================
// CLASE ARBOL BINARIO
// ==========================================

class ArbolBinario {

    private $raiz;


    // CONSTRUIR EL ARBOL
    public function construir($pre, $in, $post) {

        if (!empty($pre) && !empty($in)) {

            // Si hay preorden e inorden, se utilizan estos dos
            $this->raiz = $this->desdePreIn($pre, $in);

        } else if (!empty($in) && !empty($post)) {

            $this->raiz = $this->desdePostIn($post, $in);

        } else if (!empty($pre) && !empty($post)) {

            $this->raiz = $this->desdePrePost($pre, $post);

        } else {

            throw new Exception("Debes ingresar minimo dos recorridos.");

        }

    }


    // ==========================================
    // CONSTRUIR CON PREORDEN E INORDEN
    // ==========================================

    private function desdePreIn($pre, $in) {

        if (count($pre) == 0) {
            return null;
        }

        // El primer elemento del preorden es la raiz
        $valor = $pre[0];

        $raiz = new Nodo($valor);

        // Buscar la raiz en el inorden
        $posicion = array_search($valor, $in);

        if ($posicion === false) {
            throw new Exception("Los recorridos no coinciden.");
        }

        // Separar el inorden
        $inIzquierdo = array_slice($in, 0, $posicion);
        $inDerecho = array_slice($in, $posicion + 1);

        // Separar el preorden
        $preIzquierdo = array_slice($pre, 1, $posicion);
        $preDerecho = array_slice($pre, $posicion + 1);

        // Construir los hijos recursivamente
        $raiz->izquierdo = $this->desdePreIn(
            $preIzquierdo,
            $inIzquierdo
        );

        $raiz->derecho = $this->desdePreIn(
            $preDerecho,
            $inDerecho
        );

        return $raiz;

    }


    // ==========================================
    // CONSTRUIR CON POSTORDEN E INORDEN
    // ==========================================

    private function desdePostIn($post, $in) {

        if (count($post) == 0) {
            return null;
        }

        // El ultimo elemento del postorden es la raiz
        $ultimo = count($post) - 1;

        $valor = $post[$ultimo];

        $raiz = new Nodo($valor);

        // Buscar la raiz en el inorden
        $posicion = array_search($valor, $in);

        if ($posicion === false) {
            throw new Exception("Los recorridos no coinciden.");
        }

        // Separar el inorden
        $inIzquierdo = array_slice($in, 0, $posicion);
        $inDerecho = array_slice($in, $posicion + 1);

        // Separar el postorden
        $postIzquierdo = array_slice($post, 0, $posicion);

        $postDerecho = array_slice(
            $post,
            $posicion,
            count($post) - $posicion - 1
        );

        // Construir los hijos
        $raiz->izquierdo = $this->desdePostIn(
            $postIzquierdo,
            $inIzquierdo
        );

        $raiz->derecho = $this->desdePostIn(
            $postDerecho,
            $inDerecho
        );

        return $raiz;

    }


    // ==========================================
    // CONSTRUIR CON PREORDEN Y POSTORDEN
    // ==========================================

    private function desdePrePost($pre, $post) {

        if (count($pre) == 0) {
            return null;
        }

        // El primer elemento del preorden es la raiz
        $raiz = new Nodo($pre[0]);

        if (count($pre) == 1) {
            return $raiz;
        }

        // El siguiente elemento es el inicio del subarbol izquierdo
        $siguiente = $pre[1];

        // Buscar ese elemento en el postorden
        $postSinRaiz = array_slice($post, 0, count($post) - 1);

        $posicion = array_search($siguiente, $postSinRaiz);

        if ($posicion === false) {
            throw new Exception("Los recorridos no coinciden.");
        }

        // Determinar cuantos elementos pertenecen al lado izquierdo
        $cantidadIzquierda = $posicion + 1;

        // Separar los recorridos
        $preIzquierdo = array_slice($pre, 1, $cantidadIzquierda);

        $preDerecho = array_slice($pre, $cantidadIzquierda + 1);

        $postIzquierdo = array_slice($post, 0, $cantidadIzquierda);

        $postDerecho = array_slice(
            $post,
            $cantidadIzquierda,
            count($post) - $cantidadIzquierda - 1
        );

        // Construir los hijos
        $raiz->izquierdo = $this->desdePrePost(
            $preIzquierdo,
            $postIzquierdo
        );

        $raiz->derecho = $this->desdePrePost(
            $preDerecho,
            $postDerecho
        );

        return $raiz;

    }


    // ==========================================
    // RECORRIDO PREORDEN
    // ==========================================

    public function obtenerPreorden() {

        return $this->recorrerPreorden($this->raiz);

    }

    private function recorrerPreorden($nodo) {

        $resultado = [];

        if ($nodo != null) {

            // Primero la raiz
            $resultado[] = $nodo->valor;

            // Despues el hijo izquierdo
            $izquierdo = $this->recorrerPreorden($nodo->izquierdo);

            // Finalmente el hijo derecho
            $derecho = $this->recorrerPreorden($nodo->derecho);

            $resultado = array_merge($resultado, $izquierdo, $derecho);

        }

        return $resultado;

    }


    // ==========================================
    // RECORRIDO INORDEN
    // ==========================================

    public function obtenerInorden() {

        return $this->recorrerInorden($this->raiz);

    }

    private function recorrerInorden($nodo) {

        $resultado = [];

        if ($nodo != null) {

            // Primero el hijo izquierdo
            $izquierdo = $this->recorrerInorden($nodo->izquierdo);

            $resultado = array_merge($resultado, $izquierdo);

            // Despues la raiz
            $resultado[] = $nodo->valor;

            // Finalmente el hijo derecho
            $derecho = $this->recorrerInorden($nodo->derecho);

            $resultado = array_merge($resultado, $derecho);

        }

        return $resultado;

    }


    // ==========================================
    // RECORRIDO POSTORDEN
    // ==========================================

    public function obtenerPostorden() {

        return $this->recorrerPostorden($this->raiz);

    }

    private function recorrerPostorden($nodo) {

        $resultado = [];

        if ($nodo != null) {

            // Primero el hijo izquierdo
            $izquierdo = $this->recorrerPostorden($nodo->izquierdo);

            // Despues el hijo derecho
            $derecho = $this->recorrerPostorden($nodo->derecho);

            $resultado = array_merge($resultado, $izquierdo, $derecho);

            // Finalmente la raiz
            $resultado[] = $nodo->valor;

        }

        return $resultado;

    }


    // ==========================================
    // MOSTRAR LA ESTRUCTURA DEL ARBOL
    // ==========================================

    public function mostrarArbol() {

        echo "<pre>";

        $this->dibujar($this->raiz, 0, "RAIZ");

        echo "</pre>";

    }

    private function dibujar($nodo, $nivel, $tipo) {

        if ($nodo != null) {

            echo str_repeat("    ", $nivel);
            echo $tipo . ": " . htmlspecialchars($nodo->valor) . "\n";

            $this->dibujar($nodo->izquierdo, $nivel + 1, "IZQUIERDO");

            $this->dibujar($nodo->derecho, $nivel + 1, "DERECHO");

        }

    }

}


// ==========================================
// FUNCIONES PARA RECIBIR Y VALIDAR DATOS
// ==========================================


// Convertir el texto recibido en un arreglo
function convertirRecorrido($texto) {

    $resultado = [];

    if (trim($texto) != "") {

        $elementos = explode(",", $texto);

        foreach ($elementos as $elemento) {

            $elemento = trim($elemento);

            if ($elemento == "") {
                throw new Exception("No puedes dejar elementos vacios.");
            }

            $resultado[] = $elemento;

        }

    }

    return $resultado;

}


// Verificar que los nodos no se repitan
function validarRepetidos($recorrido) {

    if (count($recorrido) != count(array_unique($recorrido))) {

        throw new Exception("No se permiten nodos repetidos.");

    }

}


// Verificar que los recorridos tengan los mismos elementos
function validarElementos($pre, $in, $post) {

    $principal = [];

    if (!empty($pre)) {
        $principal = $pre;
    } else if (!empty($in)) {
        $principal = $in;
    } else {
        $principal = $post;
    }

    sort($principal);

    $recorridos = [$pre, $in, $post];

    foreach ($recorridos as $recorrido) {

        if (!empty($recorrido)) {

            sort($recorrido);

            if ($principal != $recorrido) {

                throw new Exception("Los recorridos deben tener los mismos nodos.");

            }

        }

    }

}


// ==========================================
// PROCESAR LOS DATOS RECIBIDOS POR POST
// ==========================================

if (isset($_POST["enviar"])) {

    try {

        // Recibir los datos
        $preorden = $_POST["preorden"];
        $inorden = $_POST["inorden"];
        $postorden = $_POST["postorden"];


        // Convertir los recorridos en arreglos
        $pre = convertirRecorrido($preorden);
        $in = convertirRecorrido($inorden);
        $post = convertirRecorrido($postorden);


        // Validar que existan minimo dos recorridos
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

            throw new Exception("Debes ingresar minimo dos recorridos.");

        }


        // Validar que no existan elementos repetidos
        validarRepetidos($pre);
        validarRepetidos($in);
        validarRepetidos($post);


        // Validar que los recorridos tengan los mismos nodos
        validarElementos($pre, $in, $post);


        // Crear el objeto
        $arbol = new ArbolBinario();


        // Construir el arbol
        $arbol->construir($pre, $in, $post);


        // Obtener los tres recorridos del arbol
        $resultadoPre = $arbol->obtenerPreorden();
        $resultadoIn = $arbol->obtenerInorden();
        $resultadoPost = $arbol->obtenerPostorden();


        // Comprobar que los recorridos sean correctos
        if (!empty($pre) && $resultadoPre != $pre) {

            throw new Exception("El preorden ingresado no es valido.");

        }

        if (!empty($in) && $resultadoIn != $in) {

            throw new Exception("El inorden ingresado no es valido.");

        }

        if (!empty($post) && $resultadoPost != $post) {

            throw new Exception("El postorden ingresado no es valido.");

        }


        // ==========================================
        // MOSTRAR RESULTADOS
        // ==========================================

        echo "<h2>Arbol construido correctamente</h2>";

        echo "<h3>Estructura del arbol</h3>";

        $arbol->mostrarArbol();


        echo "<h3>Recorridos obtenidos</h3>";

        echo "<p><b>Preorden:</b> ";
        echo implode(" → ", $resultadoPre);
        echo "</p>";

        echo "<p><b>Inorden:</b> ";
        echo implode(" → ", $resultadoIn);
        echo "</p>";

        echo "<p><b>Postorden:</b> ";
        echo implode(" → ", $resultadoPost);
        echo "</p>";


    } catch (Exception $e) {

        echo "<h3>Error</h3>";

        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";

    }

}