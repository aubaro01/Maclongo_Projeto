<?php 
require_once 'php/db.php';
require_once 'php/funcs.php'; 
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MACLONGO: Produtos e serviços de alta qualidade para a indústria e ferramentas">
    <title>Maclongo</title>
    <link rel="stylesheet" href="css/style_Main.css">
    <link rel="shortcut icon" href="img/iconHead.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="/js/script_m.js" defer></script> 
    <script src="/js/navBar.js" defer></script>
    <script src="/js/modal.js" defer></script>
    <script src="/js/Main.js" defer ></script>
    <script src="/js/index.js" defer></script>
    <noscript>
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%; gap: 2rem;">
      <img
        src="/img/---"
        alt="Cat napping on a pile of books"
        style="max-width: 400px"
      />
      <p style="font-weight: 500; text-align: center; font-size: 1.5rem; line-height: 2rem;">Please enable JavaScript to view MacLongo.</p>
    </div>
</noscript>


</head>
<body>
<header>
    <?php 
    include("./Templates/navBar.php");
    ?>
</header>

<section id="home" class="section-home">
    <h1>Bem-vindo à MACLONGO</h1>
    <p>Oferecemos produtos e serviços de alta qualidade para a sua indústria.</p>
</section>

<main>

<section id="aboutUS" class="about-section">
  <div class="container">
    <div class="about-content">
      <div class="about-text">
        <h2>Sobre a Nossa Empresa</h2>
        <p>
          Nossa empresa é dedicada a fornecer produtos de alta qualidade com foco em excelência e inovação. Com anos de experiência no mercado, oferecemos soluções personalizadas para atender às necessidades dos nossos clientes. Nosso compromisso é garantir a sua satisfação através de um atendimento excepcional e produtos que superem suas expectativas.
        </p>
        <p>
          Valorizamos a confiança e a parceria com nossos clientes, trabalhando sempre para construir relacionamentos duradouros e de sucesso.
        </p>
        <a href="/php/Empresa.php" class="btn btn-primary  #1e3a5f   #4c8bf5">Saiba Mais</a>
      </div>
      <div class="about-image">
        <img src="img/logo.png" alt="Sobre a Empresa">
      </div>
    </div>
  </div>
</section>

<section id="produtos" class="produtos-container">
    <h2 style="text-align: center;"><strong>Nossos Produtos</strong></h2>
<div class="product-carousel">
    <div class="product-carousel-track">
        <div class="product-slide">
            <img src="/img/Gedore.jpg" alt="Produto 1" class="product-image">
            <h2>Alicates</h2>
            <p>Material resistente e durável, ideal para uso profissional.</p>
            <a href="/php/Produtos.php" class="product-button">Saber Mais</a>        
        </div>
        <div class="product-slide">
            <img src="/img/TAF.jpg" alt="Produto 2" class="product-image">
            <h2>Lixas</h2>
            <p>Discos potentes e eficientes, ideais para uso em ambientes industriais.</p>
            <a href="/php/Produtos.php" class="product-button">Saber Mais</a>        
        </div>
        <div class="product-slide">
            <img src="/img/Klingspor.jpg" alt="Produto 3" class="product-image">
            <h2>Discos abrasivos de corte</h2>
            <p>Discos potentes e eficientes, ideais para uso em ambientes industriais.</p>
            <a href="/php/Produtos.php" class="product-button">Saber Mais</a>        
        </div>
        <div class="product-slide">
            <img src="/img/logotipo.jpg" alt="Produto 4" class="product-image">
            <h2>Produto 4</h2>
            <p>Discos potentes e eficientes, ideais para uso em ambientes industriais.</p>
            <a href="/php/Produtos.php" class="product-button">saber Mais</a>        
        </div>
    </div>
</div>
</section>

