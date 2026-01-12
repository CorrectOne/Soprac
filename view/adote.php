<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote</title>
    <link rel="stylesheet" href="index.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>
<style>
  .gato img {
  cursor: pointer;
}
</style>
<body>

    <?php include 'header.php'; ?>

    <!-- Banner -->
    <main class="galeria-adote">
        <section class="banner-gatos">
            <div class="banner-conteudo">
                <img src="img/gatos_adote.png" alt="Quatro gatos lado a lado">
            </div>
        </section>
    </main>

    <section class="faixa-titulo-gatos">
        <h2>Conheça nossos gatos!</h2>
    </section>

    <section class="filtro-gatos">
        <div class="descricoes-gatos">
            <span class="botao-marrom">Todos</span>
        </div>
        <hr class="separador-linha">
    </section>

    <!-- Galeria de gatos -->
    <section class="grade-gatos">
        <div class="gato">
            <img src="img/gato1.jpeg" alt="BETH" data-description="Beth é uma gata muito carinhosa, adora brincar com bolinhas de lã e se dá bem com outros animais. Ela tem aproximadamente 2 anos e está castrada.">
        </div>
        <div class="gato">
            <img src="img/gato2.jpeg" alt="SOL" data-description="Sol é uma gata muito calma e brincalhona, adora tomar sol e se dá bem com outros animais.">
        </div>
        <div class="gato">
            <img src="img/gato3.jpeg" alt="ROMEU" data-description="Romeu é um gato adulto, muito calmo e que gosta de tirar longas sonecas no sol. Ele é o companheiro perfeito para uma casa tranquila.">
        </div>
        <div class="gato">
            <img src="img/gato4.jpeg" alt="PELUCHO" data-description="Pelucho é um gato super brincalhão e curioso. Ele adora explorar e vai trazer muita alegria para o seu lar.">
        </div>
        <div class="gato">
            <img src="img/gato5.jpeg" alt="RALF" data-description="Ralf é um gato filhote, muito dócil e tranquilo. Ele é um excelente companheiro e se adapta facilmente a novos ambientes.">
        </div>
        <div class="gato">
            <img src="img/gato6.jpeg" alt="JADE" data-description="Jade é uma gata jovem, brincalhona e muito carinhosa. Ela adora interagir com pessoas e outros animais.">
        </div>
        <div class="gato">
            <img src="img/gato7.jpeg" alt="ATENA" data-description="Atena é uma gata adulta, muito independente e brincalhona. Ela adora caçar brinquedos e vai ser uma ótima companhia.">
        </div>
        <div class="gato">
            <img src="img/gato8.jpeg" alt="BENTO" data-description="Bento é um gato idoso que foi resgatado e agora busca um lar para viver seus últimos anos com tranquilidade e conforto.">
        </div>
        <div class="gato">
            <img src="img/gato9.jpeg" alt="FELIPA" data-description="Felipa é uma gata adulta, muito dócil e tímida no início. Ela se sente segura em um ambiente calmo e é muito carinhosa com quem confia.">
        </div>
    </section>

    <div id="modal-adote" class="modal">
        <div class="modal-conteudo">
            <div class="modal-header">
                <span class="nome-animal"></span>
                <span class="fechar-btn">&times;</span>
            </div>
            <div class="modal-body">
                <img src="img/#" alt="" class="modal-imagem">
                <div class="descricao-pop-up">
                    <p>"Sua descrição do animal aqui."</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="formulario.php" class="btn-adotar">Adotar</a>
            </div>
        </div>
    </div>

    <script>
        // Pop-up modal
        var modal = document.getElementById("modal-adote");
        var imagens = document.querySelectorAll(".gato img");
        var fecharBtn = document.querySelector(".fechar-btn");

        imagens.forEach(function(imagem) {
            imagem.onclick = function() {
                modal.style.display = "flex";
                document.querySelector(".modal-imagem").src = this.src;
                document.querySelector(".nome-animal").textContent = this.alt;
                document.querySelector(".descricao-pop-up p").textContent = this.getAttribute("data-description");
            }
        });

        fecharBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <!-- Rodapé -->
    <footer>
        <div class="footer-container">
            <div class="brand">
                <img src="img/logo.png" alt="SOPRAC" class="logo">
                <span class="brand-name">SOPRAC</span>
            </div>
            <div class="social">
                <a href="https://www.instagram.com/soprac_oficial?igsh=emhod2Zxa3V5eGE0">
                    <div class="icon-box"><img src="img/instagram.png" alt="Instagram"></div>
                </a>
                <a href="#"><div class="icon-box"><img src="img/whatsapp.png" alt="WhatsApp"></div></a>
            </div>
        </div>
    </footer>

</body>
</html>
