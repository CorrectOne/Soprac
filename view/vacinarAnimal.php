<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header('Location: login.php'); 
    exit;
}

include '../model/animalVacinaBD.php';
$animais = listarAnimais();
$vacinas = listarVacinas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacinar Animal - SOPRAC</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      height: 100%;
    }

    body {
      display: flex;
      align-items: flex-start;
    }

    .sidebar {
      flex-shrink: 0;
      height: 100vh;
      box-sizing: border-box;
    }

   .main {
      flex: 1;
      padding: 40px;
      background-color: #fff;
      min-height: 100vh;
      box-sizing: border-box;
      margin-left: 220px; /* mesma largura da sidebar */
    }


    .main h1 {
      color: #801818;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-box {
      background-color: #fff;
      border: 3px solid #8b6b43;
      border-radius: 15px;
      padding: 30px;
      width: 700px;
      margin: 0 auto;
    }

    .form-box label {
      display: inline-block;
      width: 270px;
      font-weight: bold;
    }

    .form-box select,
    .form-box input[type="date"] {
      display: inline-block;
      width: 200px;
      padding: 5px;
      font-size: 15px;
    }

    .form-box button {
      display: block;
      margin: 30px auto 0 auto;
      padding: 10px 30px;
      background-color: #801818;
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
    }

    .form-box button:hover {
      background-color: #3f0707;

    }
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;

    }
  </style>
</head>
<body>
  <?php include 'sidebar.php'; ?>

  <div class="main">
    <h1>Vacinar animal</h1>
    <div class="form-box">
      <form action="../controller/cadAnimalVacina.php" method="post">
        <div>
          <label for="animal">Selecione o animal:</label>
          <select id="animal" name="animal" required>
            <option value="" selected disabled>Selecione aqui</option>
            <?php while($linha = mysqli_fetch_assoc($animais)) { ?>
              <option value="<?= $linha['idAnimal'] ?>">
                <?= $linha['nomeAnimal'] ?> - <?= $linha['especieAnimal'] ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <br>

        <div>
          <label for="vacina">Selecione a vacina:</label>
          <select id="vacina" name="vacina" required>
            <option value="" selected disabled>Selecione aqui</option>
            <?php while($linha = mysqli_fetch_assoc($vacinas)) { ?>
              <option value="<?= $linha['idVacina'] ?>">
                <?= $linha['nomeVacina'] ?> (<?= $linha['especieVacinada'] ?>)
              </option>
            <?php } ?>
          </select>
        </div>

        <br>

        <div>
          <label for="data">Dia da vacinação:</label>
          <input type="date" id="data" name="data" required>
        </div>

        <button type="submit">Registrar vacinação</button>
      </form>
    </div>
  </div>

  <script>
    const hoje = new Date().toISOString().split('T')[0];
    document.getElementById('data').setAttribute('max', hoje);
  </script>
</body>
</html>
