<html>
    <body>
        <?php
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $domicilio= $_POST["domicilio"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $dni = $_POST["dni"];
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Domicilio</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DNI</th>
        </tr>
        <tr>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $domicilio ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $phone ?></td>
            <td><?php echo $dni ?></td>
        </tr>
    </table>
    </body>
</html>