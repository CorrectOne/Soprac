<?php 
session_start(); 
// vai para login caso não tenha nenhum usuário cadastrado
if (!isset($_SESSION['idUser'])) {     
  header('Location:login.php');      
  exit; 
}  

include "../model/animalBD.php"; 
$doenca = listarDoenca(); 
?>   

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head>   
  <meta charset="UTF-8">   
  <meta name="viewport" content="width=device-width, initial-scale=1.0">   
  <title>Cadastrar Animal - SOPRAC</title>   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    

  <style>
    :root {
      --vinho: #7b0f0f;
      --vinho-escuro: #5e1212;
      --bege: #f8f4ef;
      --marrom-claro: #b08a64;
      --cinza: #ddd;
      --texto: #333;
    }

    * { box-sizing: border-box; }

    body {
      margin:0;
      font-family: 'Inter', sans-serif;
      color:var(--texto);
      background: #fff;
    }

    .main-content {
      margin-left: 240px;
      padding: 20px;
    }

    .main-content h1 {
      text-align: center;
      color: var(--vinho);
      margin-bottom: 20px;
    }

    form {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      border: 2px solid var(--marrom-claro);
      border-radius: 12px;
      padding: 25px 30px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-row { margin-bottom: 18px; }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      font-size: 0.95rem;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid var(--cinza);
      border-radius: 6px;
      font-size: 0.95rem;
    }

    textarea {
      min-height: 80px;
      resize: vertical;
    }

    .radio-group, .checkbox-group {
      display: flex;
      gap: 15px;
      margin-top: 8px;
    }

    .radio-group label, .checkbox-group label {
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: normal;
    }

    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .actions {
      text-align: center;
      margin-top: 20px;
    }

    button {
      background-color: var(--vinho);
      color: #fff;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
    }

    button:hover { background-color: var(--vinho-escuro); }

    @media (max-width: 768px) {
      .main-content { margin-left: 0; }
      .grid-2 { grid-template-columns: 1fr; }
    }
  </style>
