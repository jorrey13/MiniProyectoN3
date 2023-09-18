<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "<div class='alert alert-danger' role='alert'>
    A simple danger alert—check it out!
  </div>";
    header("Location: /views/login.php");
    $_SESSION["inicio_sesion"] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <!-- Agregar la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar la referencia a Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./../styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8e2f2b0bba.js" crossorigin="anonymous"></script>

</head>

<body>
<head>
        <div class="container">
            <div class="container-fluid">
            <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <img src="./../assets/devchallenges.svg" alt="Bootstrap">
                <form class="d-flex" role="search">
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            $email = $_SESSION["user_data"]["email"];
                            require_once($_SERVER["DOCUMENT_ROOT"] . "/config/conexion.php");
                            $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");
                            while ($row = $stmnt->fetch_assoc()) {
                                if (isset($row["url_imagen"])) {
                                    $url = $row["url_imagen"];
                                }
                            }
                            echo "<div class='col-md-4'>
                            <img src='$url' alt='image'  height='30' Width='30'/></div>
                            ";
                            ?>
                            <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php $nombre = $_SESSION["user_data"]["nombre"];
                            echo "$nombre"; ?></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="./dashboard.php">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-gear"></i>
                                    <span>Group Chat</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="./../handle_db/logoaut.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li>
                </form>
            </div>
        </nav>
            </div>
        </div>
    </head>
    <div class="container">
        <div class="py-1 text-center">
            <h2>Personal info</h2>
            <p class="lead">Basic info, like your name and photo.</p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="container-form">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Profile</h5>
                        <p>Some info may be visible to other people</p>
                    </div>
                    <div class="col-md-2">
                         <a href="../views/dashboard_edit.php" class="btn btn-outline-secondary">Edit</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="photo" class="form-label">Photo</label>
                        </div>
                            <?php
                            $email = $_SESSION["user_data"]["email"];
                            require_once($_SERVER["DOCUMENT_ROOT"] . "/config/conexion.php");
                            $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");
                            while ($row = $stmnt->fetch_assoc()) {
                                if (isset($row["url_imagen"])) {
                                    $url = $row["url_imagen"];
                                }
                            }
                            echo "<div class='col-md-4'>
                            <img src='$url' alt='Imagen de perfil'  height='70'/></div>
                            ";
                            ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Name</label>
                    </div>
                    <div class="col-md-4">
                        <strong><label for="nombre" class="form-label">
                        <?php $nombre = $_SESSION["user_data"]["nombre"];
                        echo "$nombre"; ?>
                        </label></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Bio</label>
                    </div>
                    <div class="col-md-4">
                        <strong><label for="nombre" class="form-label"><?php $bio = $_SESSION["user_data"]["bio"];
                        echo "$bio"; ?></label></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Phome</label>
                    </div>
                    <div class="col-md-4">
                        <strong><label for="nombre" class="form-label"><?php
                                                                        $phone = $_SESSION["user_data"]["phone"];
                                                                        echo "$phone"; ?></label></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Email</label>
                    </div>
                    <div class="col-md-4">
                                <strong><label for="email" class="form-label">
                                <input type="text" name="email" id="email" hidden 
                                value="<?php
                                $email = $_SESSION["user_data"]["email"];
                                echo "$email"; ?>"><?php
                                $email = $_SESSION["user_data"]["email"];
                                echo "$email"; ?></label></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="col-md-4" hidden>
                        <strong><label for="password" class="form-label"><?php
                        $password = $_SESSION["user_data"]["contrasena"];
                        echo "$password"; ?></label></strong>
                    </div>
                    <div class="col-md-4">
                        <strong>
                            <input type="password" class="form-control" id="password" name="password" value="**********" readonly>
                        </strong>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Agregar la referencia a Bootstrap JS y jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownToggle = document.getElementById("dropdownMenuLink");
            dropdownToggle.addEventListener("click", function(e) {
                e.preventDefault(); // Evitar que el enlace cambie de página
                var dropdownMenu = dropdownToggle.nextElementSibling;
                if (dropdownMenu.classList.contains("show")) {
                    dropdownMenu.classList.remove("show");
                } else {
                    dropdownMenu.classList.add("show");
                }
            });

            // Cerrar el menú al hacer clic en un elemento del menú
            var dropdownItems = [].slice.call(document.querySelectorAll('.dropdown-item'));
            dropdownItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var dropdownMenu = item.closest('.dropdown-menu');
                    dropdownMenu.classList.remove('show');
                });
            });
        });
    </script>
</body>

</html>