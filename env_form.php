<?php
// Establece la conexión con la base de datos (actualiza con tus propias credenciales)
$host = "isabelle.db.elephantsql.com";
$user = "oozecets";
$pass = "oeZa64lWqinpnCN9E9ROLSWSYKmuCIA_";
$db = "oozecets";

// Open a PostgreSQL connection
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Recibe los datos del formulario
$nombre = $_POST['name'];
$puntaje = $_POST['puntaje'];
$actividad = $_POST['actividad'];
$email = $_POST['email'];
$colegio = $_POST['colegio'];

// Prepara y ejecuta la consulta SQL
$query = "INSERT INTO estudiantes (nombre, puntaje, actividad, email, colegio) VALUES ('$nombre', $puntaje, '$actividad', '$email', '$colegio')";

$result = pg_query($conn, $query);

if ($result) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar datos: " . pg_last_error($conn);
}

// Cierra la conexión
pg_close($conn);
?>
