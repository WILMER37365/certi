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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">>
    <link  href="../fontawesome/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet">
    <title>Usuarios</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }

        .buttons-row {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .buttons-row a {
            margin-right: 10px;
        }

        table {
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header">
            <h1>Bienvenido Usuario <?php echo $_SESSION['nombre']; ?></h1>
        </div>
        <div class="col-xs-12">
            <div class="buttons-row">
                

               <!-- Agrega el botón que abrirá el modal en user.php -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
              <i class="fa-solid fa-user-plus" style="font-size: 40px;"></i>
              AÑADIR USUARIO
              </button>

              
              <button class="btn btn-primary" onclick="window.location.href='../views/certificados.php'">
                <i class="fa-sharp fa-regular fa-file-pdf" style="font-size: 40px; color: white;"></i> CERTIFICADOS DE CONTROL DE CALIDAD
            </button>

            <button class="btn btn-danger" onclick="window.location.href='../includes/_sesion/cerrarSesion.php'">
                <i class="fa-solid fa-power-off" style="font-size: 40px; color: white;"></i> SALIR
            </button>

            </div>
            <table class="table table-striped table-dark" id="table_id">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Teléfono</th>
                        <th>Fecha / Hora</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                
                    <?php
                      $conexion = mysqli_connect("localhost", "root", "", "user");
                      $SQL = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
                              user.fecha, permisos.rol FROM user
                              LEFT JOIN permisos ON user.rol = permisos.id";
                      $dato = mysqli_query($conexion, $SQL);

                      if ($dato->num_rows > 0) {
                          while ($fila = mysqli_fetch_array($dato)) {
                      ?>
                              <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['password']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['rol']; ?></td>
                                <td>
                            <!-- <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?>">
                                <i class="bi bi-pencil-square" style="font-size: 25px;"></i>
                            </a>-->


                            <button type="button" class="btn btn-warning editar-btn" data-toggle="modal" data-target="#editarModal" data-id="<?php echo $fila['id'] ?>">
                                <i class="bi bi-pencil-square" style="font-size: 25px;"></i>
                            </button>

                            
                            <a class="btn btn-danger btn-del" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                                <i class="bi bi-trash" style="font-size: 25px;"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr class="text-center">
                    <td colspan="16">No existen registros</td>
                </tr>
            <?php
            }
            ?>

        </table>




        <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editarModalBody">
                <div class="container"> <!-- Agrega un contenedor -->
                    <!-- Contenido del formulario de edición se cargará aquí -->
                    <!-- Asegúrate de que el contenido esté centrado -->
                    <form>
                        <!-- Tus campos y etiquetas aquí -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $('.btn-del').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: '¿Estás seguro de eliminar este usuario?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: '¡Eliminado!',
                text: 'El usuario fue eliminado.',
                icon: 'success',
                showConfirmButton: true, // Muestra el botón de confirmación
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirige después de hacer clic en el botón OK
                document.location.href = href;
            });
        }
    });
});


    </script>
    
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>

<script>
$(document).ready(function () {
    var table = $('#table_id').DataTable();
    if ($.fn.DataTable.isDataTable('#table_id')) {
        table.destroy();
    }

    // Configuración de DataTables con orden predeterminado en la columna de fecha
    $('#table_id').DataTable({
        "order": [
            [5, "asc"] // 5 es el índice de la columna Fecha/Hora (empezando desde 0)
        ]
    });

    // Resto de tu script
    $('.editar-btn').click(function () {
        var userId = $(this).data('id');
        $('#editarModalBody').load('editar_user.php?id=' + userId);
    });
});


</script>





<?php include('../index.php'); ?>

</body>

</html>
