<?php

try {
$pdo = new PDO("mysql:host=mysql-server;dbname=db_project_team1", "root", "secret");
}
catch (PDOException $e) {
die("Error en la conexión a la base de datos: " . $e->getMessage());
}
$showData = $pdo->prepare("SELECT * FROM client");
$showData->execute();
$result = $showData->fetchALl();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $deletePrivate = $pdo->prepare("DELETE FROM private WHERE id = :id");
    $deletePrivate->bindParam(':id', $id);
    $deletePrivate->execute();

    $deleteClient = $pdo->prepare("DELETE FROM client WHERE id = :id");
    $deleteClient->bindParam(':id', $id);
    $deleteClient->execute();
}
?>
<html>
<head>
    <link href="css/styleTable.css" rel="stylesheet" type="text/css">
</head>
<form action="contact.php">
    <button type="submit">Agregar Datos</button>
</form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Razon social</th>
            <th>Contraseña</th>
            <th>Numero de targeta</th>
            <th>Tipo de usuario</th>
            <th>Borrar</th>
            <th>Editar</th>
        </tr>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['dni']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['business_name']; ?></td>
            <td><?php echo $row['passwd']; ?></td>
            <td><?php echo $row['target_num']; ?></td>
            <td><?php echo $row['type_user']; ?></td>
            <td>
                <form method="post" action="Crud.php">
                    <button type="submit" name="delete" value="<?php echo $row['id']; ?>">Borrar</button>
                </form>
            </td>
            <td>
                    <a href="contact.php?id=<?php echo $row['id']; ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>

        </tr>
    </table>
</html>