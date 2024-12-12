<?php
include('db.php'); // Incluir la conexión a la base de datos

// Obtener el ID del producto desde la URL
$product_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($product_id) {
    // Consultar la base de datos para obtener la información del producto
    $sql = "SELECT * FROM productos WHERE id = $product_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Obtener los detalles del producto
        $row = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no válido.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Agregar un margen inferior para el contenido antes del footer */
    .product-container {
        margin-bottom: 50px; /* Margen para separar el contenido del footer */
    }
    footer {
        background-color: #f8f9fa; /* Fondo gris claro */
        padding: 20px 0;
        text-align: center;
        margin-top: 50px;
    }
  </style>
</head>
<body>
  <!-- Navbar de Bootstrap -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Mi Sitio</a>
  </nav>

  <!-- Contenedor de detalles del producto -->
  <div class="container mt-5 product-container">
    <div class="row">
      <div class="col-md-6">
        <!-- Imagen en tamaño grande -->
        <img src="uploads/<?php echo $row['imagen']; ?>" class="img-fluid" alt="Producto">
      </div>
      <div class="col-md-6">
        <!-- Descripción del producto -->
        <h2><?php echo $row['nombre']; ?></h2>
        <p><?php echo $row['descripcion']; ?></p>
        <button class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Mi Sitio. Todos los derechos reservados.</p>
    <p><a href="#">Términos y condiciones</a> | <a href="#">Política de privacidad</a></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
