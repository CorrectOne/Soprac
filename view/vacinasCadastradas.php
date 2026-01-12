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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacinas Cadastradas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --vinho: #8B0000;
      --vinho-escuro: #5e0b0b;
      --marrom: #b08a64;
    }

    /* Reset e body */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: Arial, sans-serif;
      display: flex;
      min-height: 100vh;
      background: #fff;
    }

    /* Conteúdo principal */
    .content {
      flex: 1;
      margin-left: 220px; /* espaço para o sidebar */
      padding: 40px;
      position: relative;
    }

    .content h1 {
      color: var(--vinho);
      margin-bottom: 20px;
      text-align: center;
    }

    /* Botão superior direito */
    .top-button {
      position: absolute;
      right: 30px;
      top: 30px;
      background: var(--vinho);
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    .top-button:hover {
      background: var(--vinho-escuro);
    }

    /* Tabela */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 60px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      color: var(--marrom);
      font-size: 16px;
      font-weight: bold;
    }

    td {
      font-size: 14px;
    }

    /* Ícones de ação */
    .actions {
      display: flex;
      gap: 10px;
    }

    .actions i {
      cursor: pointer;
      font-size: 18px;
    }

    .edit { color: blue; }
    .delete { color: red; }

    /* Responsividade */
    @media (max-width: 768px) {
      .sidebar { width: 180px; padding: 15px; }
      .content { margin-left: 180px; padding: 20px; }
      .top-button { top: 80px; right: 20px; }
    }
  </style>
</head>
<body>

<?php
include 'sidebar.php';
include '../model/vacinaBD.php';
?>

<div class="content">
  <h1>Vacinas Cadastradas</h1>

  <a href="cadastrarVacina.php" class="top-button">Cadastrar vacina</a>

  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Protege contra</th>
        <th>Frequência (meses)</th>
        <th>Espécie</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = vacinas();
      if ($result && mysqli_num_rows($result) > 0) {
          while ($linha = mysqli_fetch_assoc($result)) {
              $idVacina = $linha["idVacina"];
              echo "<tr>";
              echo "<td>" . htmlspecialchars($linha["nomeVacina"]) . "</td>";
              echo "<td>" . htmlspecialchars($linha["prevencaoVacina"]) . "</td>";
              echo "<td>" . htmlspecialchars($linha["frequenciaMeses"]) . "</td>";
              echo "<td>" . htmlspecialchars($linha["especieVacinada"]) . "</td>";
              echo "<td class='actions'>
                      <a href='#?id_vacina=$idVacina' class='edit'><i class='far fa-edit'></i></a>
                      <a href='../controller/cadVacina.php?idVacina=$idVacina' 
                        class='delete' 
                        onclick=\"return confirm('Deseja realmente excluir esta vacina?');\">
                        <i class='far fa-trash-alt'></i>
                      </a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>Nenhuma vacina encontrada ou erro na consulta.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
