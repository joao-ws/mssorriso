<?php
if (!empty($_GET['id'])) {
    include_once('../conexao.php');
    $id = $_GET['id'];

    // Excluir os agendamentos do paciente
    $sqlDeleteAgendamentos = "DELETE FROM agendamento WHERE id_paciente = $id";

    if ($mysqli->query($sqlDeleteAgendamentos) === TRUE) {
        
        // Excluir o paciente
        $sqlDeletePaciente = "DELETE FROM paciente WHERE id_paciente = $id";

        if ($mysqli->query($sqlDeletePaciente) === TRUE) {
            // Excluir o login
            $sqlDeleteLogin = "DELETE FROM login WHERE codigo_login = $id";

            if ($mysqli->query($sqlDeleteLogin) === TRUE) {
                // Define uma variável de sessão indicando que os dados foram removidos
                session_start();
                $_SESSION['dados_removidos'] = true;

                echo "<script>alert('Cadastro excluido com sucesso!'); window.location = '../login.php';</script>";
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


?>