

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Formulário de adoção e responsabilidade</title>

  <!-- CSS global (cabeçalho + estilos do site) -->
  <link rel="stylesheet" href="index.css">

  <!-- Fontes / Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>

  <style>
    :root{
      --vinho: #8B0000;
      --marrom: #b08a64;
      --linha: #d9c9b4;
      --texto: #222;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: 'Inter', sans-serif;
      color:var(--texto);
      background: #fff;
      -webkit-font-smoothing:antialiased;
    }

    /* título / intro */
    .processo-adocao{padding-top:28px; text-align:center;}
    .processo-adocao h2{
      color:var(--vinho);
      font-size:32px;
      margin:12px 0 8px;
      font-weight:700;
    }
    .adocao{max-width:900px;margin:0 auto;padding:0 24px 12px;text-align:center}
    .adocao p{ color:#222; max-width:900px; margin:8px auto; line-height:1.45; }
    hr.visual { border: none; border-top: 6px solid var(--linha); width:90%; margin: 8px auto 26px; border-radius:4px; }

    /* Form container */
    #adoptionForm {
      max-width:820px;
      margin: 12px auto 48px;
      padding:28px 32px;
      background: #fff;
      border: 3px solid var(--marrom);
      border-radius:12px;
    }

    .form-row { margin-bottom:18px; }
    .grid-2 { display:grid; grid-template-columns: 1fr 1fr; gap:18px; }
    .grid-3 { display:grid; grid-template-columns: 1fr 1fr 1fr; gap:12px; align-items:start; }
    label { display:block; margin-bottom:6px; font-size:0.95rem; color:#333; font-weight:500; }
    input[type="text"], input[type="email"], input[type="tel"], select, textarea, input[type="date"], input[type="file"] {
      width:100%;
      padding:10px 12px;
      border-radius:6px;
      border:1px solid #aaa;
      font-size:0.95rem;
      background:#fff;
    }
    textarea { min-height:90px; resize:vertical; }

    .options { margin-top:6px; }
    .options label { display:flex; align-items:center; gap:10px; cursor:pointer; font-weight:400; margin-bottom:8px; }
    .options input[type="radio"], .options input[type="checkbox"] { width:16px; height:16px; }

    .small-input { width:100%; max-width:140px; }

    .actions { text-align:center; margin-top:18px; }
    input[type="submit"]{
      background:var(--vinho);
      color:#fff;
      border:none;
      padding:10px 28px;
      border-radius:10px;
      cursor:pointer;
      font-size:1rem;
    }
    input[type="submit"]:hover{ background:#5a1f1f; }

    .confirmacoes { margin-top:10px; display:flex; flex-direction:column; gap:8px; font-size:0.95rem; }

    /* footer local (index.css já contém estilos gerais, aqui só ajustes se necessário) */
    footer { background:var(--vinho); color:#fff; padding:18px 24px; margin-top:24px; }
    .footer-container{ max-width:1100px; margin:0 auto; display:flex; align-items:center; gap:18px; justify-content:space-between; }
    .brand img { width:44px; height:44px; border-radius:50%; object-fit:cover; }
    .icon-box img { width:24px; height:24px; object-fit:contain; display:block; filter:invert(1); }

    @media (max-width:820px){
      .grid-2{ grid-template-columns: 1fr; }
      .grid-3{ grid-template-columns: 1fr 1fr; }
      #adoptionForm { padding:22px; margin:16px; }
      .footer-container { flex-direction:column; gap:12px; text-align:center; }
    }
  </style>
</head>
<body>

 <?php include 'header.php'; 
 include '../model/animalBD.php'?>

  <!-- TÍTULO E INTRO -->
  <header class="processo-adocao">
    <h2>Formulário de adoção e responsabilidade</h2>
  </header>

  <section class="adocao">
    <p>Ficamos felizes que você tem interesse em adotar um amigo!</p>
    <p>Responda o nosso formulário para termos certeza que vocês são perfeitos um para o outro.</p>
  </section>

  <hr class="visual">

  <!-- FORM -->
  <form id="adoptionForm" action="#" method="post" enctype="multipart/form-data" novalidate>

    <!-- Dados Pessoais -->
    <div class="form-row grid-2">
      <div>
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" required>
      </div>
      <div>
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" required>
      </div>

      <div>
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" required>
      </div>
      <div>
        <label for="celular">Celular</label>
        <input id="celular" name="telefone" type="tel" placeholder="(11) 99999-9999">
      </div>
    </div>

    <!-- CEP / Cidade / Bairro -->
    <div class="form-row grid-3">
      <div>
        <label for="cep">CEP</label>
        <input id="cep" name="cep" type="text" placeholder="00000-000">
      </div>
      <div>
        <label for="cidade">Cidade</label>
        <input id="cidade" name="cidade" type="text">
      </div>
      <div>
        <label for="bairro">Bairro</label>
        <input id="bairro" name="bairro" type="text">
      </div>
    </div>

    <!-- Endereço completo -->
    <div class="form-row">
      <label for="endereco">Endereço completo</label>
      <input id="endereco" name="endereco" type="text" placeholder="Rua, número, complemento">
    </div>

    <!-- Tipo de imóvel -->
    <div class="form-row">
      <label>Você reside em imóvel próprio ou alugado?</label>
      <div class="options">
        <label><input type="radio" name="tipo_imovel" value="proprio" required> Próprio</label>
        <label><input type="radio" name="tipo_imovel" value="alugado"> Alugado</label>
      </div>
    </div>

    <!-- Concordância moradores -->
    <div class="form-row">
      <label>Todos da residência concordam com a adoção?</label>
      <div class="options">
        <label><input type="radio" name="concorda" value="sim" required> Sim</label>
        <label><input type="radio" name="concorda" value="nao"> Não</label>
      </div>
    </div>

    <!-- Local seguro / Grades / Quintal / Outros animais -->
    <div class="form-row">
      <label>O local que o animal ficará é seguro? (sem rotas de fuga / protegido)</label>
      <div class="options">
        <label><input type="radio" name="local_seguro" value="sim" required> Sim</label>
        <label><input type="radio" name="local_seguro" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Há grades em varandas/sacadas?</label>
      <div class="options">
        <label><input type="radio" name="grades" value="sim" required> Sim</label>
        <label><input type="radio" name="grades" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Possui quintal ou espaço adequado para o animal?</label>
      <div class="options">
        <label><input type="radio" name="quintal" value="sim" required> Sim</label>
        <label><input type="radio" name="quintal" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Tem outros animais? São sociáveis?</label>
      <div class="options">
        <label><input type="radio" name="outros_animais" value="sim" required> Sim</label>
        <label><input type="radio" name="outros_animais" value="nao"> Não</label>
      </div>
    </div>

    <!-- Comportamento filhotes / Compromisso saúde -->
    <div class="form-row">
      <label>Está ciente que filhotes podem morder, pular e arranhar?</label>
      <div class="options">
        <label><input type="radio" name="filhotes_comportamento" value="sim" required> Sim</label>
        <label><input type="radio" name="filhotes_comportamento" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Compromete-se a garantir saúde e bem-estar do pet?</label>
      <div class="options">
        <label><input type="radio" name="compromisso_saude" value="sim" required> Sim</label>
        <label><input type="radio" name="compromisso_saude" value="nao"> Não</label>
      </div>
    </div>

    <!-- Viagens / Mudança / Longevidade -->
    <div class="form-row">
      <label>Durante viagens, conta com cuidador de confiança ou creche?</label>
      <div class="options">
        <label><input type="radio" name="viagem_cuidador" value="sim" required> Sim</label>
        <label><input type="radio" name="viagem_cuidador" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Ciente que, em caso de mudança, deverá buscar imóvel que aceite animais?</label>
      <div class="options">
        <label><input type="radio" name="mudanca_aceitar" value="sim" required> Sim</label>
        <label><input type="radio" name="mudanca_aceitar" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Ciente que cães/gatos podem viver >10 anos e implicam custos e responsabilidades?</label>
      <div class="options">
        <label><input type="radio" name="longevidade" value="sim" required> Sim</label>
        <label><input type="radio" name="longevidade" value="nao"> Não</label>
      </div>
    </div>

    <!-- <div class="form-row">
      <label for="responsavel_viagem">Durante suas viagens, você conta com um cuidador de confiança ou com creche 
        especializada para garantir que seu animal receba todos os cuidados necessários?</label>
            <div class="options">
        <label><input type="radio" name="devolucao" value="sim" required> Sim</label>
        <label><input type="radio" name="devolucao" value="nao"> Não</label>
      </div>
    </div>

    <div class="form-row">
      <label>Você tem ciência de que, se for necessário mudar de casa, 
        de cidade ou por qualquer outro motivo, deverá se programar com antecedência para 
        encontrar um imóvel adequado e que aceite animais??</label>
      <div class="options">
        <label><input type="radio" name="devolucao" value="sim" required> Sim</label>
        <label><input type="radio" name="devolucao" value="nao"> Não</label>
      </div>
    </div> -->

    <!-- Animal de interesse -->
    <div class="form-row">
      <label for="animal_interesse">Qual animal você está interessado em adotar?</label>
      <select id="animal_interesse" name="animal_interesse" required>
        <option value="">Selecione aqui</option>
        <option value="cachorro">Cachorro</option>
        <option value="gato">Gato</option>
        <option value="filhote">Filhote</option>
        <option value="adulto">Adulto</option>
        <option value="outro">Outro</option>
      </select>
    </div>

    <!-- Confirmações -->
    <div class="form-row confirmacoes">
      <label><input type="checkbox" name="confirmo_veracidade" required> Eu confirmo a veracidade das informações</label>
      <label><input type="checkbox" name="concordo_politica" required> Eu concordo com os termos de política e privacidade</label>
    </div>

    <!-- Botão -->
    <div class="actions">
      <input type="submit" value="Enviar">
    </div>
  </form>

  <!-- FOOTER (mesmos ícones do site) -->
  <footer>
  <div class="footer-container">
    <!-- Logo + nome -->
    <div class="brand">
      <img src="logo.png" alt="SOPRAC" class="logo">
      <span class="brand-name">SOPRAC</span>
    </div>

    <!-- Redes sociais -->
    <div class="social">
      <a href="https://www.instagram.com/soprac_oficial?igsh=emhod2Zxa3V5eGE0"><div class="icon-box"><img src="img/instagram.png" alt="Instagram"></div></a>
      <a href="#"><div class="icon-box"><img src="img/whatsapp.png" alt="WhatsApp"></div></a>
    </div>
  </div>
</footer>

  <script>
    // salva dados em localStorage e redireciona
    const form = document.getElementById('adoptionForm');
    form.addEventListener('submit', function(e){
      e.preventDefault();
      const data = {};
      const elements = Array.from(form.elements).filter(el => el.name);
      elements.forEach(el => {
        const name = el.name;
        if (el.type === 'radio') {
          if (el.checked) data[name] = el.value;
          else if (!(name in data)) data[name] = "";
        } else if (el.type === 'checkbox') {
          data[name] = el.checked;
        } else {
          data[name] = el.value || "";
        }
      });
      data._id = Date.now();
      data._createdAt = new Date().toISOString();
      const registros = JSON.parse(localStorage.getItem('adocoes') || '[]');
      registros.push(data);
      localStorage.setItem('adocoes', JSON.stringify(registros));
      // redireciona para a página que mostra os formulários
      window.location.href = '#';
    });
  </script>
</body>
</html>
