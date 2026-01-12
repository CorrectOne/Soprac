<?php
session_start();
// vai para login caso não tenha nenhum usuário cadastrado
if (!isset($_SESSION['idUser'])) {
    header('Location:login.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Formulário de adoção e responsabilidade</title>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
    }

   
    /* Conteúdo principal */
    .main-content { 
      margin-left: 240px; 
      padding: 20px; 
    }

    /* FORM */
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
    input[type="text"], input[type="email"], input[type="tel"], select, textarea {
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

    @media (max-width:820px){
      .grid-2{ grid-template-columns: 1fr; }
      .grid-3{ grid-template-columns: 1fr 1fr; }
      #adoptionForm { padding:22px; margin:16px; }
      .main-content { margin-left: 0; }
    }
  </style>
</head>
<body>

<?php include 'sidebar.php'; ?>

  <!-- Conteúdo principal -->
  <div class="main-content">
    <h2 style="color:var(--vinho); text-align:center; margin-bottom:16px;">Formulário de adoção e responsabilidade</h2>

    <form id="adoptionForm" action="#" method="post" novalidate>
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

      <!-- Endereço -->
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

      <!-- Local seguro -->
      <div class="form-row">
        <label>O local é seguro?</label>
        <div class="options">
          <label><input type="radio" name="local_seguro" value="sim" required> Sim</label>
          <label><input type="radio" name="local_seguro" value="nao"> Não</label>
        </div>
      </div>

      <!-- Grades -->
      <div class="form-row">
        <label>Há grades em varandas/sacadas?</label>
        <div class="options">
          <label><input type="radio" name="grades" value="sim" required> Sim</label>
          <label><input type="radio" name="grades" value="nao"> Não</label>
        </div>
      </div>

      <!-- Quintal -->
      <div class="form-row">
        <label>Possui quintal ou espaço adequado?</label>
        <div class="options">
          <label><input type="radio" name="quintal" value="sim" required> Sim</label>
          <label><input type="radio" name="quintal" value="nao"> Não</label>
        </div>
      </div>

      <!-- Outros animais -->
      <div class="form-row">
        <label>Tem outros animais? São sociáveis?</label>
        <div class="options">
          <label><input type="radio" name="outros_animais" value="sim" required> Sim</label>
          <label><input type="radio" name="outros_animais" value="nao"> Não</label>
        </div>
      </div>

      <!-- Comportamento filhotes -->
      <div class="form-row">
        <label>Ciente sobre comportamento de filhotes?</label>
        <div class="options">
          <label><input type="radio" name="filhotes_comportamento" value="sim" required> Sim</label>
          <label><input type="radio" name="filhotes_comportamento" value="nao"> Não</label>
        </div>
      </div>

      <!-- Compromisso saúde -->
      <div class="form-row">
        <label>Compromete-se a garantir saúde e bem-estar do pet?</label>
        <div class="options">
          <label><input type="radio" name="compromisso_saude" value="sim" required> Sim</label>
          <label><input type="radio" name="compromisso_saude" value="nao"> Não</label>
        </div>
      </div>

      <!-- Viagem / responsável -->
      <div class="form-row">
        <label>Durante viagens, conta com cuidador de confiança?</label>
        <div class="options">
          <label><input type="radio" name="viagem_cuidador" value="sim" required> Sim</label>
          <label><input type="radio" name="viagem_cuidador" value="nao"> Não</label>
        </div>
      </div>

      <!-- Mudança -->
      <div class="form-row">
        <label>Ciente sobre mudança de imóvel?</label>
        <div class="options">
          <label><input type="radio" name="mudanca_aceitar" value="sim" required> Sim</label>
          <label><input type="radio" name="mudanca_aceitar" value="nao"> Não</label>
        </div>
      </div>

      <!-- Longevidade -->
      <div class="form-row">
        <label>Ciente sobre longevidade do animal?</label>
        <div class="options">
          <label><input type="radio" name="longevidade" value="sim" required> Sim</label>
          <label><input type="radio" name="longevidade" value="nao"> Não</label>
        </div>
      </div>

      <!-- Responsável viagem -->
      <div class="form-row">
        <label for="responsavel_viagem">Responsável em caso de viagem</label>
        <input id="responsavel_viagem" name="responsavel_viagem" type="text" placeholder="Nome da pessoa responsável">
      </div>

      <!-- Devolução -->
      <div class="form-row">
        <label>Em caso de mudança, o animal será devolvido?</label>
        <div class="options">
          <label><input type="radio" name="devolucao" value="sim" required> Sim</label>
          <label><input type="radio" name="devolucao" value="nao"> Não</label>
        </div>
      </div>

      <!-- Animal de interesse -->
      <div class="form-row">
        <label for="animal_interesse">Qual animal deseja adotar?</label>
        <select id="animal_interesse" name="animal_interesse" required>
          <!-- <option value="">Selecione</option>
          <option value="cachorro">Cachorro</option>
          <option value="gato">Gato</option>
          <option value="filhote">Filhote</option>
          <option value="adulto">Adulto</option>
          <option value="outro">Outro</option> -->
        </select>


      <!-- Confirmações -->
      <div class="form-row confirmacoes">
        <label><input type="checkbox" name="confirmo_veracidade" required> Confirmo a veracidade das informações</label>
        <label><input type="checkbox" name="concordo_politica" required> Concordo com termos de política e privacidade</label>
      </div>

      <!-- Botão -->
      <div class="actions">
        <input type="submit" value="Enviar">
      </div>

    </form>
  </div>

</body>
</html>
