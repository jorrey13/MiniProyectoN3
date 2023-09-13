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
                        <img src="assets/devchallenges.svg" alt="">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <h3 class="card-title">Iniciar Sesión</h3>
                            <form action="/handle_db/verify.php" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form2Example2" class="form-control" />
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a member? <a href="#!">Register</a></p>
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
                                    <p>or sign up with:</p>
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
