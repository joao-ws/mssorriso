<?php

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["pn"];
    $cpf = $_POST["sn"];
    $celular = $_POST["tel"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $confirm_senha = $_POST["confirmpassword"];
   
    if ($senha !== $confirm_senha) {
        echo "<script> alert('A senha e a confirmação de senha não coincidem.'); </script>";
        echo '<script> window.history.back(); </script>';
    } else {
     
$tipo_login = 1;
$queryLogin = "INSERT INTO login (email, senha_login, tipo_login) VALUES ('$email', '$senha', '$tipo_login')";
$mysqli->query($queryLogin);

$codigo_login = $mysqli->insert_id;


$queryPaciente = "INSERT INTO paciente (nome_paciente, cpf, telefone, codigo_login) VALUES ('$nome', '$cpf', '$celular', '$codigo_login')";

if ($mysqli->query($queryPaciente) == TRUE) {
    echo "<script>alert('Cadastro realizado com sucesso!'); window.location = 'login.php';</script>";
    exit;
} else {
    echo "<script> alert ('Falha ao cadastrar!'); </script>";
    echo '<script> window.history.back(); </script>';
}

$mysqli->close();
}
}

?>  