<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header('Location: login.php'); 
    exit;
}

include_once("../model/animalBD.php");
include "sidebar.php"; // sidebar separada
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cães Cadastrados</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --vinho: #8B0000;
      --vinho-escuro: #5e0b0b;
      --marrom: #b08a64;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      min-height: 100vh;
      background: #fff;
    }

    .content {
      flex: 1;
      margin-left: 220px;
      padding: 40px;
    }

    h1 {
      color: var(--vinho);
      margin-bottom: 20px;
      text-align: center;
    }

    .header-controls {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 15px;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .filtros {
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .filtros label {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 14px;
      color: #333;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th { color: var(--marrom); font-size: 16px; }
    td { font-size: 14px; }

    .situacao-ong { color: black; }
    .situacao-adotado { color: red; }
    .situacao-transferido { color: green; }
    .situacao-falecido { color: purple; }

    .actions {
      display: flex;
      gap: 10px;
    }

    .actions a { font-size: 18px; text-decoration: none; }
    .edit { color: blue; }
    .delete { color: red; }
    .arquivo { color: var(--vinho); }

    .nome-link {
      color: var(--vinho);
      text-decoration: none;
      font-weight: bold;
    }

    .nome-link:hover {
      color: var(--marrom);
      text-decoration: underline;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .sidebar { width: 180px; padding: 15px; }
      .content { margin-left: 180px; padding: 20px; }
    }
  </style>
</head>
<body>

<div class="content">
  <h1>Cães Cadastrados</h1>

  <div class="header-controls">
    <div class="filtros">
      <label><input type="checkbox" value="Adotado"> Adotados</label>
      <label><input type="checkbox" value="Falecido"> Falecidos</label>
      <label><input type="checkbox" value="Transferido"> Transferidos</label>
      <label><input type="checkbox" value="Vivendo na ONG"> Vivendo na ONG</label>
    </div>
  </div>

  <table id="caesTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Fase</th>
        <th>Idade</th>
        <th>Raça</th>
        <th>Cor</th>
        <th>Situação</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = caes();
      if ($result && mysqli_num_rows($result) > 0) {
        while ($linha = mysqli_fetch_assoc($result)) {
          $idAnimal = $linha["idAnimal"];
          $situacaoClass = '';
          switch ($linha['situacao']) {
            case 'Adotado': $situacaoClass = 'situacao-adotado'; break;
            case 'Falecido': $situacaoClass = 'situacao-falecido'; break;
            case 'Transferido': $situacaoClass = 'situacao-transferido'; break;
            case 'Vivendo na ONG': $situacaoClass = 'situacao-ong'; break;
          }

          echo "<tr>";
          echo "<td><a href='fichaAnimal.php?id=$idAnimal' class='nome-link'>" . htmlspecialchars($linha["nomeAnimal"]) . "</a></td>";
          echo "<td>" . htmlspecialchars($linha["sexoAnimal"]) . "</td>";
          echo "<td>" . htmlspecialchars($linha["fase"]) . "</td>";
          echo "<td>" . htmlspecialchars($linha["idade"]) . "</td>";
          echo "<td>" . htmlspecialchars($linha["racaAnimal"]) . "</td>";
          echo "<td>" . htmlspecialchars($linha["corAnimal"]) . "</td>";
          echo "<td class='$situacaoClass'>" . htmlspecialchars($linha["situacao"]) . "</td>";
          echo "<td class='actions'>
                  <a href='#?id_animal=$idAnimal' class='edit'><i class='far fa-edit'></i></a>
                 <a href='../controller/cadAnimal.php?idAnimal=$idAnimal&tipo=cao' class='delete' onclick=\"return confirm('Deseja realmente excluir este cão?');\">
                  <i class='far fa-trash-alt'></i>
                </a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='8'>Nenhum cão encontrado ou erro na consulta.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
<!-- filtro de checkboxes -->
<script>
const checkboxes = document.querySelectorAll(".filtros input[type='checkbox']");
const rows = document.querySelectorAll("#caesTable tbody tr");

checkboxes.forEach(chk => {
  chk.addEventListener("change", function() {
    const ativos = Array.from(checkboxes)
                        .filter(c => c.checked)
                        .map(c => c.value);

    rows.forEach(row => {
      const statusCell = row.querySelector("td:nth-child(7)");
      const status = statusCell.innerText.trim();
      if (ativos.length === 0 || ativos.includes(status)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});
</script>

</body>
</html>
