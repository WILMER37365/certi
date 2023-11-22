<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}

?>

<?php
require_once ("_db.php");
// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    $conexion = mysqli_connect("localhost", "root", "", "user");
    extract($_POST);

    $nombre = $_SESSION['nombre'];
    $producto = $_POST['producto'];
    $concentracion = $_POST['concentracion'];
    $lote = $_POST['lote'];
    $forma_farmaceutica = $_POST['forma_farmaceutica'];

    $carpeta_destino = "files/";
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
            $sql = "INSERT INTO documento (usuario, producto,concentracion,lote,forma_farmaceutica, archivo) 
                    VALUES ( '$nombre', '$producto', '$concentracion', '$lote','$forma_farmaceutica','$nombre_archivo')";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                $response = array('status' => 'success', 'message' => 'Archivo Subido');
            } else {
                $response = array('status' => 'error', 'message' => 'Error al subir el archivo_1: ' . mysqli_error($conexion));
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Error al subir el archivo_2. ');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Solo se permiten archivos PDF, DOC y DOCX.');
    }
} else {
    $response = array('status' => 'error', 'message' => 'No se ha cargado ningún archivo.');
}


header('Content-Type: application/json');
echo json_encode($response);
?>
