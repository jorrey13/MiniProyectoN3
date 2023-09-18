<?php
echo "Estás aquí";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/conexion.php");
    $email = $_POST["email"];
    $nombre = $_POST["name"];
    $id = $_POST["id"];
    $bio = $_POST["bio"];
    $phone = $_POST["phone"];
    $password = $_POST["contrasena"];

    // Verificar si se subió una nueva imagen
    if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
        $type = $_FILES["image"]["type"];
        $tmp_location = $_FILES["image"]["tmp_name"];
        $fn_location_db = "/public/img/" . $_FILES["image"]["name"];
        $fn_location = $_SERVER["DOCUMENT_ROOT"] . $fn_location_db;
        move_uploaded_file($tmp_location, $fn_location);
    } else {
        // No se subió una nueva imagen, mantener la imagen actual en la base de datos
        $email = $_SESSION["user_data"]["email"];
        $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");
        while ($row = $stmnt->fetch_assoc()) {
            if (isset($row["url_imagen"])) {
                $fn_location_db = $row["url_imagen"];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                // Actualizar todos los campos en la base de datos
                $sql = "UPDATE usuarios SET nombre = '$nombre', bio = '$bio', phone = '$phone', email = '$email', contrasena = '$hash', url_imagen = '$fn_location_db' WHERE id = '$id'";
                }
                if ($mysqli->query($sql)) {
                    echo "Actualización exitosa";
                    header("Location: /views/dashboard.php?guardado_con_exito!!");
                } else {
                    echo "Error al actualizar: " . $mysqli->error;
                }
        }
    }

    
    
    // $nombre !== "" && $mysqli->query("UPDATE usuarios SET nombre = '$nombre' WHERE id = '$id'");
    // $bio !== "" && $mysqli->query("UPDATE usuarios SET bio = '$bio' WHERE id = '$id'");
    // $phone !== "" && $mysqli->query("UPDATE usuarios SET phone = '$phone' WHERE id = '$id'");
    // $email !== "" && $mysqli->query("UPDATE usuarios SET email = '$email' WHERE id = '$id'");
    // $password !== "" && $mysqli->query("UPDATE usuarios SET contrasena = '$hash' WHERE id = '$id'");
    // header("Location: /views/dashboard.php");

}
?>
