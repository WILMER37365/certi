<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}

$contadorFilas = 1;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link  href="../fontawesome/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet">
    <title>Usuarios</title>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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

        .container {
            max-width: 100%;
        }

        table {
            width: 100%;
            margin: 0;
            text-align: left;
            border-collapse: collapse; /* Para asegurar que las celdas compartan bordes */
        }

        th, td {
            border: 1px solid #ddd; /* Línea delgada gris */
            padding: 8px; /* Ajusta el espaciado interno según sea necesario */
        }

        th {
            background-color: #343a40; /* Fondo oscuro para encabezados */
            color: #ffffff; /* Texto blanco para encabezados */
        }
        #pdfViewerModal .modal-dialog {
    max-width: 90vw; /* Máximo ancho del modal */
}

#pdfViewerModal .modal-content {
    height: 90vh; /* Altura del contenido del modal */
}
div.dataTables_wrapper div.dataTables_filter input {
    width: 300px; /* Ajusta el ancho del input según tus preferencias */
    padding: 5px; /* Ajusta el espaciado interno según tus preferencias */
    border: 1px solid #ccc; /* Ajusta el borde según tus preferencias */
    border-radius: 5px; /* Agrega bordes redondeados según tus preferencias */
    box-shadow: 0 0 10px #ff0000; /* Cambia a rojo (#ff0000) para el efecto fosforescente */
    transition: box-shadow 0.3s ease; /* Agrega una transición para un efecto suave */
}

/* Estilo al enfocar el input */
div.dataTables_wrapper div.dataTables_filter input:focus {
    box-shadow: 0 0 10px #cc0000; /* Cambia a un tono más oscuro de rojo al enfocar el input */
}


    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="header">
            <h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h1>
        </div>
        <div class="col-xs-12">
            <div class="buttons-row">
                <a class="btn btn-danger" onclick="window.location.href='../includes/_sesion/cerrarSesion.php'">
                    <i class="bi bi-box-arrow-left" style="font-size: 25px; margin-right: 10px;"> Salir</i>
                </a>

            </div>




            <div class="container">
                <table class="table table-striped table-dark" id="dataTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Producto</th>
                            <th>Concentración</th>
                            <th>Lote</th>
                            <th>Forma Farmacéutica</th>
                            <th>Nombre de Archivo</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "../includes/_db.php";
                        $consulta = mysqli_query($conexion, "SELECT id, usuario, producto, concentracion,lote,forma_farmaceutica, archivo FROM documento");
                        while ($fila = mysqli_fetch_assoc($consulta)) :
                        ?>

                            <tr>
                                <td><?php echo $contadorFilas; ?></td>
                                <td><?php echo $fila['producto']; ?></td>
                                <td><?php echo $fila['concentracion']; ?></td>
                                <td><?php echo $fila['lote']; ?></td>
                                <td><?php echo $fila['forma_farmaceutica']; ?></td>
                                <td><?php echo $fila['archivo']; ?></td>
                                <td>
                                    <a href="../includes/download.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">
                                    <i class="fa-solid fa-download" style="font-size: 30px;"></i>
                                    </a>

                                    <a href="#" class="btn btn-success btn-verde-oscuro btn-open-pdf" data-pdf="<?php echo $fila['archivo']; ?>">
                                        <i class="fa-regular fa-eye" style="font-size: 30px;"></i>
                                    </a>

                                    
                                    

                                </td>
                            </tr>
                            
                            <?php
                            $contadorFilas++;
                        endwhile; ?>

                        <?php include "../includes/visualizar_pdf.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/user.js"></script>
    <script src="../js/buscador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function () {

            // Agregar Certificado - Manejar el click del botón Agregar Certificado
            $('#agregar form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#agregar').modal('hide'); // Ocultar el modal después del éxito
                                location.reload(); // Recargar la página para actualizar la tabla
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: response.message,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Error en la solicitud AJAX',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        });

        


            // Inicializar la tabla con DataTables
            $('#dataTable').DataTable({
                "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },  
                "paging": true, // Habilitar la paginación
                "searching": true // Habilitar la búsqueda
                // Puedes agregar más opciones según sea necesario
            });
        });
    </script>









    <?php include "agregar.php"; ?>
    <?php include "../includes/visualizar_pdf.php"; ?>

</body>

</html>
