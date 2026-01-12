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

<style>
  :root {
    --vinho: #8B0000;
    --vinho-escuro: #5a1f1f;
  }

  .sidebar {
    width: 220px;
    background-color: var(--vinho);
    color: #fff;
    display: flex;
    flex-direction: column;
    padding: 20px;
    position: fixed;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
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
  }

  .sidebar a:hover {
    background-color: var(--vinho-escuro);
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
</style>
