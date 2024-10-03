<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    
    <?php
        // Variables PHP para evaluación
        $_myvar = null;
        $_7var = null;
        // myvar;  // Inválida, falta el signo '$'.
        $myvar = null;
        $var7 = null;
        $_element1 = null;
        // $house*5; // Inválida, el asterisco (*) no es permitido en nombres de variables.
        
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con un guión bajo seguido de caracteres alfanuméricos.</li>';
        echo '<li>$_7var es válida porque cumple con la regla de iniciar con un carácter válido ($ o _).</li>';
        echo '<li>myvar es inválida porque falta el signo de dólar ($).</li>';
        echo '<li>$myvar es válida porque comienza con un signo de dólar seguido de caracteres válidos.</li>';
        echo '<li>$var7 es válida porque inicia con una letra y puede tener números después.</li>';
        echo '<li>$_element1 es válida porque inicia con un guión bajo y sigue con caracteres alfanuméricos.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido en nombres de variables.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
        
    <?php
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';

        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo "<li>Valor de \$a: " . $a . "</li>";
        echo "<li>Valor de \$b: " . $b . "</li>";
        echo "<li>Valor de \$c: " . $c . "</li>";

        $a = "PHP server";
        $b = &$a;

        echo "<li>Nuevo valor de \$a: " . $a . "</li>";
        echo "<li>Nuevo valor de \$b: " . $b . "</li>";
        echo '</ul>';

        echo '<p>Al reasignar $a, $b también toma el mismo valor porque ambas variables son referencias.</p>';
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación y verifica la evolución del tipo de estas variables:</p>

    <?php 
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        $a = "PHP5";
        echo "<li>Valor de \$a: " . $a . "</li>";
            
        $z[] = &$a;
        echo "<li>Valor de \$z: \n";

        $b = "5a version de PHP";
        echo "<li>Valor de \$b: " . $b . "</li>";

        @$c = $b * 10;
        echo "<li>Valor de \$c: $c</li>";       

        $a .= $b;
        echo "<li>Valor de \$a después de concatenar \$b: $a</li>";

        $b *= $c;
        echo "<li>Valor de \$b después de multiplicar por \$c: $b</li>";

        $z[0] = "MySQL";
        echo "<li>Valor de \$z[0]: " . $z[0] . "</li>";

        echo '</ul>';
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables usando la matriz $GLOBALS:</p>

    <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        global $a, $b, $c, $z;
        echo "<li>Valor de \$a: " . $GLOBALS['a'] . "</li>";
        echo "<li>Valor de \$b: " . $GLOBALS['b'] . "</li>";
        echo "<li>Valor de \$c: " . $GLOBALS['c'] . "</li>";
        echo "<li>Valor de \$z[0]: " . $GLOBALS['z'][0] . "</li>";

        echo '</ul>';
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>

    <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        $a = "7 personas";
        $b = (integer) $a; 
        $a = "9E3";
        $c = (double) $a;

        echo "<li>Valor de \$a: $a</li>";
        echo "<li>Valor de \$b: $b</li>";
        echo "<li>Valor de \$c: $c</li>";  
        echo '</ul>';
    ?>

    <h2>Ejercicio 6</h2>
    <p>Comprobar el valor booleano de las variables $a, $b, $c, $d, $e, y $f:</p>

    <?php
        $a = "0";
        $b = "TRUE";
        $c = false;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
        echo "<li>Valor booleano de \$a: "; var_dump((bool)$a); echo "</li>";
        echo "<li>Valor booleano de \$b: "; var_dump((bool)$b); echo "</li>";
        echo "<li>Valor booleano de \$c: "; var_dump($c); echo "</li>";
        echo "<li>Valor booleano de \$d: "; var_dump($d); echo "</li>";
        echo "<li>Valor booleano de \$e: "; var_dump($e); echo "</li>";
        echo "<li>Valor booleano de \$f: "; var_dump($f); echo "</li>";
        echo '</ul>';
    ?>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>

    <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
        echo "<li>Versión de PHP: " . phpversion() . "</li>";
        echo "<li>Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "</li>";
        echo "<li>Nombre del sistema operativo del servidor: " . php_uname() . "</li>";
        echo "<li>Idioma del navegador del cliente: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</li>";
        echo '</ul>';
    ?>
    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>
</html>
