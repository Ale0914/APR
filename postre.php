<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postres</title>
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
        </div>
    </div>
</nav>
    <div class="container">
        <h1 class="mt-5">❃❃❃Postres❃❃❃</h1>
        <div class="row mt-4">
            <?php
            session_start();
            if (!isset($_SESSION['nombre_usuario']) || !isset($_SESSION['rol_usuario'])) {
                header("Location: login.php");
                exit();
            }
            $rol_usuario = $_SESSION['rol_usuario'];
         
            // Incluir la clase de conexión
            include 'conexion.php';
            
            // Obtener la conexión a la base de datos
            $conn = conectar();
           
            // Ruta a la carpeta de imágenes
            $ruta_imagenes = 'img/';
            
            // Consulta para obtener los datos de los postres
            $sql = "SELECT * FROM productos WHERE categoria_id = 4";
            $resultado = $conn->query($sql);

            // Verifica si hay resultados
            if ($resultado->num_rows > 0) {

                while ($fila = $resultado->fetch_assoc()) {
                    echo "<div class='col-md-3'>
                            <div class='producto'>
                                <img src='" . $ruta_imagenes . strtolower(str_replace(' ', '', $fila['nombre'])) . ".jpg' alt='" . $fila['nombre'] . "'>
                                <div class='nombre'>" . $fila['nombre'] . "</div>
                                <div class='descripcion'>" . $fila['descripcion'] . "</div>";
                                if (isset($fila['cafetin_id'])) {
                                    echo '<div class="local">Local Disponible ' . $fila["cafetin_id"] . '</div>';
                                } else {
                                    echo "<div class='local'>Local no especificado</div>";
                                }
                                echo "<div class='precio'>$" . $fila['precio'] . "</div>
                                <div class='btn-container'>
                                    <button class='btn-comprar' onclick='agregarAlCarrito(\"" . $fila['nombre'] . "\", " . $fila['precio'] . ")'>Agregar</button>
                                    <button class='btn-pedido' onclick='agregarAlPedido(\"" . $fila['nombre'] . "\", " . $fila['precio'] . ")'>Pedido</button>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "No se encontraron postres.";
            }

            // Cierra la conexión
            $conn->close();
            ?>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <!-- Condicional para el enlace de regreso al menú -->
                <?php if ($rol_usuario == 'admin' || $rol_usuario == 'administrativo'): ?>
                    <button class="btn-regresar" onclick="window.location.href='admin.php'">Regresar al Menú</button>
                <?php elseif ($rol_usuario == 'estudiante' || $rol_usuario == 'docente'): ?>
                    <button class="btn-regresar" onclick="window.location.href='menu.php'">Regresar al Menú</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="js/carrito.js"></script>
</body>
</html>
