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
  <title>Cadastrar doença</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }

    /* Sidebar */
    <?php /* Aqui você pode manter o CSS do sidebar se quiser */ ?>

    /* Área de conteúdo */
    .content {
      flex: 1;
      padding: 40px;
    }

    h1 {
      color: #7b0f0f;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-box {
      border: 2px solid #a57d3d;
      border-radius: 10px;
      padding: 20px;
      max-width: 400px;
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
      border: 1px solid #aaa;
      border-radius: 5px;
      outline: none;
      font-size: 14px;
      box-sizing: border-box;
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
      width: 100%;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #5e0b0b;
    }

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

  <!-- Incluindo o sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Conteúdo -->
  <div class="content">
    <a href="doencasCadastradas.php" class="top-button">Ver doenças cadastradas</a>

    <h1>Cadastrar doença</h1>

    <div class="form-box">
      <form action="../controller/cadDoenca.php" method="POST">
        <label for="nome">Informe o nome da doença:</label>
        <input type="text" id="nome" name="nome_doenca" placeholder="Insira o nome da doença" required>

        <label>Espécie(s) afetada(s):</label>
        <div class="radio-group">
          <label>
            <input type="radio" name="especieAfetada" value="cao" required> Cão
          </label>
          <label>
            <input type="radio" name="especieAfetada" value="gato" required> Gato
          </label>
          <label>
            <input type="radio" name="especieAfetada" value="ambos" required> Ambos
          </label>
        </div>

        <label for="sintomas">Sintomas:</label>
        <textarea id="sintomas" name="sintoma_doenca" placeholder="Informe os sintomas" required></textarea>

        <label for="prevencao">Prevenção:</label>
        <textarea id="prevencao" name="prevencao" placeholder="Informe a prevenção da doença" required></textarea>

        <button type="submit" class="btn">Enviar</button>
      </form>
    </div>
  </div>

</body>
</html>
