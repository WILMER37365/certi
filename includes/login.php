<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('path/to/your/background-image.jpg'); /* Agrega la ruta de tu imagen de fondo */
            background-size: cover;
            background-position: center;
        }

        #login {
            margin-top: 50px;
        }

        #login-box {
            border: 1px solid #d4d4d4;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        #login-box h3 {
            color: #004080; /* Cambiado a un tono de azul petróleo */
            text-align: center;
        }

        #login-box img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #343a40; /* Color para las etiquetas */
        }

        input.form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        button.btn-success {
            background-color: #005c5c; /* Cambiado a un tono de verde petróleo */
            border: 1px solid #005c5c; /* Cambiado a un tono de verde petróleo */
        }

        button.btn-success:hover {
            background-color: #004141; /* Cambiado a un tono más oscuro al pasar el cursor sobre el botón */
            border: 1px solid #004141; /* Cambiado a un tono más oscuro al pasar el cursor sobre el botón */
        }
    </style>
</head>

<body>
    <form action="_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <h3>CERTIFICADOS CONTROL DE CALIDAD</h3>
                            <img src="../images/logo-33.png" alt="Imagen de inicio de sesión" class="img-fluid">
                            <h3>Iniciar Sesión</h3>
                            <div class="form-group">
                                <label for="nombre">Usuario:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
