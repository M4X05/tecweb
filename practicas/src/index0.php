<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb/practicas/src/" method="get">Ingrese un numero <input type="number" name="numero"><br>
    <br><input type="submit"></form>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>
<hr>
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar</p>
    <form method="post">
        <button type="submit" name="generar">Generar Matriz</button>
    </form> <br>
    <?php
    function generarSecuencia() {
        $matriz = [];
        $iteraciones = 0;
        $secuenciaEncontrada = false;

        while (!$secuenciaEncontrada) {
            $fila = [];
            for ($i = 0; $i < 3; $i++) {
                $numeroAleatorio = rand(1, 1000); 
                $fila[] = $numeroAleatorio;
            }

            $matriz[] = $fila;
            $iteraciones++;

            if ($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0) {
                $secuenciaEncontrada = true;
            }
            }

        foreach ($matriz as $fila) {
                echo implode(', ', $fila) . "<br>";
        }

        $totalNumeros = $iteraciones * 3;

        echo "<h3>{$totalNumeros} números obtenidos en {$iteraciones} iteraciones.</h3>";
        }

            generarSecuencia();
    ?>
<hr>
    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <form method="post">
        <label for="numero">Número para encontrar múltiplos:</label>
        <input type="number" name="numero" value="<?php echo isset($_POST['numero']) ? $_POST['numero'] : ''; ?>" required>
        <button type="submit" name="generar">Generar Número Aleatorio</button>
    </form>
    <?php
        if (isset($_GET['numero'])) {
            $numeroDado = $_GET['numero'];
            $encontrado = false;
            $contador = 0;

            while (!$encontrado) {
                $numeroAleatorio = rand(1, 1000); 
                $contador++;

                if ($numeroAleatorio % $numeroDado == 0) {
                    $encontrado = true;
                    echo "Número aleatorio encontrado: $numeroAleatorio <br>";
                    echo "Iteraciones: $contador";
                }
            }
        } else {
            echo "Por favor, proporciona un número mediante GET. Ejemplo: ?numero=7";
        }
    ?>
<hr>
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner el valor en cada índice.</p>
    <?php
        $arreglo = [];
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i); 
        }

        echo "<table>";
        echo "<tr><th>ASCII</th><th>Letra</th></tr>";
        
        foreach ($arreglo as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }

        echo "</table>";
    ?>
<hr>
    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de bienvenida apropiado.</p>
    
    <h2>Verificación de Rango de Edad y Sexo</h2>
    <form method="post" action="">
        <label for="edad">Ingrese su edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="sexo">Seleccione su sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];

        if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
            echo "<h3>Bienvenida, usted está en el rango de edad permitido.</h3>";
        } else {
            echo "<h3>No cumple con los requisitos.</h3>";
        }
    }
    ?>
