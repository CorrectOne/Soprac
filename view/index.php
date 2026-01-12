<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina_inicial</title>
    <link rel="stylesheet" href="index.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php include 'header.php'; ?>

    <!--index SITE-->
    <div class="carrossel">
      <img src="img/imagem1.png" class="img" />
    </div>

    <!--INÍCIO NOSSA MISSÃO-->
    <div class="quadro-cinza">
    <div class="missao"><p>Nossa missão</p></div>
    <p>
       Nós da SOPRAC, temos como missão proteger os animais de
       Caieiras. Para isso, realizamos ações como castração de 
       animais de rua para controlar a população, além de incentivar
       a adoção consciente de animais resgatados, muitos deles 
       vítimas de abandono e maus-tratos. Também, trabalhamos 
       para melhorar a qualidade de vida dos animais sob nossa 
       responsabilidade, incluindo a gestão do canil municipal. Nosso
       objetivo é promover o bem-estar animal efazer a diferença na 
       vida desses seres tão especiais. </p></div>
    </div>

    <!--index QUERO AJUDAR-->
    <a href="ajuda.php"><button class="btn-ajudar">QUERO AJUDAR!</button></a>
   
    <!--index PROCESSO DE ADOÇÃO-->
 <section class="processo-adocao">
  <h2>Processo de adoção</h2>

  <div class="faixa">
    <div class="card">
      <div class="blob">
        <!-- Blob SVG 1 -->
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="#6D4C41" d="M43.2,-71.2C56.1,-62.7,68.5,-53.4,73.5,-40.5C78.6,-27.6,76.3,-11.2,71.9,4.3C67.5,19.7,61,33.2,51.1,46.6C41.1,60,27.8,73.2,12.3,78.1C-3.2,83,-20.8,79.6,-36.1,71.2C-51.3,62.8,-64.1,49.4,-72,33.5C-79.8,17.6,-82.8,-1,-76.8,-16.7C-70.9,-32.4,-56,-45.3,-40.3,-54.5C-24.6,-63.8,-8.2,-69.5,7.9,-74.3C24,-79.2,48,-83.3,43.2,-71.2Z" transform="translate(100 100)" />
        </svg>
        <img src="img/icone-formulario.png" alt="Formulário">
      </div>
      <p>Preencha o formulário de interesse</p>
    </div>

    <div class="card">
      <div class="blob">
        <!-- Blob SVG 2 -->
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="#6D4C41" d="M37.5,-61.6C48.5,-55.2,58.9,-47.8,66.7,-37.2C74.5,-26.7,79.7,-13.4,78.5,-0.7C77.3,12,69.8,24.1,61,36.6C52.3,49,42.3,61.8,29.2,68.4C16.2,75.1,0.1,75.6,-13.6,69.5C-27.2,63.3,-38.4,50.5,-48.1,38.1C-57.7,25.6,-65.8,13.5,-68.8,-1.6C-71.9,-16.6,-69.9,-33.3,-60.3,-44.8C-50.6,-56.2,-33.3,-62.4,-16.3,-66.2C0.7,-70,17.4,-71.4,37.5,-61.6Z" transform="translate(100 100)" />
        </svg>
        <img src="img/icone_entrevista1.png" alt="Entrevista">
      </div>
      <p>Realize uma entrevista conosco</p>
    </div>

    <div class="card">
      <div class="blob">
        <!-- Blob SVG 3 -->
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="#6D4C41" d="M44.6,-67.2C56.9,-59.5,65.7,-46.3,71.4,-31.6C77.1,-17,79.7,-0.9,75.6,13.8C71.5,28.4,60.6,41.7,47.7,50.5C34.8,59.3,19.9,63.5,3.9,68.8C-12.2,74.1,-24.4,80.5,-36.9,77.3C-49.5,74.1,-62.5,61.2,-71,46.1C-79.5,30.9,-83.6,13.4,-81.1,-3.6C-78.6,-20.6,-69.5,-37.1,-56.3,-44.9C-43.1,-52.6,-25.8,-51.6,-11.3,-56.9C3.2,-62.2,16.4,-73.8,29.8,-75.5C43.2,-77.3,56.9,-69.2,44.6,-67.2Z" transform="translate(100 100)" />
        </svg>
        <img src="img/icone-pet.png" alt="Adote">
      </div>
      <p>Adote o pet</p>
    </div>
  </div>
</section>

 <!--index QUERO ADOTAR-->
    <div class="imagem-adotar">
    <img src="img/animais_botao1.png" class="imagem-adotar">
    <a href="adote.php"><button class="btn-adote">QUERO ADOTAR!</button></a>
    </div>
    
<!--Fim da página-->
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
    <!--FIM FOOTER-->
  </body>
</html>
