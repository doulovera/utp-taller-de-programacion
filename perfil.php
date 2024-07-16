<?php
session_start();
require_once 'php/controllers/usuarios.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($userId === null) {
  header('Location: /oechsle-web/login.php');
  exit;
}

$usuariosController = new UsuariosController();
$productosDelUsuario = $usuariosController->obtenerProductosPorUsuario($userId);
$usuario = $usuariosController->obtenerUsuarioPorId($userId);

function calculateDiscount($price, $discount) {
  return $price - ($price * $discount / 100);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Oechsle.pe - ¡Las mejores ofertas en miles de productos!</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <script src="js/index.js" defer type="module"></script>
  </head>
  <body>
    <!--   cabecera   -->
    <header>
      <nav class="container-fluid nav-enlaces">
        <div class="row">
          <a href="/oechsle-web/index.html" class="col"> Inicio </a>
          <a href="/oechsle-web/nosotros.html" class="col"> Nosotros </a>
          <a href="/oechsle-web/productos.php" class="col"> Productos </a>
          <a href="/oechsle-web/servicios.html" class="col"> Servicios </a>
          <a href="/oechsle-web/contacto.html" class="col"> Contáctanos </a>
        </div>
      </nav>

      <div class="bg-brand">
        <div class="container nav-buscador">
          <div class="row">
            <div class="col-2">
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/oechsle.svg?v=1715870587240"
              />
            </div>

            <div class="col-2 col-md-1">Menú</div>

            <div class="col-5 col-md-7">
              <input
                placeholder="¿Qué estás buscando hoy?"
                class="input-search"
              />
            </div>

            <div class="col-2 col-md-1">
              <p>
                <a id="nombre-usuario" href="/oechsle-web/login.php">
                  Iniciar sesión
                </a>
              </p>
            </div>

            <div class="col-1 col-md-1">
              <p class="carrito-contenedor">
                <span>
                  🛒
                </span>
                <i class="carrito-cantidad bg-secondary" id="checkout">
                  0
                </i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--   cabecera   -->

    <!-- usuario -->
    <div class="container" style="margin-top:50px;">
      <h1>
        <?= $usuario['nombre']; ?>
      </h1>

      <h2>
        <?= $usuario['email']; ?>
      </h2>

      <button class="btn btn-danger" id="cerrarSesion">
        Cerrar sesión
      </button>
    </div>
    <!-- usuario -->

    <!-- productos -->
    <div class="container" style="margin-top:100px;">
      <h3>
        Productos
      </h3>
      
      <div class="page-content container">
        <?php
        foreach ($productosDelUsuario as $product) {
        ?>
          <div class="product-container">
            <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" />

            <small>
              <?= $product['brand']; ?>
            </small>

            <h3>
              <?= $product['name']; ?>
            </h3>

            <div class="precios">
              <div>
                <p>
                  Precio de lista
                </p>
                <p class="precio">
                  <?= $product['price']; ?>
                </p>
              </div>
              
              <?php if ($product['discount'] > 0) { ?>
                <div>
                  <p>
                    Descuento
                  </p>
                  <p class="precio">
                    <?= calculateDiscount($product['price'], $product['discount']); ?>
                  </p>
                </div>
              <?php } else { ?>
                <div>
                  <p>&nbsp;</p>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php }
        ?>
      </div>
    </div>
    <!-- productos -->
    
    <!-- footer -->
    <footer class="bg-brand">
      <div class="container">
        <div class="row">
                  
          <div class="col-6 col-md-3">
            Síguenos
            <p>
              
            </p>
            <p>
              <a href="https://www.instagram.com/oechsleperu">
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/icons8-instagram-48.png?v=1717525783162"
               />
            </a>
            </p>
            <p>
              <a href="https://www.facebook.com/tiendasoechsle/?locale=es_LA">
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/icons8-facebook-nuevo-48.png?v=1717526216924"
                   />
              </a>
            </p>
            <p>
              <a href="https://www.youtube.com/user/TiendasOechslePeru">
                <img
                     src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/icons8-youtube-48.png?v=1717526408012"
                     />
              </a>
            </p>
          </div>

          <div class="col-6 col-md-3">
            Medios de pago    
            
            <p>
            </p>
            <p>
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/Captura%20de%20pantalla%202024-05-21%20014033.png?v=1716273718269"
              />
            </p>
            <p>
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/Captura%20de%20pantalla%202024-05-21%20014805.png?v=1716274169464"
              />
            </p>
            <p>
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/Captura%20de%20pantalla%202024-05-21%20014453.png?v=1716273967950"
              />
            </p>
          </div>

          <div class="col-6 col-md-3">
            Libro de reclamaciones
            <p>
              
            </p>
            <p>
              <a href="/oechsle-web/reclamaciones.html" class="col">
              <img
                src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/WhatsApp%20Image%202024-05-21%20at%201.05.50%20AM.jpeg?v=1716271593387"
                alt="Imagen del Libro de Reclamaciones"
              />
              </a>
            </p>
          </div>

          <div class="col-6 col-md-3">
            <scan>🔒</scan>
            Tienda 100% segura
            <p>
              
            </p>
            <p>
              Tecnología
            </p>
            <p>
              <img
                   src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/vtex-removebg-preview%20(2).png?v=1717527489984"
                   />
            </p>
            <p>
              <a href="#top" id="scrollToTop">
                <img 
                     src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/icons8-chevron-arriba-en-c%C3%ADrculo-48.png?v=1717528039799"
                          alt="Flecha hacia arriba" class="scroll-to-top">
              </a>
     
            </p>
          </div>
        </div>
        
      </div>
    </footer>
    <!-- footer -->
    
    <script>
      const $cierreSesion = document.getElementById('cerrarSesion');

      $cierreSesion.addEventListener('click', () => {
        localStorage.removeItem('usuario');
        fetch('/oechsle-web/php/views/cierreSesion.php', { method: 'POST' })
          .then(() => window.location.href = '/oechsle-web/index.html');
      });
    </script>
  </body>
</html>