</head> 
<body>   
  <?php include 'sidebar.php';  ?>    

  <div class="main-content">     
    <h1>Cadastrar animal</h1>          

    <form action="../controller/cadAnimal.php" method="POST" enctype="multipart/form-data">       
      <!-- Nome / Espécie / Raça -->
      <div class="form-row">         
        <label for="nomeAnimal">Informe o nome do animal:</label>         
        <input type="text" id="nomeAnimal" name="nomeAnimal" placeholder="Insira o nome do animal" required>       
      </div>        

      <div class="form-row grid-2">         
        <div>           
          <label for="especie">Espécie:</label>           
          <select id="especie" name="especie">             
            <option value="" selected disabled required>Selecione a espécie</option>             
            <option value="Felina">Felina</option>             
            <option value="Canina">Canina</option>           
          </select>         
        </div>         
        <div>           
          <label for="raca">Raça:</label>           
          <input type="text" id="raca" name="raca" placeholder="Insira a raça" required>         
        </div>       
      </div>          

      <div>           
        <label for="cor">Cor do Animal:</label>           
        <input type="text" id="cor" name="cor" placeholder="Cor" required>         
      </div>       
      <br/>        

      <!-- Nascimento -->
      <div class="form-row">         
        <label for="nascimentoAnimal">Nascimento:</label>         
        <input type="date" id="nascimentoAnimal" name="nascimento" required>       
      </div>        

      <!-- Sexo -->
      <div class="form-row">         
        <label>Sexo:</label>         
        <div class="radio-group">           
          <label><input type="radio" name="sexo" value="Fêmea"> Fêmea</label>           
          <label><input type="radio" name="sexo" value="Macho"> Macho</label>         
        </div>       
      </div>        

      <!-- Data de resgate -->
      <div class="form-row">         
        <label for="resgate">Data de resgate:</label>         
        <input type="date" id="resgate" name="resgate">       
      </div>              

      <!-- Situação -->
      <div class="form-row">         
        <label>Situação:</label>         
        <div class="radio-group">           
          <label><input type="radio" name="situacao" value="Vivendo na ONG"> Vivendo na ONG</label>           
          <label><input type="radio" name="situacao" value="Transferido"> Transferido</label>           
          <label><input type="radio" name="situacao" value="Adotado"> Adotado</label>           
          <label><input type="radio" name="situacao" value="Falecido"> Falecido</label>         
        </div>       
      </div>        

      <!-- Data de Transferência -->
      <div class="form-row" id="divTransferencia" style="display:none;">
        <label for="transferencia">Data de transferência:</label>
        <input type="date" id="transferencia" name="transferencia">
      </div>

      <!-- Data de Adoção -->
      <div class="form-row" id="divAdocao" style="display:none;">
        <label for="adocao">Data de adoção:</label>
        <input type="date" id="adocao" name="adocao">
      </div>

      <!-- Data de Óbito -->
      <div class="form-row" id="divObito" style="display:none;">
        <label for="obito">Data de óbito:</label>
        <input type="date" id="obito" name="obito">
      </div>

      <!-- Castrado -->
      <div>           
        <label>Castrado?</label>           
        <div class="radio-group">             
          <label><input type="radio" name="castrado" value="1"> Sim</label>             
          <label><input type="radio" name="castrado" value="0"> Não</label>           
        </div>         
      </div>        

      <!-- Local / Resgate -->
      <div class="form-row">         
        <label for="bairro">Bairro que foi resgatado:</label>         
        <input type="text" id="bairro" name="bairro" placeholder="Insira onde o animal foi encontrado">       
      </div>        

      <div class="form-row">         
        <label for="resgatou">Quem resgatou?</label>         
        <input type="text" id="resgatou" name="resgatou" placeholder="Insira o nome de quem participou do resgate">       
      </div>        

      <!-- Doenças -->
      <div class="form-row">         
        <label>Possui doença?</label>         
        <div class="radio-group">           
          <label><input type="radio" name="doenca" value="1"> Sim</label>           
          <label><input type="radio" name="doenca" value="0"> Não</label>         
        </div>       
      </div>        

      <div class="form-row" id="divDoenca" style="display:none;">         
        <label for="tipoDoenca">Doença:</label>         
        <select id="tipoDoenca" name="tipoDoenca">           
          <option value="" selected disabled>Selecione a doença</option>           
          <?php while($linha = mysqli_fetch_assoc($doenca)) { ?>             
            <option value="<?= $linha['idDoenca'] ?>"><?= $linha['nomeDoenca'] ?></option>           
          <?php } ?>         
        </select>       
      </div>         

      <div class="form-row">         
        <label for="remedios">Toma algum remédio? Descreva:</label>         
        <textarea id="remedios" name="remedios" placeholder="Informe aqui"></textarea>       
      </div>        

      <!-- Disponível para adoção -->
      <div class="form-row">         
        <label>Disponível para adoção?</label>         
        <div class="radio-group">           
          <label><input type="radio" name="adocaoDisponivel" value="1"> Sim</label>           
          <label><input type="radio" name="adocaoDisponivel" value="0"> Não</label>         
        </div>       
      </div>        

      <!-- Upload de imagem -->
      <div class="form-row">         
        <label for="imagemAnimal">Escolha uma imagem do animal:</label>         
        <input type="file" id="imagemAnimal" name="imagemAnimal" accept="image/*">       
      </div>        

      <!-- Descrição -->
      <div class="form-row">         
        <label for="descricao">Escreva uma breve descrição sobre o animal para o possível adotante:</label>         
        <textarea id="descricao" name="descricao" placeholder="Insira uma descrição sobre ele"></textarea>       
      </div>        

      <!-- Botão -->
      <div class="actions">         
        <button type="submit">Salvar cadastro</button>       
      </div>     
    </form>   
  </div>    

  <script>
    // mostra o select de doenças se "sim" for selecionado
    const radiosDoenca = document.querySelectorAll('input[name="doenca"]');   
    const divDoenca = document.getElementById('divDoenca');    

    radiosDoenca.forEach(radio => {     
      radio.addEventListener('change', function() {       
        if(this.value === '1') {         
          divDoenca.style.display = 'block';       
        } else {         
          divDoenca.style.display = 'none';         
          document.getElementById('tipoDoenca').selectedIndex = 0;       
        }     
      });   
    });  

    // mostra as datas conforme a situação
    const radiosSituacao = document.querySelectorAll('input[name="situacao"]');
    const divAdocao = document.getElementById('divAdocao');
    const divObito = document.getElementById('divObito');
    const divTransferencia = document.getElementById('divTransferencia');

    radiosSituacao.forEach(radio => {
      radio.addEventListener('change', function() {
        // esconde tudo
        divAdocao.style.display = 'none';
        divObito.style.display = 'none';
        divTransferencia.style.display = 'none';
        document.getElementById('adocao').value = '';
        document.getElementById('obito').value = '';
        document.getElementById('transferencia').value = '';

        if(this.value === 'Adotado') {
          divAdocao.style.display = 'block';
        } else if(this.value === 'Falecido') {
          divObito.style.display = 'block';
        } else if(this.value === 'Transferido') {
          divTransferencia.style.display = 'block';
        }
      });
    });

    // define a data de hoje como máximo permitido
    const hoje = new Date().toISOString().split('T')[0];    
    document.getElementById('nascimentoAnimal').setAttribute('max', hoje);   
    document.getElementById('resgate').setAttribute('max', hoje);   
    document.getElementById('adocao').setAttribute('max', hoje);   
    document.getElementById('obito').setAttribute('max', hoje);   
    document.getElementById('transferencia').setAttribute('max', hoje);   
  </script>  
</body> 
</html>