<section id="servicos" class="sec_servicos">
    <h2><strong>Nossos Serviços</strong></h2>
    <div class="container_service">
        <article class="service_card"> 
            <img src="img/service1.jpg" alt="Afiação de Ferramentas">
            <h3>Afiação e Recuperação de Ferramentas</h3>
            <p>Prestamos serviços de afiação e recuperação de ferramentas de corte.</p>
            <a href="/php/Produtos.php" class="service-button">Saber Mais</a>                
        </article>

        <article class="service_card"> 
            <img src="img/service2.jpg" alt="Reparação de Ferramentas Elétricas">
            <h3>Reparação de Ferramentas Elétricas</h3>
            <p>Serviços especializados em reparação de ferramentas elétricas e industriais.</p>
            <a href="/php/Produtos.php" class="service-button">Saber Mais</a>        
        </article>
    </div>
</section>

<section class="contact_container" id="contactos">
  <div class="contact-details">
    <h2><strong>Onde estamos</strong></h2>
    <p>Rua D. Pedro IV<br>1620<br>4440-633 Valongo (Porto)</p>
    <p>
    <strong>Tel.:</strong> 914 577 707 / 918 253 586
    <br>
    <br>
    <strong>Email:</strong> 
    <a href="mailto:geral@maclongo.pt">geral@maclongo.pt</a>
</p>
    <iframe style="color:black" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001.7118936990582!2d-8.514981123870015!3d41.20625437132355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246362b8a71945%3A0x77cdc960c08ecd78!2sMaclongo-com%C3%A9rcio%20De%20M%C3%A1quinas%20E%20Ferramentas%20Lda!5e0!3m2!1spt-PT!2spt!4v1728663073568!5m2!1spt-PT!2spt" frameborder="0"></iframe>
    <h2>Horário de funcionamento</h2>
    <p><img src="img/horario_icon.png" alt="Horario" class="horario-icon"> <strong>2ª a 6ª</strong></p>
    <p>8:30 - 12:30/14:00 - 18:30</p>
  </div>

  <div class="contact-form">
    <h2>Fale connosco</h2>
    <form action="/php/contacts.php" method="POST">
    <div class="input-box">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-box">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone">
                </div>
                <div class="input-box">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                </div>
                <div class="input-box checkbox">
                    <input type="checkbox" id="privacidade" name="privacidade" required>
                    <label for="privacidade">Li e aceito os <a href="#">política de privacidade</a></label>
                </div>
                <div class="button">
                    <input type="submit" value="Enviar">
                </div>
            </form>
</div>
</section>

<section id="marcas">
<div class="brand-carousel-fila">
    <div class="carousel-track">
        <div class="carousel-item"><img src="img/marcas/marca10.jpg" alt="marca1"></div>
        <div class="carousel-item"><img src="img/marcas/marca11.jpg" alt="marca 2"></div>
        <div class="carousel-item"><img src="img/marcas/marca13.jpg" alt="marca3"></div>
        <div class="carousel-item"><img src="img/marcas/marca14.png" alt="marca 4"></div>
        <div class="carousel-item"><img src="img/marcas/marca16.png" alt="marca 5"></div>
        <div class="carousel-item"><img src="img/marcas/marca32.jpg" alt="marca 1"></div>
        <div class="carousel-item"><img src="img/marcas/marca35.jpg" alt="marca 2"></div>
        <div class="carousel-item"><img src="img/marcas/marca17.png" alt="marca 3"></div>
        <div class="carousel-item"><img src="img/marcas/Marca19.png" alt="marca 4"></div>
        <div class="carousel-item"><img src="img/marcas/Marca2.jpg" alt="marca 5"></div>
    </div>
</div>
</section>
</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo da Empresa" class="footer-logo-img"></a>
            <p>MACLONGO Comércio de Máquinas e Ferramentas</p>
        </div>

        <div class="footer-links">
            <h4>Links Úteis</h4>
            <ul>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#servicos">Serviços</a></li>
                <li><a href="#produtos">Produtos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <a href="https://www.facebook.com/people/Maclongo-Com%C3%A9rcio-de-M%C3%A1quinas-e-Ferramentas-Lda/100066271255190/"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 MACLONGO. Todos os direitos reservados.</p>
    </div>
</footer>
</body>
</html>
