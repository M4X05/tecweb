<?php
    function esMultiploDe5y7($num) {
        if ($num % 5 == 0 && $num % 7 == 0) {
            return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
        } else {
            return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
        }
    }

    if (isset($_GET['numero'])) {
        $num = $_GET['numero'];
        echo esMultiploDe5y7($num);
    }
?>

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
    