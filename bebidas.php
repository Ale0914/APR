<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
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
        <h1 class="mt-5">❃❃❃Bebidas❃❃❃</h1>
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
            
                // Conexión a la base de datos
                $conn = conectar(); 
          
            // Consulta SQL para obtener los productos
            $sql = "SELECT * FROM productos WHERE categoria_id = 6";
            $result = $conn->query($sql);

            // Mostrar los productos
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagenProducto = ""; // Variable para almacenar el nombre del archivo de imagen

                    // Asignar el nombre del archivo de imagen según el nombre del producto
                    switch ($row["nombre"]) {
                        case "Licuado de Fresa":
                            $imagenProducto = "licuadofresa.jpg";
                            break;
                        case "Limonada":
                            $imagenProducto = "limonada.jpg";
                            break;
                        case "Frape de Oreo":
                            $imagenProducto = "frappe de oreo.jpg";
                            break;
                        case "Cafe Frio":
                            $imagenProducto = "cafe frio.jpg";
                            break;
                        case "jugo de naranja":
                            $imagenProducto = "jugo de naranja.jpg";
                                break;
                    }

                    echo '<div class="col-md-3">';
                    echo '<div class="producto">';
                    echo '<img src="img/' . $imagenProducto . '" alt="' . $row["nombre"] . '">';
                    echo '<div class="nombre">' . $row["nombre"] . '</div>';
                    echo '<div class="descripcion">' . $row["descripcion"] . '</div>';
                    echo '<div class="precio">$' . $row["precio"] . '</div>';
                    echo '<div class="btn-container">';
                    echo '<button class="btn-comprar" onclick="agregarAlCarrito(\'' . $row["nombre"] . '\', \'' . $row["precio"] . '\')">Agregar</button>';
                    echo '<button class="btn-pedido" onclick="agregarAlPedido(\'' . $row["nombre"] . '\', \'' . $row["precio"] . '\')">Pedido</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No se encontraron productos.";
            }

            // Cerrar la conexión
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
    <script>
    // Función para agregar producto al carrito
    function agregarAlCarrito(nombre, precio) {
   const horaActual = new Date().getHours();
    if (horaActual >= 14 && horaActual < 16) {
        const formData = new FormData();
        formData.append('agregarAlCarrito', true);
        formData.append('nombre', nombre);
        formData.append('precio', precio);
        fetch('carrito.php', {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) {
                mostrarAlerta('¡Producto agregado al carrito!', true);
            } else {
                mostrarAlerta('Ha ocurrido un error al agregar el producto al carrito.', false);
            }
        });
    } else {
        mostrarAlerta('Agregar productos al carrito solo estan disponibles de 2:00 PM a 4:00 PM.', false);
    }
}
    

    // Función para agregar producto al pedido
    function agregarAlPedido(nombre, precio) {
        const horaActual = new Date().getHours();
        if (horaActual >= 14 && horaActual < 16) {
            const formData = new FormData();
            formData.append('agregarAlPedido', true);
            formData.append('nombre', nombre);
            formData.append('precio', precio);
            fetch('pagarPedido.php', { // Cambiar 'pagarPedido.php' por la URL correcta
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    mostrarAlerta('¡Producto agregado al pedido!', false);
                } else {
                    mostrarAlerta('Ha ocurrido un error al agregar el producto al pedido.', false);
                }
            });
        } else {
            mostrarAlerta('Los pedidos solo están disponibles de 2:00 PM a 4:00 PM.', false);
        }
    }

    // Función para mostrar alerta y ocultarla después de un tiempo determinado 
    function mostrarAlerta(mensaje, exito) {
        const alerta = document.createElement('div');
        alerta.className = 'alerta';
        alerta.textContent = mensaje;

        if (exito) {
            alerta.style.backgroundColor = '#28a745'; // verde
            const icono = document.createElement('span');
            icono.className = 'fa fa-check';
            alerta.appendChild(icono);
        } else {
            alerta.style.backgroundColor = '#007bff'; // azul
        }

        document.body.appendChild(alerta);

        setTimeout(function() {
            alerta.style.opacity = '0';
            setTimeout(function() {
                alerta.remove();
            }, 1000);
        }, 1000);
    }
    </script>
</body>
</html>
