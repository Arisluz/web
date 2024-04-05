<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Autores</title>
    <style>
       body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #343a40;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 36px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffc107;
        }
        h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: rgba(139, 69, 19, 0.8); /* Fondo café semi-transparente */
    color: white;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: rgba(255, 255, 255, 0.2); /* Fondo blanco semi-transparente */
}

tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.1); /* Fondo blanco semi-transparente */
}

tr:nth-child(odd) {
    background-color: rgba(139, 69, 19, 0.8); /* Fondo café semi-transparente */
}
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Inicio</a>
            <a href="libro.php">Libros</a>
            <a href="actores.php">Actores</a>
            <a href="contacto.html">Contacto</a>
        </nav>
        <h1>BIBLIOTECA ITLA</h1>
        <h2>EL SABER ES PODER</h2>
    </div>
    
    <div class="container">
        <h2>Listado de Autores</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'app/conexion.php';

                $autores = obtenerAutores($conexion);

                foreach ($autores as $autor) {
                    echo "<tr>";
                    echo "<td>{$autor['id_autor']}</td>";
                    echo "<td>{$autor['apellido']}</td>";
                    echo "<td>{$autor['nombre']}</td>";
                    echo "<td><a href='editar_autor.php?id={$autor['id_autor']}'>Editar</a> | <a href='eliminar_autor.php?id={$autor['id_autor']}'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
