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
  <title>Doenças cadastradas</title>
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
    }



    /* Conteúdo principal */
    .content {
      flex: 1;
      margin-left: 220px; /* espaço para o sidebar */
      padding: 40px;
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
    }

    .top-button:hover {
      background: var(--vinho-escuro);
    }

    /* Campo de busca */
    .search-box {
      position: absolute;
      right: 200px;
      top: 30px;
    }

    .search-box input {
      padding: 6px 12px;
      border: 2px solid var(--marrom);
      border-radius: 15px;
      outline: none;
    }

    /* Tabela */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 80px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      color: var(--marrom);
      font-size: 16px;
    }

    td {
      font-size: 14px;
    }

    /* Ícones de ação */
    .actions {
      display: flex;
      gap: 10px;
    }

    .actions a {
      font-size: 18px;
      text-decoration: none;
    }

    .edit { color: blue; }
    .delete { color: red; }

    /* Responsividade */
    @media (max-width: 768px) {
      .sidebar {
        width: 180px;
        padding: 15px;
      }

      .content {
        margin-left: 180px;
        padding: 20px;
      }

      .top-button {
        top: 80px;
        right: 20px;
      }

      .search-box {
        right: 180px;
        top: 80px;
      }
    }
  </style>
</head>
<body>
<?php 
include 'sidebar.php';
include '../model/doencaBD.php'
?>

  <!-- Conteúdo principal -->
  <div class="content">
    <h1>Doenças cadastradas</h1>

    <a href="cadastroDoenca.php" class="top-button">Cadastrar doença</a>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sintomas</th>
          <th>Prevenção</th>
          <th>Espécie</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      <?php
$result = doencas(); // chama a função de doenças
if ($result && mysqli_num_rows($result) > 0) {
    while ($linha = mysqli_fetch_assoc($result)) {
        $idDoenca = $linha["idDoenca"]; // pega id da doença
        echo "<tr>";
        echo "<td>" . htmlspecialchars($linha["nomeDoenca"]) . "</td>";
        echo "<td>" . htmlspecialchars($linha["sintomasDesc"]) . "</td>";
        echo "<td>" . htmlspecialchars($linha["prevencao"]) . "</td>";
        echo "<td>" . htmlspecialchars($linha["especieAfetada"]) . "</td>";
        echo "<td class='actions'>
                <a href='#?id_doenca=$idDoenca' class='edit'><i class='far fa-edit'></i></a>
                <a href='../controller/cadDoenca.php?idDoenca=$idDoenca' 
                  class='delete' 
                  onclick=\"return confirm('Deseja realmente excluir esta doença?');\">
                  <i class='far fa-trash-alt'></i>
                </a>

              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhuma doença encontrada ou erro na consulta.</td></tr>";
}
?>

      </tbody>
    </table>
  </div>

</body>
</html>
