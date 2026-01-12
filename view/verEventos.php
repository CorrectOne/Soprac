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
  <title>Eventos Cadastrados</title>
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
    }

    .content h1 {
      color: var(--vinho);
      margin-bottom: 20px;
      text-align: center;
    }

    /* Botão superior direito */
    .top-actions {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 15px;
    }

    .btn {
      background: var(--vinho);
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    .btn:hover {
      background: var(--vinho-escuro);
    }

    /* Tabela */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      color: var(--marrom);
      font-weight: bold;
    }

    td {
      font-size: 14px;
    }

    /* Ícones de ação */
    .acoes {
      display: flex;
      gap: 10px;
    }

    .acoes i {
      cursor: pointer;
      font-size: 18px;
    }

    .editar { color: blue; }
    .excluir { color: red; }

    /* Responsividade */
    @media (max-width: 768px) {
      .sidebar { width: 180px; padding: 15px; }
      .content { margin-left: 180px; padding: 20px; }
      .top-actions { flex-direction: column; gap: 10px; }
    }
  </style>
</head>
<body>

<?php
include 'sidebar.php';
include '../model/eventosBD.php';
?>

<div class="content">
  <h1>Eventos Cadastrados</h1>

  <div class="top-actions">
    <a href="publicarEventos.php" class="btn">Cadastrar evento</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Expiração</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = eventos();
      if ($result && mysqli_num_rows($result) > 0) {
        while ($linha = mysqli_fetch_assoc($result)) {
          $idEvento = $linha["idEvento"];
          echo "<tr>";
          echo "<td>" . htmlspecialchars($linha["tituloEvento"]) . "</td>"; 
          echo "<td>" . htmlspecialchars($linha["dataIn"]) . "</td>";
          echo "<td>" . htmlspecialchars($linha["dataExp"]) . "</td>";
          echo "<td class='acoes'>
                  <a href='#?idEvento=$idEvento' class='editar'><i class='far fa-edit'></i></a>
                  <a href='../controller/cadEvento.php?idEvento=$idEvento' 
                    class='excluir' 
                    onclick=\"return confirm('Deseja realmente excluir esta evento?');\">
                    <i class='far fa-trash-alt'></i>
                  </a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>Nenhum evento encontrado ou erro na consulta.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
