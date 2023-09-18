<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Agregar la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar la referencia a Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilo personalizado para centrar el formulario */
        .centered-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row centered-form">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="./../assets/devchallenges.svg" alt="">
                        <h3 class="card-title">Login</h3>
                        <?php
                        if (isset($_SESSION["inicio_sesion"]) && $_SESSION["inicio_sesion"]) {
                            echo "<div class='alert alert-warning' role='alert'>
                                Debes iniciar sesión para continuar!
                            </div>" . "<br>";
                            $_SESSION["inicio_sesion"] = false;
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["usuario_mal"]) && $_SESSION["usuario_mal"]) {
                            echo "<div class='alert alert-danger' role='alert'>
                                Correo o contraseña incorrecta!
                            </div>" . "<br>";
                            $_SESSION["usuario_mal"] = false;
                        }
                        ?>
                            <form action="./../handle_db/verify.php" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="correo" name="correo" class="form-control" placeholder="email" required/>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="password" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                <!-- Register buttons -->
                            </form>
                            <div class="text-center">
                                <p>or continue with these social profile:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                    </button>
                                    <p>Not a member? <a href="./../index.php">Register</a></p>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar la referencia a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
