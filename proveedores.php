<?php

session_start();

// Seguridad: solo usuarios logueados
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Conexión a la base de datos
require_once 'conexion.php';

// Consultar proveedores
$resultado = $conn->query("SELECT * FROM proveedores");

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Proveedores - Sistema de Ventas</title>

    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #334155;
            margin: 0;
        }

        .btn-volver {
            background-color: #64748b;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn-nuevo {
            background-color: #3b82f6;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #f1f5f9;
            color: #334155;
        }

        tr:hover {
            background-color: #f8fafc;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>🚚 Catálogo de Proveedores</h1>

        <div>

            <a href="dashboard.php" class="btn-volver">
                Volver
            </a>

            <!-- Botón conectado al formulario de nuevo proveedor -->
            <a href="nuevo_proveedor.php" class="btn-nuevo">
                + Nuevo Proveedor
            </a>

        </div>

    </div>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Empresa</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Dirección</th>

            </tr>

        </thead>

        <tbody>

            <?php while ($fila = $resultado->fetch_assoc()) { ?>

                <tr>

                    <td><?php echo $fila['id']; ?></td>

                    <td><?php echo $fila['nombre_empresa']; ?></td>

                    <td><?php echo $fila['contacto']; ?></td>

                    <td><?php echo $fila['telefono']; ?></td>

                    <td><?php echo $fila['direccion']; ?></td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

</body>

</html>