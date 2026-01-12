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
    <title>Publicar Eventos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
    }

        /* Conteúdo principal */
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        /* Cabeçalho do conteúdo */
        .content-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        
        .content-header h1 {
            color: #801818;
            flex-grow: 1;
            text-align: center;
            margin: 0;
        }
        
        .content-header .view-button {
            background-color: #801818;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }
        
        .content-header .view-button:hover {
            background-color: #6a1414;
        }

        /* Formulário */
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #c4a484; /* Borda da caixa do formulário */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group input[type="file"] {
            border: none;
            background-color: transparent;
        }

        .form-group.inline-group {
            display: flex;
            gap: 20px;
        }

        .form-group.inline-group > div {
            flex: 1;
        }
        
        .info-text {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 200px;
            margin: 20px auto 0;
            padding: 10px;
            background-color: #801818;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #6a1414;
        }
    </style>
</head>
<body>

   <?php include 'sidebar.php'; ?>

    <div class="content">
        <div class="content-header">
            <h1>Publicar eventos</h1>
            <a href="verEventos.php" class="view-button">Ver eventos cadastrados</a>
        </div>
        
        <div class="form-container">
        <form action="../controller/cadEvento.php" method="post">
        <div class="form-group"> <label for="imagem_evento">Escolha uma imagem para evento</label> 
            <input type="file" id="imagem_evento" name="imagem_evento"> 
        </div>
        <div class="form-group">
            <label for="titulo_evento">Escreva um título para o evento</label>
            <input type="text" id="titulo_evento" name="titulo_evento" placeholder="Insira o título do evento" required>
        </div>
        
        <div class="form-group">
            <label for="descricao_evento">Escreva uma breve descrição sobre o evento</label>
            <textarea id="descricao_evento" name="descricao_evento" rows="3" placeholder="Insira uma descrição sobre o evento, inclua data, local e hora" required></textarea>
        </div>
        
        <div class="form-group inline-group">
            <div>
                <label for="data_evento">Data do evento</label>
                <input type="date" id="data_evento" name="data_evento" required>
            </div>
            <div>
                <label for="data_expiracao">Data para ser expirada</label>
                <input type="date" id="data_expiracao" name="data_expiracao" required>
            </div>
        </div>
        <p class="info-text">* Em caso do evento durar o mês inteiro, marque o último dia do mês</p>
        
        <button type="submit">Enviar</button>
        </form>

        </div>
    </div>
</body>
</html>