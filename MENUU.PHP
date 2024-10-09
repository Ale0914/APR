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
    <link rel="stylesheet" href="css/menuu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="menuu.php">
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
                    <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
                </li>
            
                <li class="nav-item">
                 <a class="nav-link" href="Locaal.php"><i class="fas fa-store"></i> Locales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a>
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
<div class="banner">
        <div class="banner-content">
            <h2>¡Bienvenidos a PediYa!</h2>
            <p>Descubre los sabores más deliciosos en nuestra carta</p>
            <a href="menu.php" class="btn-custom">Explora el Menú</a>
            </div>
    </div>

    <h1 class="titulo">❃❃❃❃❃❃❃Nuestra Carta❃❃❃❃❃❃❃</h1>

    <div class="nuestra-carta">
        <div class="item">
            <a href="desayunos.php">
                <img src="img/desayuno.jpg" alt="Imagen 1">
            </a>
            <p>Desayunos</p>
        </div>
        <div class="item">
            <a href="almuerzo.php">
                <img src="img/lasaña.jpg" alt="Imagen 2">
            </a>
            <p>Almuerzos</p>
        </div>
        <div class="item">
            <a href="Antojitos.php">
                <img src="img/antojitos.jpg" alt="Imagen 3">
            </a>
            <p>Antojitos</p>
        </div>
        <div class="item">
            <a href="postre.php">
                <img src="img/tartaleta.jpg" alt="Imagen 4">
            </a>
            <p>Postres</p>
        </div>
        <div class="item">
            <a href="comidaRapida.php">
                <img src="img/imagen.jpg" alt="Imagen 5">
            </a>
            <p>Comida Rápida</p>
        </div>
    </div>

    <div class="ofertas">
        <h2>¡Ofertas Especiales!</h2>
        <div class="oferta-item">
            <img src="img/oferta1.jpg" alt="Oferta 1">
            <h3>Descuento en Desayunos</h3>
            <p>Disfruta de un delicioso desayuno con un descuento. ¡No te lo pierdas!</p>
        </div>
        <div class="oferta-item">
            <img src="img/oferta2.jpg" alt="Oferta 2">
            <h3>Desayuno Especial</h3>
            <p>Comienza tu día con un desayuno especial a un precio increíble. ¡Aprovecha!</p>
        </div>
        <div class="oferta-item">
            <img src="img/oferta3.jpg" alt="Oferta 3">
            <h3>Postre a Precio Especial</h3>
            <p>Endulza tu día con nuestro delicioso postre a un precio exclusivo. ¡No te lo pierdas!</p>
        </div>
    </div>

    <div class="titulo">❃❃❃❃❃❃❃Información❃❃❃❃❃❃❃</div>

    <div class="informacion-container">
        <div class="caja">
            <p>¡Ven y disfruta de una experiencia de sabor única!</p>
        </div>
        <div class="caja">
            <p>¡Ven y prueba nuestros platillos especiales cada día!</p>
        </div>
        <div class="caja">
            <p>Nuestros antojitos están disponibles todos los días a partir de las 3 de la tarde</p>
        </div>
        <div class="caja">
            <p>Nuestro cafetín ofrece un ambiente acogedor y una amplia variedad de postres</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
