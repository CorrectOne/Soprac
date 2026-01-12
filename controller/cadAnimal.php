<?php
session_start();

// inclusão da conexão
include_once '../model/animalBD.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}

// excluir animal
if (isset($_GET['idAnimal']) && isset($_GET['tipo'])) {
    $idAnimal = intval($_GET['idAnimal']);
    $tipo = $_GET['tipo'];
    // cão
    if ($tipo === 'cao') {
        if (deletarCao($idAnimal)) {
            echo "<script>
                    alert('Cão excluído com sucesso!');
                    window.location.href='../view/verCaes.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Erro ao excluir o cão!');
                    window.location.href='../view/verCaes.php';
                  </script>";
            exit;
        }
    }
    // gato
    if ($tipo === 'gato') {
        if (deletarGato($idAnimal)) {
            echo "<script>
                    alert('Gato excluído com sucesso!');
                    window.location.href='../view/verGATOS.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Erro ao excluir o gato!');
                    window.location.href='../view/verGATOS.php';
                  </script>";
            exit;
        }
    }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nmAnimal        = $_POST['nomeAnimal'];
//     $animalEspecie   = $_POST['especie'];
//     $animalRaca      = $_POST['raca'];
//     $animalCor       = $_POST['cor'];
//     $nascAnimal      = $_POST['nascimento'];
//     $animalSexo      = $_POST['sexo'];
//     $dtAnimalResgate = $_POST['resgate'];
//     $situacaoAnimal  = $_POST['situacao'];
//     $animalCastrado  = $_POST['castrado'];
//     $endResgate      = $_POST['bairro'];
//     $resgatePessoas  = $_POST['resgatou'];
//     $descRemedio     = $_POST['remedios'];
//     $animalDesc      = $_POST['descricao'];
//     $dispAdocao      = $_POST['adocaoDisponivel'];
//     $idUser          = $_SESSION['idUser'];

//     // --- Data de saída (adoção / óbito / transferência) ---
//     $dataSaida = null;
//     if (!empty($_POST['adocao'])) {
//         $dataSaida = $_POST['adocao'];
//     } elseif (!empty($_POST['obito'])) {
//         $dataSaida = $_POST['obito'];
//     } elseif (!empty($_POST['transferencia'])) {
//         $dataSaida = $_POST['transferencia'];
//     }

//     // upload da imagem
//     $imagemNome = null;
//     if (isset($_FILES['imagemAnimal']) && $_FILES['imagemAnimal']['error'] == UPLOAD_ERR_OK) {
//         $uploadDir = '../uploads/';
//         if (!is_dir($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }
//         $ext = pathinfo($_FILES['imagemAnimal']['name'], PATHINFO_EXTENSION);
//         $imagemNome = uniqid('animal_') . '.' . $ext;
//         $targetFile = $uploadDir . $imagemNome;

//         if (!move_uploaded_file($_FILES['imagemAnimal']['tmp_name'], $targetFile)) {
//             $imagemNome = null; // falha no upload
//         }
//     }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nmAnimal        = $_POST['nomeAnimal'];
    $animalEspecie   = $_POST['especie'];
    $animalRaca      = $_POST['raca'];
    $animalCor       = $_POST['cor'];
    $nascAnimal      = $_POST['nascimento'];
    $animalSexo      = $_POST['sexo'];
    $dtAnimalResgate = $_POST['resgate'];
    $situacaoAnimal  = $_POST['situacao'];
    $animalCastrado  = $_POST['castrado'];
    $endResgate      = $_POST['bairro'];
    $resgatePessoas  = $_POST['resgatou'];
    $descRemedio     = $_POST['remedios'];
    $animalDesc      = $_POST['descricao'];
    $dispAdocao      = $_POST['adocaoDisponivel'];
    $idUser          = $_SESSION['idUser'];

    // --- Data de saída (adoção / óbito / transferência) ---
    $dataSaida = null;
    if (!empty($_POST['adocao'])) {
        $dataSaida = $_POST['adocao'];
    } elseif (!empty($_POST['obito'])) {
        $dataSaida = $_POST['obito'];
    } elseif (!empty($_POST['transferencia'])) {
        $dataSaida = $_POST['transferencia'];
    }

    // --- Upload da imagem ---
    $imagemNome = null;
    if (isset($_FILES['imagemAnimal']) && $_FILES['imagemAnimal']['error'] === UPLOAD_ERR_OK) {

        // Caminho da pasta
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Pega extensão minúscula
        $ext = strtolower(pathinfo($_FILES['imagemAnimal']['name'], PATHINFO_EXTENSION));

        // Gera nome único
        $imagemNome = uniqid('animal_') . '.' . $ext;
        $targetFile = $uploadDir . $imagemNome;

        // Confirma se é imagem (opcional, mas seguro)
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array($ext, $tiposPermitidos)) {
            if (!move_uploaded_file($_FILES['imagemAnimal']['tmp_name'], $targetFile)) {
                $imagemNome = null; // falha no upload
            }
        } else {
            $imagemNome = null; // tipo inválido
        }
    }
}

    // função para cadastrar animal
    if(cadastrarAnimal($nmAnimal, $animalEspecie, $animalRaca, $animalCor, $nascAnimal, $animalSexo, $dtAnimalResgate, $situacaoAnimal, 
        $animalCastrado, $endResgate, $resgatePessoas, $descRemedio, $animalDesc, $dispAdocao, $idUser, $imagemNome, $dataSaida)){
        echo "<script type='text/javascript'>
                alert('Cadastro de Animal realizado com sucesso!'); 
                window.location='../view/cadastrarAnimal.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Erro ao cadastrar Animal!'); 
                window.location='../view/cadastrarAnimal.php';
              </script>";
    }

?>


