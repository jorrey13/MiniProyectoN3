    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $correo = $_POST["email"];
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        require_once($_SERVER["DOCUMENT_ROOT"] . "/config/conexion.php");

        try {
            $result = $mysqli->query("INSERT INTO usuarios (email, contrasena, photo, nombre, bio, phone, url_imagen) VALUES ('$correo', '$hash', '', '', '', '', '')");
            if ($result) {
                $data = $mysqli->query("SELECT * FROM usuarios WHERE email = '$correo'");
                $data = $data->fetch_assoc();
                session_start();
                $_SESSION["user_data"] = $data;

                header("Location: /views/dashboard_edit.php");
            }else {
                echo "Error al registrar un usuario";
            }
        } catch (mysqli_sql_exception $e) {
            if ($mysqli->errno === 1062) {
                session_start();
                $_SESSION["duplicado"] = TRUE;
                header("Location: /index.php");
            }else{
                echo "Error" . $e->getMessage();
            };
        }
    }

    ?>