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
  <meta charset="UTF-8">
  <title>Cadastrar vacina</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
    }



    /* Área de conteúdo */
    .content {
      flex: 1;
      padding: 40px;
      position: relative;
    }

    .content h1 {
      color: #7b0f0f;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Caixa do formulário */
    .form-box {
      border: 2px solid #a57d3d;
      border-radius: 10px;
      padding: 20px;
      max-width: 500px;
      margin: 0 auto;
    }


    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"], textarea {
      width: 100%;
      padding: 8px;
      border: none;
      border-bottom: 1px solid #aaa;
      outline: none;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
    }

    .radio-group {
      margin-top: 10px;
    }

    .radio-group label {
      font-weight: normal;
      display: flex;
      align-items: center;
      margin-bottom: 8px;
    }

    .radio-group input {
      margin-right: 8px;
    }

    .btn {
      margin-top: 20px;
      background-color: #7b0f0f;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      display: block;
      margin-left: auto;
      margin-right: auto;
      font-weight: bold; 
    }

    .btn:hover {
      background-color: #5e0b0b;
    }

    /* Botão superior direito */
    .top-button {
      position: absolute;
      right: 30px;
      top: 30px;
      background: #7b0f0f;
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .top-button:hover {
      background: #5e0b0b;
    }
  </style>
</head>
<body>
    
   <?php include 'sidebar.php'; ?>
  <!-- Conteúdo principal -->
  <div class="content">
    <a href="vacinasCadastradas.php" class="top-button">Ver vacinas cadastrados</a>
    <h1>Cadastrar vacina</h1>

    <div class="form-box">
      <form action="../controller/cadVacina.php" method="post">

        <label for="nome">Informe o nome da vacina:</label>
          <input type="text" id="nome" name ="nome_vacina" placeholder="Insira o nome da vacina">

        <label>Espécie(s) que são vacinadas:</label>
          <div class="radio-group">
            <label><input type="radio" name="especie_afetada" value="Cão" required> Cão</label>
            <label><input type="radio" name="especie_afetada" value="Gato"> Gato</label>
            <label><input type="radio" name="especie_afetada" value="Ambos"> Ambos</label>
          </div>

        <label for="protecao">Contra o que protege:</label>
        <input type="text" id="protecao" name="descricao_protecao" placeholder="Informe aqui">

        <label for="frequencia">Frequência (meses):</label>
        <input type="text" id="frequencia" name= "frequencia_vacina"placeholder="Informe a frequência da vacinação">

        <button type="submit" class="btn">Enviar</button>
      </form>
    </div>
  </div>

</body>
</html>
