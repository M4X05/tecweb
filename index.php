<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>
<section>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>

        <?php
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';

        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo "<li>Valor de \$a: " . $a . "\n</li>";
        echo "<li>Valor de \$b: " . $b . "\n</li>";
        echo "<li>Valor de \$c: " . $c . "\n</li>";

        $a = "PHP server";
        $b = &$a;

        echo "<li>Nuevo Valor de \$a: " . $a . "\n</li>";
        echo "<li>Nuevo Valor de \$b: " . $b . "\n</li>";
        echo '</ul>';

        echo '<p>Lo que ocurrio en las nuevas asignaciones fue que ahora los valores de a y b cambiaron a nuevos valores</p>'
        ?>
</section>

<section>
    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo):</p>

       <?php 
       echo '<h4>Respuesta:</h4>';
       echo '<ul>';

       $a = "PHP5";
       echo "<li>Valor de \$a: = 'PHP5:'\n</li>";
       var_dump($a);

       $z[] = &$a;
       echo "<li>Valor de \$z: = '&$a: '\n</li>";
       var_dump($z);

       $b = "5a version de PHP";
       echo "<li>Valor de \$b: = '5a version de PHP: '\n</li>";
       var_dump($b);

       if (is_numeric($b)){
            $c = $b * 10;
       } else {
            $c = intval($b) * 10;
       }
       echo "<li>Valor de \$c = '$b * 10': $c\n</li>";       
       var_dump($c);

       $a .= $b;
       echo "<li>Valor de \$a: = '$b: '\n</li>";
       var_dump($a);

       $b *= $c;
       echo "<li>Valor de \$b: = '$b: '\n</li>";
       var_dump($b);

       $z[0] = "MySQL";
       echo "<li>Valor de \$z: = 'MySQL '\n</li>";
       var_dump($z);
       ?>
</section>

<section>
    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</p>

        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        global $a, $b, $c, $z;
        $a = "PHP5";
        echo "<li>Valor de \$a = PHP5:\n";
        var_dump($a);
        
        $z[] = &$a;
        echo "<li>Valor de \$z = &$a:\n";
        var_dump($z);

        $b = "5a version de PHP";
        echo "<li>Valor de \$b = '5a version de PHP':\n";
        var_dump($b);     

        if (is_numeric($b)) {
            $c = $b * 10;
        } else {
            $c = intval($b) * 10;
        }
        echo "<li>Valor de \$c * 10:\n";
        var_dump($c);

        $a .= $b;
        echo "<li>Valor de \$a .= $b:\n";
        var_dump($a);

        $b *= $c;
        echo "<li>Valor de \$a *= $c:\n";
        var_dump($a);

        $z[0] = "MySQL";
        echo "<li>Valor de \$z = MySQL:\n";
        var_dump($z);
        ?>
</section>

<section>
    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”; 
    <p>$b = (integer) $a;</p> $a = “9E3”; 
    <p>$c = (double) $a;</p>

        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
 
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;

        echo "<li>Valor de \$a " . $a . "\n";
        echo "<li>Valor de \$b " . $b . "\n";
        echo "<li>Valor de \$c " . $c . "\n"; 
        ?>
</section>

<section>
    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(datos)</p>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que se pueda mostrar con un echo:</p>

        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo "<li>Valor booleano de \$a:\n";
        var_dump((bool) $a);

        echo "<li>Valor booleano de \$b:\n";
        var_dump((bool) $b);

        echo "<li>Valor booleano de \$c:\n";
        var_dump((bool) $c);

        echo "<li>Valor booleano de \$d:\n";
        var_dump((bool) $d);

        echo "<li>Valor booleano de \$e:\n";
        var_dump((bool) $e);

        echo "<li>Valor booleano de \$f:\n";
        var_dump((bool) $f);

        echo '</ul>';

        echo '<p>Para poder transforar el valor boolenao de $c y $e en uno que se puede mostrar con un echo, se puede utilizar var_export(). Esta funcion devuelve una representacion legible de una variable que puede ser evaluada por eval()</p>'
        ?>

</section>

<section>
<h2>Ejercicio 7</h2>
<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
<ul>
    <li>La version de Apache y PHP</li>
    <li>El nombre del sistema operativo (servidor)</li>
    <li>El idioma del navegador (cliente)</li>
</ul>
        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        //Version de PHP
        echo "<p>Version de PHP: " . phpversion() . "</p>";

        //Version de Apache
        echo "<p>Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";

        //Nombre del sitema operativo
        echo "<p>Nombre del sistema operativo del servidor: " . $_SERVER['SERVER_SIGNATURE'] . "</p>";
        
        //Idioma del navegador
        echo "<p>Idioma del navegador del cliente: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>";
        ?>
</section>
</body>
</html>