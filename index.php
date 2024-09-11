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

       $z[] = &$a;
       echo "<li>Valor de \$z: = '&$a: '\n</li>";

       $b = "5a version de PHP";
       echo "<li>Valor de \$b: = '5a version de PHP: '\n</li>";

       @$c = $b * 10;
       echo "<li>Valor de \$c = '$b * 10': $c\n</li>";       

       $a .= $b;
       echo "<li>Valor de \$a: = '$b: '\n</li>";

       $b *= $c;
       echo "<li>Valor de \$b: = '$b: '\n</li>";

       $z[0] = "MySQL";
       echo "<li>Valor de \$z: = 'MySQL '\n</li>";
       ?>
</section>

<section>
    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</p>

        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        @$c = $b*10;
        $a .= $b;
        $b *= $c;
        $z[0] = "MySQL";

        echo "<li>Valor de \$a: " . $GLOBALS['a'] . "</li>\n";  
        echo "<li>Valor de \$b: " . $GLOBALS['b'] . "</li>\n";  
        echo "<li>Valor de \$c: " . $GLOBALS['c'] . "</li>\n";  
        echo "<li>Valor de \$z[0]: " . $GLOBALS['z'][0] . "</li>\n";
        
        echo '</ul>';
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

        echo "<li>Valor de a: 9E3";
        echo "<li>Valor de b: 7";
        echo "<li>Valor de c: 9000"; 

        ?>
</section>

<section>
    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(datos)</p>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que se pueda mostrar con un echo:</p>

        <?php
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';

        echo '<li>$a = "0"</li>';
        echo '<li>$b = "TRUE"</li>';
        echo '<li>$c = "FALSE"</li>';
        echo '<li>$d = ($a OR $b)</li>';
        echo '<li>$e = ($a AND $c)</li>';
        echo '<li>$f = ($a XOR $b)</li>';

        echo '</ul>';

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo "Valor de a: ";
        var_dump ((bool)$a);
        echo'<br>';

        echo "Valor de b: "; 
        var_dump ((bool)$b);
        echo'<br>';

        echo "Valor de c: ";
        var_dump ($c);
        echo'<br>';

        echo "Valor de d: "; 
        var_dump  ($d);
        echo'<br>';

        echo "Valor de e: "; 
        var_dump ($e);
        echo'<br>';

        echo "Valor de f: ";
        var_dump ($f);
        echo '<br>';
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