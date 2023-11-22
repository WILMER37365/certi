






<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">

</head>

<body>

    

    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Registro de nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de index.php -->
                    
<form  action="../includes/validar.php" method="POST">
<div id="login" >
        <div class="container">
            
                            <br>
                            <h3 class="text-center">Ingrese los Datos</h3>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                  <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel"  id="telefono" name="telefono" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label"></label>
                            </div>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <label for="password" style="margin-right: 10px;">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" style="margin-right: 10px;" required>
                                <button class="btn btn-success" type="button" onclick="togglePasswordVisibility()" style="font-size: 15px; width: 70px; padding: 5px;">
                                    <i id="eyeIcon" class="bi bi-eye" style="font-size: 19px;"></i>
                                </button>
                            </div>

                            <script>
                                function togglePasswordVisibility() {
                                    var passwordInput = document.getElementById("password");
                                    var eyeIcon = document.getElementById("eyeIcon");

                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        eyeIcon.classList.remove("bi-eye");
                                        eyeIcon.classList.add("bi-eye-slash");
                                    } else {
                                        passwordInput.type = "password";
                                        eyeIcon.classList.remove("bi-eye-slash");
                                        eyeIcon.classList.add("bi-eye");
                                    }
                                }
                            </script>

                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector..">
                             
                            </div>

                        
                           <br>

                            <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="../views/user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>


                        <script src="./package/dist/sweetalert2.all.js"></script>
                         <script src="./package/dist/sweetalert2.all.min.js"></script>

                         
                         
                    
        </div>
    </div>
    </form>
                </div>
                <!-- Puedes agregar un pie de página (footer) del modal si es necesario -->
            </div>
        </div>
    </div>

    <script src="./package/dist/sweetalert2.all.js"></script>
    <script src="./package/dist/sweetalert2.all.min.js"></script>

</body>

</html>