<?php
    include_once('../conexao.php');

    if (isset($_POST['updatecadastro'])) {
        $id = $_POST['id'];
        $nome_paciente = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        
      
        $confirmaSenha = $_POST['confirmpassword'];
        if ($senha !== $confirmaSenha) {
            echo "<script>alert('A senha e a confirmação de senha não coincidem. Tente novamente.');</script>";
            echo '<script> window.history.back(); </script>';
        } else {
           
            $sqlUpdatePaciente = "UPDATE paciente SET nome_paciente='$nome_paciente', cpf='$cpf', telefone='$telefone' WHERE id_paciente=$id";
            $sqlUpdateLogin = "UPDATE login SET email='$email', senha_login='$senha' WHERE codigo_login=$id";
            
           
            $resultPaciente = $mysqli->query($sqlUpdatePaciente);
            $resultLogin = $mysqli->query($sqlUpdateLogin);
            
            if ($resultPaciente && $resultLogin) {
                echo "<script>alert('Dados atualizados com sucesso.');</script>";
           
                header('Location: cadastros.php');
            } else {
                echo "<script>alert('Erro na atualização dos dados.');</script>";
                echo '<script> window.history.back(); </script>';
            }
        }
    }
?>