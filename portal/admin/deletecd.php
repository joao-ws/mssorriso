<?php

    if(!empty($_GET['id']))
    {
        include_once('../conexao.php');

        $id = $_GET['id'];

        $sqlDeletePaciente = "DELETE FROM paciente WHERE id_paciente = $id";

        if ($mysqli->query($sqlDeletePaciente) === TRUE) {

            $sqlDeleteLogin = "DELETE FROM login WHERE codigo_login = $id";
    
            if ($mysqli->query($sqlDeleteLogin) === TRUE) {
                header('Location: admin.php');
            } else {
                echo "Erro ao excluir o registro na tabela login: " . $mysqli->error;
            }
        } else {
            echo "Erro ao excluir o registro na tabela paciente: " . $mysqli->error;
        }
    }
    
    header('Location: cadastros.php')

?>