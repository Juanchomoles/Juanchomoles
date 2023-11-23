<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Funcion Aleatoria</title>
</head>

<body>
    <h1>Funciones Aleatorias</h1>
    <?php
    //Lista de nombres
    $nombreEmpresa1 = ["Industrias", "Sistemas", "Seguridad", "Corporación", "Media", "Electrónica", "Networks", "Producciones", "Tecnologías"];
    $nombreEmpresa2 = ["Angel", "Boarco", "Aces", "Alpine", "Dinobar", "Marble", "Pixel", "Mermaid", "Moon", "Tempest", "Water", "Fire", "Owlaid"];
    $nombreEmpresa3 = ["Betabeat", "Espectro", "Laberinto", "Moth", "Tundra"];
    $entitadadEmpresarial = ["S.A", "S.L", "S.L.L", "S.Copp", "S.L.U", "S.C", "S.Com.", "S.A.T", "S.I"];
    $tipoVia = ["AC/", "AP/", "AV/", "BO/", "CH/", "CL/", "ED/", "PV/", "RE/", "RL/", "UR/"];
    $nombreCalle = ["Rifoolf", "Point", "Madera", "Melf", "Gerrac", "Nagal", "Morruc", "Fleluld", "Prut", "Fort", "Gramp", "Blalak", "Hanob", "Virrap"];
    $num = ["Nº 1". "Nº 2", "Nº 3", "Nº 4", "Nº 5", "Nº 6", "Nº 7", "Nº 8", "Nº 9"];
    $situado = ["Bajo", "Derecha", "Izquierda"];
    $nomEmail1 = ["love", "unicorn", "cold", "night", "dream", "snake", "ferret", "lento", "principe", "princesa", "gato"];
    $nomEmail2 = ["koala", "chupasangre", "gremlin", "potato", "lord", "butter", "lemon", "nova", "yew", "diva", "robot"];
    $tipo = ["@gmail", "@misitio", "@hotmail", "@outlook", "@yahoo"];
    $final = [".es", ".io", ".com", ".uy"];

    //Funcion que genera nombre aleatorio
    function generaNom(): string {
        $nombres = ["Hugo", "Martín", "Lucas", "Mateo", "Leo", "Daniel", "Alejandro", "Pablo", "Manuel", "Álvaro", "Adrián", "David", "Mario", "Enzo", "Diego", "Marcos", "Izan", "Javier", "Marco", "Álex", "Bruno", "Oliver", "Miguel", "Thiago"];
        return $nombres[rand(0,23)];
    }
    
    //Funcion que genera apellido aleatorio
    function generaApel(): string {
        $apellidos = ["González", "Muñoz", "Rojas", "Díaz", "Pérez", "Soto", "Contreras", "Silva", "Martínez", "Sepúlveda", "Morales", "Rodríguez", "López", "Fuentes", "Hernández", "Torres", "Araya", "Flores", "Espinoza", "Valenzuela", "Castillo", "Tapia", "Reyes", "Gutiérrez", "Castro"];
        return $apellidos[rand(0,23)];
    }
    
    
    
    //Funcion QUe genera contraseña Aleatoria
    function generaContraAleatoria(): string{
        $carac = array_merge(range(33, 47), range(58, 64), range(91, 96), range(123, 126)); // contiene todos los caracteres especiales
        $num = range(48, 57);
        $mayus = range(65, 90);
        $minus = range(97, 122);
        $contraseña = "";

        for ($i = 0; $i < 9; $i++) {
            $r = rand(0, 3);
            switch ($r) {
                case 0:
                    $contraseña .= chr($carac[rand(0, count($carac) - 1)]);
                    break;
                case 1:
                    $contraseña .= chr($num[rand(0, count($num) - 1)]);
                    break;
                case 2:
                    $contraseña .= chr($mayus[rand(0, count($mayus) - 1)]);
                    break;
                case 3:
                    $contraseña .= chr($minus[rand(0, count($minus) - 1)]);
                    break;
            }
        }
        return $contraseña;
    }

    //Funcion que genera telefono aleatorio
    function generaTelefono(): string{
        return $telefono = rand(600000000, 799999999);
    }

    //Funcion que genera DNI Aleatorio
    function generaDni(): string{
        $letra = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X',
        'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];        //Letras del DNI
        $num_Dni = rand(00000000, 99999999);
        $numeroConCeros = str_pad($num_Dni, 8, "0", STR_PAD_LEFT);
        $posLetra = $num_Dni % 23;
        return $numeroConCeros . $letra[$posLetra];
    }

    //Funcion que genera nombres de empresa aleatorios
    function generarNomEmp(): string{
        global $nombreEmpresa1, $nombreEmpresa2, $nombreEmpresa3, $entitadadEmpresarial;
        $ale1 = $nombreEmpresa1[array_rand($nombreEmpresa1)];
        $ale2 = $nombreEmpresa2[array_rand($nombreEmpresa2)];
        $ale3 = $nombreEmpresa3[array_rand($nombreEmpresa3)];
        $ale4 = $entitadadEmpresarial[array_rand($entitadadEmpresarial)];

        $nomEmpresa = $ale1 . ' ' . $ale2 . ' ' . $ale3 . ' ' . $ale4;

        return $nomEmpresa;
    }

    //Funcion que genera domicilios aleatorios
    function generarNomDomi(): string{
        global $tipoVia, $nombreCalle, $num, $situado;
        $ale5 = $tipoVia[array_rand($tipoVia)];
        $ale6 = $nombreCalle[array_rand($nombreCalle)];
        $ale7 = $num[array_rand($num)];
        $ale8 = $situado[array_rand($situado)];

        $nomDomicilio = $ale5 . ' ' . $ale6 . ' ' . $ale7 . ' ' . $ale8;

        return $nomDomicilio;

    }

    //Funcion que genera emails aleatorios
    function generarEmail(): string{
        global $nomEmail1, $nomEmail2, $tipo, $final;
        $ale5 = $nomEmail1[array_rand($nomEmail1)];
        $ale6 = $nomEmail2[array_rand($nomEmail2)];
        $ale7 = $tipo[array_rand($tipo)];
        $ale8 = $final[array_rand($final)];

        $nomEmail = $ale5 . '' . $ale6 . '' . $ale7 . '' . $ale8;

        return $nomEmail;

    }

    //Llamada a las funciones
    $Constraseña = generaContraAleatoria();
    $telefono    = generaTelefono();
    $dni         = generaDni();
    $nomEmpresa  = generarNomEmp();
    $domicilio   = generarNomDomi();
    $email       = generarEmail();
    $nombre      = generaNom();
    $apellido    = generaApel();
    ?>

    <h2>Buyexcar</h2>
    <p><strong>Nombre Completo:</strong> <?php echo $nombre . " " . $apellido; ?></p>
    <p><strong>Contraseña:</strong> <?php echo $Constraseña ?></p>
    <p><strong>Teléfono:</strong> <?php echo $telefono ?></p>
    <p><strong>DNI:</strong> <?php echo $dni ?></p>
    <p><strong>Nombre empresa:</strong> <?php echo $nomEmpresa ?></p>
    <p><strong>Domicilio:</strong> <?php echo $domicilio ?></p>
    <p><strong>Email:</strong> <?php echo $email ?></p>
</body>

</html>