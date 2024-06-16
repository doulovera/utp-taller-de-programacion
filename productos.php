<?php
  // Archivo que obtiene los productos
  $products = include 'modules/fetch_products.php';

  // función para calcular el descuento
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
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <script src="js/index.js" defer></script>
    <script src="js/index.js" defer></script>
  </head>
  <body>
    <!--   cabecera   -->
    <header>
      <nav class="container-fluid nav-enlaces">
        <div class="row">
          <a href="/oechsle-web/index.html" class="col"> Inicio </a>
          <a href="/oechsle-web/nosotros.html" class="col"> Nosotros </a>
          <a href="/oechsle-web/productos.html" class="col"> Productos </a>
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
              <p>Iniciar sesión</p>
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
    <!--   carrusel   -->
    <div id="carrusel-contenido">
      <div id="carrusel-caja">
        <div class="carrusel-elemento">
          <img
            class="imagenes"
            src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/BANNER-CAT-MOBILE-640x2001705.jpg?v=1716278113582"
          />
        </div>
        <div class="carrusel-elemento">
          <img
            class="imagenes"
            src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/015227_30122020_610_C20_Website_SG_Laundry_ESP_Banner%20ok.jpg?v=1716278077350"
          />
        </div>
        <div class="carrusel-elemento">
          <img
            class="imagenes"
            src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/banner-tv.png?v=1716278070040"
          />
        </div>
      </div>
    </div>
    <!--   carrusel   -->
    <!--   productos  -->
    <div class="productos-imagenes arrow">
      <img
        src="https://cdn.glitch.global/471f604e-3a38-441e-8459-a25b38c62dda/banner.PNG?v=1716280204796"
        class="img-3"
      />
    </div>

    <!--   categorias   -->
    <div class="productos-contenido container">
      <div class="row">
        <div class="col info-card">
          <span> 👶 </span>
          <p>Ropa para bebé</p>
        </div>

        <div class="col info-card">
          <span> 🙎 </span>
          <p>Ropa para mujer</p>
        </div>

        <div class="col info-card">
          <span> 🙎‍♂️ </span>
          <p>Ropa para hombre</p>
        </div>

        <div class="col info-card">
          <span> 📺 </span>
          <p>Electrohogar</p>
        </div>
        <div class="col info-card">
          <span> 📱 </span>
          <p>Tecnología</p>
        </div>
        <div class="col info-card">
          <span> 🛋️ </span>
          <p>Muebles</p>
        </div>
      </div>
    </div>
    <!--   categorias   -->
    
    <!--   productos    -->
    <div class="page-content container">
    <?php foreach ($products as $product) { ?>
      <div class="product-container">
        <a href="<?= $product['slug'] ?>">
          <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
        </a>

        <small>
          <?= $product['brand']; ?>
        </small>

        <h3>
          <a href="<?= $product['slug'] ?>">
            <?= $product['name']; ?>
          </a>
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

        <button class="btn-agregar" onclick="add('<?php echo htmlspecialchars($product['id']); ?>', <?php echo htmlspecialchars($product['price']); ?>)">
          Agregar
        </button>
      </div>
    <?php } ?>
    </div>
    <!--   productos    -->

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
