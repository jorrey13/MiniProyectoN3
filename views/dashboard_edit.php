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
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php $nombre = $_SESSION["user_data"]["nombre"];
                            echo "$nombre"; ?></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" styles="">
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
        <div class="container-fluid">
            <form class="row g-3" action="/handle_db/edit.php" method="POST" enctype="multipart/form-data">
                <div class="col-8">
                    <h5>Change info</h5>
                    <p>Changes will be reflected to every services</p>
                </div>
                <div class="col-6">
                    <label for="image"></label>
                    <input type="file" name="image" id="image">
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
                            <img src='$url' alt='image'  height='100' Width='100'/></div>
                            ";
                    ?>
                </div>
                <div class="col-8">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name here " id="name" name="name" value="<?php $nombre = $_SESSION["user_data"]["nombre"];
                    echo "$nombre"; ?>">
                    <input type="text" class="form-control" placeholder="id " id="id" name="id" value="<?php $id = $_SESSION["user_data"]["id"];
                    echo "$id"; ?>" hidden>
                </div>
                <div class="col-8">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" class="form-control" placeholder="Enter your bio here" id="bio" name="bio" style="height: 100px;" value="<?php $bio = $_SESSION["user_data"]["bio"];                                  echo "$bio"; ?>">
                </div>
                <div class="col-8">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" placeholder="Enter your phone here" id="phone" value="<?php $phone = $_SESSION["user_data"]["phone"];
                    echo "$phone"; ?>" name="phone">
                </div>
                <div class="col-8">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your " id="email" placeholder="Enter your email here" value="<?php $email = $_SESSION["user_data"]["email"];
                    echo "$email"; ?>" name="email">
                </div>
                <div class="col-8">
                    <label for="contrasena" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your " id="contrasena" name="contrasena" value="<?php $password = $_SESSION["user_data"]["contrasena"];
                    echo "$password"; ?>">
                </div>
                <div class="col-8">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

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