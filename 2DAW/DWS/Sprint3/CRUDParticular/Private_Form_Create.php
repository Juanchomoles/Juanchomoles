<?php
global $error;
require 'Clases/Cliente.php';
require 'Clases/ValidarParticular.php';
require 'Clases/Particular.php';

$idUpdate = $_POST['idUpdate'];
$editMode = $_POST['editMode'];
$name = $_POST['nombre'] ?? '';
$lastName = $_POST['apellidos'] ?? '';
$address = $_POST['domicilio'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ? intval($_POST['phone']) : 0;
$dni = $_POST['dni'] ?? 0;
$dniLetter = $_POST['dniLetter'] ?? '';
$password = $_POST['contraseña'] ?? '';
$tipo_usuario = "Particular";
$rs = "razon social";

$clienteP = new Particular(1, $name, $lastName, $address, $dni, $phone, $email, $password);
$private = new ValidarParticular();
try {
    $pdo = new PDO("mysql:host=mysql-server;dbname=db_project_team1", "root", "secret");
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

try {
    $result = $private->validateALL($clienteP);

    if(!$editMode) {
        $pdo->beginTransaction();
        $clientCreate = "INSERT INTO client (type_user, user_name, passwd, name, last_name, dni, address, email, phone, target_num, business_name) 
            VALUES (:tipo_usuario,'',:password, :name,:lastname, :dni, :residence, :email, :phone, '', :rs)";

        $client = $pdo->prepare($clientCreate);

        $client->bindParam(':tipo_usuario', $tipo_usuario);
        $client->bindParam(':name', $name);
        $client->bindParam(':lastname', $lastName);
        $client->bindParam(':residence', $address);
        $client->bindParam(':dni', $dni);
        $client->bindParam(':phone', $phone);
        $client->bindParam(':rs', $rs);
        $client->bindParam(':email', $email);
        $client->bindParam(':password', $password);

        $client->execute();

        $id = $pdo->lastInsertId();

        $privateCreate = "INSERT INTO private (id) VALUES (:id)";

        $private = $pdo->prepare($privateCreate);

        $private->bindParam(':id', $id);

        $private->execute();
        $pdo->commit();
    }
    else{
        $updateClient = $pdo->prepare("UPDATE client SET type_user = ?, user_name = ?, passwd = ?, name = ?, last_name = ?, dni = ?, address = ?, email = ?, phone = ?, target_num = ?, business_name = ? WHERE id = ?");
        $updateClient->execute([$tipo_usuario, '', $password, $name, $lastName, $dni, $address, $email, $phone, '', $rs, $idUpdate]);

    }

}
catch (PDOException $err) {
    if(!$editMode) {
        $pdo->rollBack();
        echo "Error " . $err->getMessage();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2>Validación</h2>
<div>
    <ul>
        <li><?php echo $error ?? 'Todo Correcto' ?></li>
    </ul>
</div>
<div>
    <form action="Crud.php" method="POST">
        <input type="submit" value="Mostrar">
    </form>
</div>
</body>
</html>
