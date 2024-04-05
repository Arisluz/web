<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros en Ventas</title>
    <style>
        body {
            background-color: #8B4513; 
            color: white; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        .container.libros {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .libro {
            width: calc(33.33% - 40px);
            margin-bottom: 40px;
            padding: 20px;
            background-color: #D2B48C;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .libro::before {
            content: '';
            width: 80px;
            height: 80px;
            position: absolute;
            top: 0; 
            left: 10px;
            background-image: url('public/images/libro-cerrado.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .libro-content {
            padding-top: 40px;
        }

        precio {
            margin-top: 10px; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Inicio</a>
            <a href="app/config/libro.php">Libros</a>
            <a href="autores.php">Autores</a>
            <a href="contacto.html">Contacto</a>
        </nav>
        <h1>BIBLIOTECA ITLA</h1>
        <h2>EL SABER ES PODER</h2>
    </div>
    
    <div class="container libros">
        <?php
        include('app/conexion.php'); 

        $sql = "SELECT * FROM titulos";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="libro">
                    <div class="libro-content">
                        <h2><?php echo $row["titulo"]; ?></h2>
                        <p>Descripción: <?php echo $row["notas"]; ?></p>
                        <p class="precio">Precio: $<?php echo $row["precio"]; ?></p> <!-- Agregar signo de dólar al precio -->
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No se encontraron libros en ventas.";
        }
        $conexion->close();
        ?>
    </div>
</body>
</html>
