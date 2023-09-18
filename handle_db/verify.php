<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/conexion.php");

    // Obtener el hash de la contraseña desde la base de datos
    $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE email = '$correo'");
    // while($row = $stmnt->fetch_assoc()){

    // };

    if ($stmnt->num_rows === 1) {
        $result = $stmnt->fetch_assoc();
        $contrasena_hash = $result["contrasena"];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($contrasena, $contrasena_hash)) {
            session_start();
            $_SESSION["user_data"] = $result;
            // var_dump($_SESSION["user_data"]);
            header("Location: ./../views/dashboard.php");
        } else {
            session_start();
            $_SESSION["usuario_mal"] = TRUE;
            header("Location: ./../views/login.php?error=incorrect_password");
        }
    } else {
        session_start();
        $_SESSION["usuario_mal"] = TRUE;
        header("Location: ./../views/login.php?error=user_not_found");
    }
}
