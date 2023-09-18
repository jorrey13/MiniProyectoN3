<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                        <img src="assets/devchallenges.svg" alt="">
                        <h5 class="card-text">Join thousands of learners from around the world.</h5>
                        <p class="card-subtitle mb-2 text-body-secondary">Master web development by making real-life projects. There are multiple paths for you to choose</p>
                                <?php
                                session_start();
                                if (isset($_SESSION["duplicado"]) && $_SESSION["duplicado"]) {
                                    echo "<div class='alert alert-warning' role='alert'>
                                    El correo ya esta en uso!
                                    </div>" . "<br>";
                                    $_SESSION["duplicado"]= false;
                                }
                                ?>
                            <form action="/handle_db/create.php" method="post">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="email" required />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="password" required />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">Start coding now</button>
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
                                    <p>if you are member! <a href="views/login.php">Login here</a></p>
                                </div>
                            </form>
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
