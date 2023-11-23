<?php
$editMode = false;
if (isset($_GET['id'])) {
    $editMode = true;
}

if ($editMode == true) {
    $id = $_GET['id'];
    try {
        $pdo = new PDO("mysql:host=mysql-server;dbname=db_project_team1", "root", "secret");
    } catch (PDOException $e) {
        die("Error en la conexión a la base de datos: " . $e->getMessage());
    }
    $showDataExist = $pdo->prepare("SELECT * FROM client WHERE id = :id");
    $showDataExist->bindParam(':id', $id);
    $showDataExist->execute();
    $result = $showDataExist->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>ClicCarz</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<main>
    <article>
        <form name="formulario" action="Private_Form_Create.php" method="post" novalidate>
        <h1>Formulario PHP</h1>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="input"
                       value="<?php echo isset($result['name']) ? $result['name'] : ''; ?>">
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="input"
                       value="<?php echo isset($result['last_name']) ? $result['last_name'] : ''; ?>">
            </div>
            <div>
                <label for="domicilio">Domicilio:</label>
                <input type="text" name="domicilio" id="domicilio" class="input"
                       value="<?php echo isset($result['address']) ? $result['address'] : ''; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="input"
                       value="<?php echo isset($result['email']) ? $result['email'] : ''; ?>">
            </div>
            <div>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" class="input"
                       value="<?php echo isset($result['passwd']) ? $result['passwd'] : ''; ?>">
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="tel" name="phone" id="phone" class="input"
                       value="<?php echo isset($result['phone']) ? $result['phone'] : ''; ?>">
            </div>
            <div>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" class="input"
                       value="<?php echo isset($result['dni']) ? $result['dni'] : ''; ?>">
            </div>
            <input type="hidden" name="editMode" value="<?php echo $editMode; ?>">
            <input type="hidden" name="idUpdate" value="<?php echo $id ?? 0;  ?>">
            <div class="form-buttons">
                <button type="submit" name="submit">Enviar formulario</button>
                <button type="reset" name="reset">Restablecer</button>
            </div>
            </div>
        </form>
    </article>
</main>
<!--<script src="../js/validacio_Formulario.js"></script>-->
</body>

</html>
