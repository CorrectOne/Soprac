<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como_ajudar</title>
    <link rel="stylesheet" href="index.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
</head>
<body>
  <?php include 'header.php'; ?>


    <!--Titulo-->
  <h1 class="titulo_ajuda">Como ajudar</h1>

  <div class="container-ajuda">

    <!-- Doação -->
    <div class="item">
      <div class="texto">
        <h2>Doação</h2>
        <p>
          A nossa ONG cuida de mais de 90 animais onde precisamos constantemente de doações
          e de itens de cuidados necessários. Nos ajude doando algum valor,
          toda ajuda é bem-vinda!
        </p>
        <div class="cnpj">
          CNPJ:05.844.768/0001-65
        </div>
      </div>
      <img src="img/doacao_ajudar.png" alt="Doação">
    </div>

    <!-- Voluntário -->
    <div class="item invertido">
      <div class="texto">
        <h2>Voluntário</h2>
        <p>
          Gostaria de nos ajudar ativamente nos cuidados com os animais? Auxiliando
          nos eventos e organização? Entre em contato e seja voluntário!
        </p>
       <a href="contatos.php"><button class="btn vlt">Quero ser voluntário</button></a>
      </div>
      <img src="img/voluntaro_ajudar.png" alt="Voluntário">
    </div>

    <!-- Cobasi -->
    <div class="item">
      <div class="texto">
        <h2>Cobasi</h2>
        <p>
          A instituição tem parceria com a Cobasi, onde comprando qualquer valor em
          produtos pelo link da adoção, 7% é destinado à nossa ONG!
        </p>
        <a href="https://www.cobasi.com.br/institucional/mes-cobasi-
        cuida?fbclid=PAb21jcANDqx9leHRuA2FlbQIxMQABpzOGOx7Sp2aIheC7ggMQ1dhHKSTpJEBDRiY
        _B1RGPaASaA2VapyIfgvftmKL_aem_E9bxVNaf3_2vX51hpKRNgQ"><button class="btn cbasi">Quero comprar</button></a>
      </div>
      <img src="img/cobasi_ajudar.png" alt="Cobasi">
    </div>

    <!-- Adoção -->
    <div class="item invertido">
      <div class="texto">
        <h2>Adoção</h2>
        <p>
          Quer adotar um amiguinho? Veja os animais disponíveis em nossos próximos eventos.
        </p>
        <a href="adote.php"><button class="btn adt2">Quero adotar</button></a>
        <a href="eventos.php"><button class="btn adt3">Ver os eventos</button></a>
      </div>
      <img src="img/adote_ajudar.png" alt="Adoção">
    </div>
    </div>

    <!--Rodapé-->
      <footer>
  <div class="footer-container">
    <!-- Logo + nome -->
    <div class="brand">
      <img src="img/logo.png" alt="SOPRAC" class="logo">
      <span class="brand-name">SOPRAC</span>
    </div>

    <!-- Redes sociais -->
    <div class="social">
      <a href="https://www.instagram.com/soprac_oficial?igsh=emhod2Zxa3V5eGE0"><div class="icon-box"><img src="img/instagram.png" alt="Instagram"></div></a>
      <a href="#"><div class="icon-box"><img src="img/whatsapp.png" alt="WhatsApp"></div></a>
    </div>
  </div>
</footer>

</body>
</html>