<?php
include '../model/interessadosBD.php';

if (isset($_GET['idCandidato'])) {
    $id = intval($_GET['idCandidato']);

    if(deletarInteressado($id)) {
        echo "<script>
                alert('Candidato deletado com sucesso!');
                window.location='../view/verInteressados.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao deletar candidato!');
                window.location='../view/verInteressados.php';
              </script>";
    }
}
?>