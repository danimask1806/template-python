<?php
// Establece la conexión con la base de datos (actualiza con tus propias credenciales)
$host = "isabelle.db.elephantsql.com";
$user = "oozecets";
$pass = "oeZa64lWqinpnCN9E9ROLSWSYKmuCIA_";
$db = "oozecets";

// Abre una conexión a PostgreSQL
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Prepara y ejecuta la consulta SQL para obtener datos de la tabla 'estudiantes'
$query = "SELECT * FROM estudiantes";
$result = pg_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mejores Estudiantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="clasificacion">
    <div class="title">
        <h1>Mejores Estudiantes</h1>
    </div>

    <div class="form-container">
        <!-- Mostrar la tabla con datos dinámicos -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puntaje</th>
                    <th>Colegio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Itera a través de los resultados y muestra cada fila en la tabla
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['puntaje'] . "</td>";
                    echo "<td>" . $row['colegio'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Cierra la conexión a la base de datos
    pg_close($conn);
    ?>
</body>
</html>
