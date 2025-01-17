<?php
session_start();

if (isset($_SESSION['error'])) {
  $errorMessage = $_SESSION['error'];
  unset($_SESSION['error']);
} else {
  $errorMessage = '';
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

    <!-- formulario -->
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center" style="margin:50px 0; padding: 50px 0; background-color:#f3f3f3;">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
              <form id="login-form" class="form" action="php/views/inicioSesion.php" method="post">
                <h3 class="text-center text-brand">Iniciar sesión</h3>
                <div class="form-group">
                  <label for="email">Email:</label><br>
                  <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Contraseña:</label><br>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <?php if (!empty($errorMessage)): ?>
                    <div class="error-message" style="color: red;">
                      <small><?php echo $errorMessage; ?></small>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-md" value="Enviar" style="background-color:#ff0705; margin-top:10px;">
                </div>
                <div id="register-link" class="text-right">
                  <a href="/oechsle-web/register.php">Regístrate</a>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
    <!-- formulario -->
    
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
    
  </body>
</html>
