<?php
session_start();
if (!isset($_SESSION['idUser'])) {
  header('Location: login.php');
  exit;
}

include_once("../model/animalBD.php");

// pega o id da URL
$animalSelecionado = null;
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $result = buscaAnimalPorId($id);
  if ($result && mysqli_num_rows($result) > 0) {
    $animalSelecionado = mysqli_fetch_assoc($result);
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ficha do Animal</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      background-color: #f5f5f5;
      min-height: 100vh;
    }

    .sidebar {
      width: 220px;
      background-color: #8B0000;
      color: #fff;
      display: flex;
      flex-direction: column;
      padding: 20px;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 1.4rem;
      text-align: center;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
      padding: 10px;
      margin: 8px 0;
      border-radius: 8px;
      background-color: #801818;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .sidebar a:hover {
      background-color: #5a1f1f;
    }

    .sidebar .sair {
      margin-top: auto;
      background-color: #a00;
    }

    .sidebar .sair:hover {
      background-color: #700;
    }

    .sidebar i {
      min-width: 20px;
      text-align: center;
    }

    .main-content {
      margin-left: 220px;
      padding: 20px;
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .ficha {
      width: 100%;
      max-width: 600px;
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .ficha h1 {
      text-align: center;
      color: #801818;
      margin-bottom: 15px;
    }

    .ficha img {
      display: block;
      margin: 10px auto;
      max-width: 300px;
      height: auto;
      border-radius: 10px;
    }

    .ficha p {
      font-size: 16px;
      margin: 8px 0;
    }

    .label {
      font-weight: bold;
      color: #a91616;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main-content {
        margin-left: 0;
        padding: 10px;
      }

      .ficha {
        padding: 15px;
      }
    }

    .botoes {
      text-align: center;
      margin-top: 20px;
    }

    .edit-btn {
      background-color: #801818;
      color: #fff;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .edit-btn:hover {
      background-color: #5a1f1f;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2><i class="fa-solid fa-paw"></i> SOPRAC</h2>
    <a href="cadastrarAnimal.php"><i class="fa-solid fa-paw"></i>&nbsp; Cadastrar animal</a>
    <a href="verCaes.php"><i class="fa-solid fa-dog"></i>&nbsp; Ver cães</a>
    <a href="verGatos.php"><i class="fa-solid fa-cat"></i>&nbsp; Ver gatos</a>
    <a href="verEventos.php"><i class="fa-solid fa-heart"></i>&nbsp; Ver eventos</a>
    <a href="doencasCadastradas.php"><i class="fa-solid fa-briefcase-medical"></i>&nbsp; Ver doenças</a>
    <a href="vacinarAnimal.php"><i class="fa-solid fa-syringe"></i>&nbsp; Vacinar animal</a>
    <a href="vacinasCadastradas.php"><i class="fa-solid fa-syringe"></i>&nbsp; Ver vacinas</a>
    <a href="verInteressados.php"><i class="fa-solid fa-eye"></i>&nbsp; Ver interessados</a>
    <a href="../controller/logout.php" class="sair"><i class="fa-solid fa-right-from-bracket"></i>&nbsp; Deslogar</a>
  </div>

  <!-- Conteúdo principal -->
  <div class="main-content">
    <div class="ficha">
      <?php if ($animalSelecionado): ?>
        <h1><?= htmlspecialchars($animalSelecionado["nomeAnimal"]); ?></h1>
        <?php if (!empty($animalSelecionado["urlImagem"])): ?>
          <?php
          $caminhoImagem = "../uploads/" . trim($animalSelecionado["urlImagem"]);
          if (!file_exists($caminhoImagem)) {
            $caminhoImagem = "../img/default.png";
          }
          ?>
          <img src="<?= htmlspecialchars($caminhoImagem) ?>" alt="Imagem do animal">
        <?php endif; ?>
        <p><span class="label">Espécie:</span> <?= htmlspecialchars($animalSelecionado["especieAnimal"]); ?></p>
        <p><span class="label">Sexo:</span> <?= htmlspecialchars($animalSelecionado["sexoAnimal"]); ?></p>
        <p><span class="label">Raça:</span> <?= htmlspecialchars($animalSelecionado["racaAnimal"]); ?></p>
        <p><span class="label">Cor:</span> <?= htmlspecialchars($animalSelecionado["corAnimal"]); ?></p>
        <p><span class="label">Idade:</span> <?= htmlspecialchars($animalSelecionado["idade"]); ?> anos</p>
        <p><span class="label">Fase:</span> <?= htmlspecialchars($animalSelecionado["fase"]); ?></p>

        <p><span class="label">Situação:</span> <?= htmlspecialchars($animalSelecionado["situacao"]); ?></p>
        <?php if (!empty($animalSelecionado["dataSaida"])): ?>
          <?php
          $labelSaida = "Data de Saída";
          if ($animalSelecionado["situacao"] === "Adotado") {
            $labelSaida = "Data de Adoção";
          } elseif ($animalSelecionado["situacao"] === "Falecido") {
            $labelSaida = "Data de Óbito";
          } elseif ($animalSelecionado["situacao"] === "Transferido") {
            $labelSaida = "Data de Transferência";
          }
          ?>
          <p><span class="label"><?= $labelSaida ?>:</span> <?= htmlspecialchars($animalSelecionado["dataSaida"]); ?></p>
        <?php endif; ?>

        <p><span class="label">Castrado:</span> <?= $animalSelecionado["castrado"] ? "Sim" : "Não"; ?></p>
        <p><span class="label">Data de Resgate:</span> <?= htmlspecialchars($animalSelecionado["dtResgate"]); ?></p>
        <p><span class="label">Endereço do Resgate:</span> <?= htmlspecialchars($animalSelecionado["enderecoResgate"]); ?></p>
        <p><span class="label">Pessoal do Resgate:</span> <?= htmlspecialchars($animalSelecionado["pessoalResgate"]); ?></p>
        <p><span class="label">Remédios:</span> <?= htmlspecialchars($animalSelecionado["remedioDesc"]); ?></p>
        <p><span class="label">Descrição:</span> <?= htmlspecialchars($animalSelecionado["animalDesc"]); ?></p>
        <p><span class="label">Disponível para Adoção:</span> <?= $animalSelecionado["disponivelAdoc"] ? "Sim" : "Não"; ?></p>
        <div class="botoes">
          <button class="edit-btn" onclick="window.location.href='atualizarAnimal.php?id=<?= $animalSelecionado['idAnimal']; ?>'">
            Editar
          </button>
        </div>
    </div>
  <?php else: ?>
    <p>Nenhum animal encontrado.</p>
  <?php endif; ?>
  </div>

  </div>
</body>

</html>