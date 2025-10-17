<?php

include_once "conexión.php";
include_once "Usuario.php";
include_once "Tarea.php";

function eliminarTarea(int $idTarea): bool
{
    global $conn;

    $queryComparte = "DELETE FROM Comparte WHERE fk_id_tarea = $idTarea";
    mysqli_query($conn, $queryComparte);

    $queryTarea = "DELETE FROM Tarea WHERE id_tarea = $idTarea";
    return mysqli_query($conn, $queryTarea);
}

function recuperarTarea(int $idTarea): Tarea
{
    global $conn;

    $query = "SELECT * FROM Tarea WHERE id_tarea = $idTarea";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    return new Tarea(
        (string)$row['titulo'],
        (bool)$row['realiza'],
        (string)$row['fecha_inicio'],
        (string)$row['fecha_fin'],
        (string)$row['descripcion'],
        (int)$row['duracion'],
        (int)$row['fk_id_usuario']
    );
}

function guardarTarea(object $tarea): int
{
    global $conn;

    $titulo = $tarea->getTitulo();
    $realiza = $tarea->getRealiza();
    $fechaInicio = $tarea->getFechaInicio();
    $fechaFin = $tarea->getFechaFin();
    $descripcion = $tarea->getDescripcion();
    $duracion = $tarea->getDuracion();
    $idUsuario = $tarea->getIdUsuario();

    $queryTarea = "
        INSERT INTO Tarea (titulo, realiza, fecha_inicio, fecha_fin, descripcion, duracion, fk_id_usuario)
        VALUES ('$titulo', $realiza, '$fechaInicio', '$fechaFin', '$descripcion', '$duracion', '$idUsuario')
    ";

    mysqli_query($conn, $queryTarea);

    $tareaId = mysqli_insert_id($conn);

    return $tareaId;
}

function validarUsuario(string $correo): bool
{
    global $conn;

    $query = "SELECT * FROM Usuario WHERE correo='$correo'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) == 0;
}

function validarNuevoUsuario(string $correo, int $idUsuario): bool
{
    global $conn;

    $query = "SELECT * FROM Usuario WHERE correo='$correo' AND id_usuario != $idUsuario";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) == 0;
}

function traerIdUsuario(string $correo): int
{
    global $conn;

    $query = "SELECT id_usuario FROM Usuario WHERE correo='$correo'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return (int)$row['id_usuario'];
    }

    return 0;
}


function guardarUsuario(Usuario $usuario): bool
{
    global $conn;

    $nombre = $usuario->getNombre();
    $apellido = $usuario->getApellido();
    $correo = $usuario->getCorreo();
    $contrasenia = password_hash($usuario->getContrasenia(), PASSWORD_DEFAULT);

    $query = "INSERT INTO Usuario (nombre, apellido, contrasenia, correo)
              VALUES ('$nombre', '$apellido', '$contrasenia', '$correo')";

    return mysqli_query($conn, $query);
}

function buscarContraseniaUsuario(int $idUsuario, string $contrasenia): bool
{
    global $conn;

    $query = "SELECT contrasenia FROM Usuario WHERE id_usuario = $idUsuario";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        return false;
    }

    $row = mysqli_fetch_assoc($result);
    $hash = $row['contrasenia'];

    return password_verify($contrasenia, $hash);
}

function recuperarUsuarioPorId(int $idUsuario): ?Usuario
{
    global $conn;
    $query = "SELECT * FROM Usuario WHERE id_usuario=$idUsuario";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    return new Usuario(
        $row['nombre'],
        $row['apellido'],
        $row['correo'],
        $row['contrasenia']
    );
}

function actualizarUsuario(int $idUsuario, string $nombre, string $apellido, string $correo, ?string $contrasenia): bool
{
    global $conn;

    $query = "UPDATE Usuario SET nombre='$nombre', apellido='$apellido', correo='$correo'";

    if (!is_null($contrasenia)) {
        $hash = password_hash($contrasenia, PASSWORD_DEFAULT);
        $query .= ", contrasenia='$hash'";
    }

    $query .= " WHERE id_usuario=$idUsuario";

    return mysqli_query($conn, $query);
}

function eliminarUsuario(int $idUsuario): void
{
    global $conn;

    $query = "DELETE FROM Usuario WHERE id_usuario = $idUsuario";
    mysqli_query($conn, $query);
}

function tareaExiste(int $idTarea): bool
{
    global $conn;

    $idTarea = (int)$idTarea;
    $query = "SELECT COUNT(*) FROM Tarea WHERE id_tarea = $idTarea";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_row($result);
        return $row[0] > 0;
    }

    return false;
}

function usuarioExiste(int $idUsuario): bool
{
    global $conn;

    $idUsuario = (int)$idUsuario;
    $query = "SELECT COUNT(*) FROM usuario WHERE id_usuario = $idUsuario";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_row($result);
        return $row[0] > 0;
    }

    return false;
}

?>