<hr>
    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad.</p>
    <form method="post" action="">
        <label for="matricula">Consultar por matrícula (Formato: LLLNNNN):</label><br>
        <input type="text" id="matricula" name="matricula" placeholder="Ej: ABC1234"><br><br>

        <button type="submit" name="buscar">Buscar</button>
        <button type="submit" name="todos">Mostrar todos</button>
    </form>
    <?php
        $parqueVehicular = [
            'ABC1234' => [
                'Auto' => [
                    'marca' => 'Honda',
                    'modelo' => 2020,
                    'tipo' => 'camioneta'
                ],
                'Propietario' => [
                    'nombre' => 'Alfonzo Esparza',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => 'C.U., Jardines de San Manuel'
                    ]
                ],
                'DEF5678' => [
                    'Auto' => [
                        'marca' => 'Mazda',
                        'modelo' => 2019,
                        'tipo' => 'sedan',
                    ],
                    'Propietario' => [
                        'nombre' => 'Ma. del Consuelo Molina',
                        'ciudad' => 'Puebla, Pue.',
                        'direccion' => '97 oriente'
                    ]
                ],
                'GHI9876' => [
                    'Auto' => [
                        'marca' => 'Toyota',
                        'modelo' => 2021,
                        'tipo' => 'hachback'
                    ],
                    'Propietario' => [
                        'nombre' => 'Carlos Pérez',
                        'ciudad' => 'Monterrey, NL',
                        'direccion' => 'Av. Constitución 1234'
                    ]
                ],
                'JKL6543' => [
                    'Auto' => [
                        'marca' => 'Chevrolet',
                        'modelo' => 2018,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Sandra González',
                        'ciudad' => 'Guadalajara, JAL',
                        'direccion' => 'Calle Independencia 45'
                    ]
                ],
                'MNO8765' => [
                    'Auto' => [
                        'marca' => 'Ford',
                        'modelo' => 2020,
                        'tipo' => 'camioneta'
                    ],
                    'Propietario' => [
                        'nombre' => 'Juan López',
                        'ciudad' => 'Ciudad de México',
                        'direccion' => 'Calle Reforma 567'
                    ]
                ],
                'PQR1122' => [
                    'Auto' => [
                        'marca' => 'Nissan',
                        'modelo' => 2017,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Ana Martínez',
                        'ciudad' => 'Veracruz, VER',
                        'direccion' => 'Calle Marina 89'
                    ]
                ],
                'STU3344' => [
                    'Auto' => [
                        'marca' => 'Volkswagen',
                        'modelo' => 2019,
                        'tipo' => 'hachback'
                    ],
                    'Propietario' => [
                        'nombre' => 'Ricardo Fernández',
                        'ciudad' => 'León, GTO',
                        'direccion' => 'Calle Malecón 324'
                    ]
                ],
                'VWX5566' => [
                    'Auto' => [
                        'marca' => 'Kia',
                        'modelo' => 2022,
                        'tipo' => 'camioneta'
                    ],
                    'Propietario' => [
                        'nombre' => 'María Ruiz',
                        'ciudad' => 'Cancún, QR',
                        'direccion' => 'Calle Playa 123'
                    ]
                ],
                'YZA7788' => [
                    'Auto' => [
                        'marca' => 'Hyundai',
                        'modelo' => 2021,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Pedro Hernández',
                        'ciudad' => 'Querétaro, QRO',
                        'direccion' => 'Calle del Sol 789'
                    ]
                ],
                'BCD9988' => [
                    'Auto' => [
                        'marca' => 'Renault',
                        'modelo' => 2016,
                        'tipo' => 'camioneta'
                    ],
                    'Propietario' => [
                        'nombre' => 'Lucía Gómez',
                        'ciudad' => 'Chihuahua, CHIH',
                        'direccion' => 'Calle Revolución 10'
                    ]
                ],
                'EFG7766' => [
                    'Auto' => [
                        'marca' => 'Audi',
                        'modelo' => 2020,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Fernando Castro',
                        'ciudad' => 'Aguascalientes, AGS',
                        'direccion' => 'Calle Central 456'
                    ]
                ],
                'HIJ5544' => [
                    'Auto' => [
                        'marca' => 'BMW',
                        'modelo' => 2021,
                        'tipo' => 'hachback'
                    ],
                    'Propietario' => [
                        'nombre' => 'Sofía Mendoza',
                        'ciudad' => 'Morelia, MIC',
                        'direccion' => 'Calle Libertad 789'
                    ]
                ],
                'KLM3322' => [
                    'Auto' => [
                        'marca' => 'Tesla',
                        'modelo' => 2022,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Roberto Díaz',
                        'ciudad' => 'Tijuana, BC',
                        'direccion' => 'Calle Pacífico 123'
                    ]
                ],
                'NOP1100' => [
                    'Auto' => [
                        'marca' => 'Peugeot',
                        'modelo' => 2019,
                        'tipo' => 'camioneta'
                    ],
                    'Propietario' => [
                        'nombre' => 'Adriana Torres',
                        'ciudad' => 'San Luis Potosí, SLP',
                        'direccion' => 'Calle Centro 456'
                    ]
                ],
                'QRS8877' => [
                    'Auto' => [
                        'marca' => 'Fiat',
                        'modelo' => 2018,
                        'tipo' => 'sedan'
                    ],
                    'Propietario' => [
                        'nombre' => 'Andrés Ortiz',
                        'ciudad' => 'Culiacán, SIN',
                        'direccion' => 'Calle Sinaloa 987'
                    ]
                ]
        ];

        function mostrarInformacionVehiculo($matricula, $info) {
            echo "<h4>Matrícula: $matricula</h4>";
            echo "<ul>";
            echo "<li><strong>Marca:</strong> " . $info['Auto']['marca'] . "</li>";
            echo "<li><strong>Modelo:</strong> " . $info['Auto']['modelo'] . "</li>";
            echo "<li><strong>Tipo:</strong> " . $info['Auto']['tipo'] . "</li>";
            echo "<li><strong>Propietario:</strong> " . $info['Propietario']['nombre'] . "</li>";
            echo "<li><strong>Ciudad:</strong> " . $info['Propietario']['ciudad'] . "</li>";
            echo "<li><strong>Dirección:</strong> " . $info['Propietario']['direccion'] . "</li>";
            echo "</ul><hr>";
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matricula = $_POST['matricula'] ?? '';
        
            if (isset($_POST['buscar'])) {
                if (array_key_exists($matricula, $parqueVehicular)) {
                    echo "<h3>Información del vehículo con matrícula $matricula:</h3>";
                    mostrarInformacionVehiculo($matricula, $parqueVehicular[$matricula]);
                } else {
                    echo "<h3>Error: No se encontró un vehículo con la matrícula $matricula.</h3>";
                }
            }
        
            if (isset($_POST['todos'])) {
                echo "<h3>Todos los vehículos registrados:</h3>";
                foreach ($parqueVehicular as $matricula => $info) {
                    mostrarInformacionVehiculo($matricula, $info);
                }
            }
        }

        echo "<pre>";
        print_r($parqueVehicular);
        echo "</pre>";
    ?>
     
</body>
</html>