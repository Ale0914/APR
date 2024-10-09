<?php
session_start();

// Verificar si las variables de sesión están definidas
if (!isset($_SESSION['nombre_usuario']) || !isset($_SESSION['rol_usuario'])) {
    header("Location: login.php");
    exit();
}

$rol_usuario = $_SESSION['rol_usuario'];
$nombre_usuario = $_SESSION['nombre_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Locales</title>
    <link rel="stylesheet" href="css/local.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="menu.php">
            <span class="brand-text">PediYa</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-box"></i> Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="desayunos.php"><i class="fas fa-coffee"></i> Desayunos</a></li>
                        <li><a class="dropdown-item" href="almuerzo.php"><i class="fas fa-utensils"></i> Almuerzos</a></li>
                        <li><a class="dropdown-item" href="Antojitos.php"><i class="fas fa-cookie"></i> Antojitos</a></li>
                        <li><a class="dropdown-item" href="comidaRapida.php"><i class="fas fa-hamburger"></i> Comida Rápida</a></li>
                        <li><a class="dropdown-item" href="bebidas.php"><i class="fas fa-wine-glass-alt"></i> Bebidas</a></li>
                        <li><a class="dropdown-item" href="postre.php"><i class="fas fa-birthday-cake"></i> Postres</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ofertas.php"><i class="fas fa-tags"></i> Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="combos.php"><i class="fas fa-box"></i> Combos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php"><i class="fas fa-receipt"></i> Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="salir.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
            </ul>
            <span class="navbar-text">
                <i class="fas fa-user"></i> <?php echo $nombre_usuario; ?>
            </span>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center mt-5 mb-4">❃❃❃❃ Nuestros Locales ❃❃❃❃</h1>

    <div class="row">
        <?php
        $ruta_imagenes = 'img/';
        include 'conexion.php';
        $conn = conectar();
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM locales";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<div class='col-md-4'>
                        <div class='caja'>
                            <img class='imagen-local' src='" . $ruta_imagenes . strtolower(str_replace(' ', '', $fila['nombre'])) . ".jpg' alt='" . $fila['nombre'] . "'>
                            <div class='nombre-local'>" . $fila['nombre'] . "</div>
                            <div class='direccion-local'>" . $fila['direccion'] . "</div>
                            <div class='horario-local'>Horario: " . $fila['horario'] . "</div>
                            <div class='id-local'>ID: " . $fila['id'] . "</div>
                        </div>
                    </div>";
            }
        } else {
            echo "<p>No se encontraron locales.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
