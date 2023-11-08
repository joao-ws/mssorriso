<?php
if (!empty($_GET['id'])) {
    include_once('../conexao.php');
    $id = $_GET['id'];
 
    $sqlDeleteAgendamentos = "DELETE FROM agendamento WHERE id_paciente = $id";
    
    if ($mysqli->query($sqlDeleteAgendamentos) === TRUE) {
        
        $sqlDeletePaciente = "DELETE FROM paciente WHERE id_paciente = $id";

        if ($mysqli->query($sqlDeletePaciente) === TRUE) {
            $sqlDeleteLogin = "DELETE FROM login WHERE codigo_login = $id";

            if ($mysqli->query($sqlDeleteLogin) === TRUE) {
                header('Location: cadastros.php');
            } else {
                echo "Erro ao excluir o registro na tabela login: " . $mysqli->error;
            }
        } else {
            echo "Erro ao excluir o registro na tabela paciente: " . $mysqli->error;
        }
    } else {
        echo "Erro ao excluir os agendamentos relacionados ao paciente: " . $mysqli->error;
    }
}

header('Location: admin.php');
?>