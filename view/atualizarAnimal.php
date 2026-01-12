<?php
session_start();

if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}

include "../model/animalBD.php";

$idAnimal = $_GET['id'] ?? 0;
$animal = buscarAnimalEdt($idAnimal);

$disponivelAdoc = isset($animal['disponivelAdoc']) ? $animal['disponivelAdoc'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Animal - SOPRAC</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    

<style>
/* SEUS ESTILOS CSS */
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
    width: 100%;
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
<?php include 'sidebar.php'; ?>

<div class="main-content">
<form action="../controller/editarAnimal.php" method="POST" enctype="multipart/form-data">
    <h1>Editar Animal</h1>
    <input type="hidden" name="idAnimal" value="<?= $animal['idAnimal'] ?>">

    <div class="form-row">
        <label for="nomeAnimal">Nome:</label>
        <input type="text" id="nomeAnimal" name="nomeAnimal" value="<?= htmlspecialchars($animal['nomeAnimal'] ?? '') ?>" required>
    </div>

    <div class="form-row grid-2">
        <div>
            <label for="especie">Espécie:</label>
            <select id="especie" name="especie" required>
                <option value="Felina" <?= ($animal['especieAnimal'] ?? '') == 'Felina' ? 'selected' : '' ?>>Felina</option>
                <option value="Canina" <?= ($animal['especieAnimal'] ?? '') == 'Canina' ? 'selected' : '' ?>>Canina</option>
            </select>
        </div>
        <div>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca" value="<?= htmlspecialchars($animal['racaAnimal'] ?? '') ?>" required>
        </div>
    </div>

    <div class="form-row">
        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor" value="<?= htmlspecialchars($animal['corAnimal'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label for="nascimento">Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" value="<?= $animal['dtNasc'] ?? '' ?>">
    </div>

    <div class="form-row">
        <label>Sexo:</label>
        <div class="radio-group">
            <label><input type="radio" name="sexo" value="Fêmea" <?= ($animal['sexoAnimal'] ?? '') == 'Fêmea' ? 'checked' : '' ?>> Fêmea</label>
            <label><input type="radio" name="sexo" value="Macho" <?= ($animal['sexoAnimal'] ?? '') == 'Macho' ? 'checked' : '' ?>> Macho</label>
        </div>
    </div>

    <div class="form-row">
        <label for="resgate">Data de Resgate:</label>
        <input type="date" id="resgate" name="resgate" value="<?= $animal['dtResgate'] ?? '' ?>">
    </div>

    <div class="form-row">
        <label>Situação:</label>
        <div class="radio-group">
            <?php $sit = $animal['situacao'] ?? ''; ?>
            <label><input type="radio" name="situacao" value="Vivendo na ONG" <?= $sit == 'Vivendo na ONG' ? 'checked' : '' ?>> Vivendo na ONG</label>
            <label><input type="radio" name="situacao" value="Transferido" <?= $sit == 'Transferido' ? 'checked' : '' ?>> Transferido</label>
            <label><input type="radio" name="situacao" value="Adotado" <?= $sit == 'Adotado' ? 'checked' : '' ?>> Adotado</label>
            <label><input type="radio" name="situacao" value="Falecido" <?= $sit == 'Falecido' ? 'checked' : '' ?>> Falecido</label>
        </div>
    </div>

    <div class="form-row">
        <label>Castrado:</label>
        <div class="radio-group">
            <label><input type="radio" name="castrado" value="1" <?= isset($animal['castrado']) && $animal['castrado'] ? 'checked' : '' ?>> Sim</label>
            <label><input type="radio" name="castrado" value="0" <?= !isset($animal['castrado']) || !$animal['castrado'] ? 'checked' : '' ?>> Não</label>
        </div>
    </div>

    <div class="form-row">
        <label for="bairro">Bairro do resgate:</label>
        <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($animal['enderecoResgate'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label for="resgatou">Quem resgatou:</label>
        <input type="text" id="resgatou" name="resgatou" value="<?= htmlspecialchars($animal['pessoalResgate'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label for="remedios">Remédios:</label>
        <textarea id="remedios" name="remedios"><?= htmlspecialchars($animal['remedioDesc'] ?? '') ?></textarea>
    </div>

    <div class="form-row">
        <label>Disponível para adoção?</label>
        <div class="radio-group">
            <label><input type="radio" name="adocaoDisponivel" value="1" <?= $disponivelAdoc ? 'checked' : '' ?>> Sim</label>
            <label><input type="radio" name="adocaoDisponivel" value="0" <?= !$disponivelAdoc ? 'checked' : '' ?>> Não</label>
        </div>
    </div>

    <div class="form-row">
        <label for="imagemAnimal">Imagem:</label>
        <input type="file" id="imagemAnimal" name="imagemAnimal" accept="image/*">
        
        <?php if (!empty($animal['urlImagem'])): ?>
            <?php 
                // CORREÇÃO: Monta o caminho da imagem corretamente
                $caminhoImagem = "../uploads/" . htmlspecialchars($animal['urlImagem']); 
            ?>
            <br>
            <img src="<?= $caminhoImagem ?>" alt="Imagem atual do animal" width="150" style="margin-top: 10px; border-radius: 5px;">
            <p style="font-size: 0.85rem; color: #555; margin-top: 5px;">Selecione um novo arquivo para substituir.</p>
        <?php else: ?>
            <p style="font-size: 0.85rem; color: #555; margin-top: 5px;">Nenhuma imagem cadastrada. Selecione um arquivo.</p>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?= htmlspecialchars($animal['animalDesc'] ?? '') ?></textarea>
    </div>

    <div class="actions">
        <button type="submit">Salvar alterações</button>
    </div>
</form>
</div>

</body>
</html>