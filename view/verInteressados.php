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
  <title>SOPRAC - Ver Interessados</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --vinho: #8B0000;
      --vinho-escuro: #5e0b0b;
      --marrom: #b08a64;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      min-height: 100vh;
      background: #fff;
    }

    /* Conteúdo principal */
    .main { 
      flex: 1; 
      padding: 40px; 
      margin-left: 220px; /* espaço para sidebar */
    }

    .main h1 {
      color: var(--vinho);
      margin-bottom: 20px;
      text-align: center;
    }

    .header-controls {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    /* novo */
    .filtros {
    display: flex;
    gap: 12px; /* espaço entre cada checkbox */
    align-items: center;
    margin-bottom: 20px;
  }

  .filtros label {
    display: flex;
    align-items: center;
    gap: 5px; /* espaço entre o checkbox e o texto */
    font-size: 14px;
    color: #333;
    cursor: pointer;
  }

  .filtros input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
  }

    /* antigo  */
    /* .search input {
      padding: 8px 14px;
      border: 2px solid var(--marrom);
      border-radius: 20px;
      outline: none;
      font-size: 14px;
      background: #fff;
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
    } */

    /* Tabela */
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      color: var(--marrom);
      font-weight: bold;
      font-size: 16px;
    }

    td {
      font-size: 14px;
    }

    /* Status */
    .status { font-weight: bold; }
    .status.finalizado { color: #0073e6; }
    .status.pendente { color: #f0ad4e; }
    .status.rejeitado { color: #d9534f; }
    .status.aprovado { color: #28a745; }

    /* Ações */
    .actions {
      display: flex;
      gap: 10px;
    }

    .actions i {
      font-size: 18px;
      cursor: pointer;
    }

    .edit { color: blue; }
    .delete { color: red; }
    .arquivo { color: #5e0b0b; } /* ícone de arquivo */
  </style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main">
  <h1>Ver Interessados</h1>

  <div class="header-controls">
    <div class="search">
      
    </div>

    <div class="filtros">
      <label><input type="checkbox" value="finalizado"> Finalizados</label>
      <label><input type="checkbox" value="pendente"> Pendentes</label>
      <label><input type="checkbox" value="aprovado"> Aprovados</label>
      <label><input type="checkbox" value="rejeitado"> Rejeitados</label>
    </div>
  </div>

  <table id="interessadosTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Celular</th>
        <th>Animal</th>
        <th>Situação</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Luiz Almeida</td>
        <td>luiz.a@gmail.com</td>
        <td>(11)95555-2222</td>
        <td>Atena</td>
        <td class="status rejeitado"><i class="fa-solid fa-circle-xmark"></i> Rejeitado</td>
        <td class="actions">
          <a href="#" class="arquivo"><i class="fa-solid fa-file"></i></a>
         <a href='../controller/interessados.php?idCandidato=$idCandidato' class='delete' onclick=\"return confirm('Deseja realmente excluir este candidato?');\">
                <i class='far fa-trash-alt'></i>
                </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- filtro de checkboxes -->
<script>
const checkboxes = document.querySelectorAll(".filtros input[type='checkbox']"); // junta todos de type='checkbox'
const rows = document.querySelectorAll("#interessadosTable tbody tr"); // junta todos da tabela interessados no tbody
// filtros por status
checkboxes.forEach(chk => { //chk = para cada item do checkbox
  chk.addEventListener("change", function() { //um listener pra quando mudar ativa a função
    const ativos = Array.from(checkboxes) //transforma em um array
                        .filter(c => c.checked) //seleciona apenas o checkbox marcado
                        .map(c => c.value); //pega o valor da checkbox selecionada

    rows.forEach(row => { // percorre cada linha
      const statusCell = row.querySelector(".status"); // para a linha atual pegar a célula que tem o status
      const status = statusCell.classList[1]; // pega a segunda classe da célula .status que indica o status do interessado, para poder filtrar a linha
      if (ativos.length === 0 || ativos.includes(status)) { // nenhum marcado então mostra todos
        row.style.display = ""; // mostra a linha
      } else {
        row.style.display = "none"; // esconde a linha
      }
    });
  });
});
</script>

</body>
</html>
