<?php
session_start();
include('conexao.php');
 
if(isset($_POST ['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu login";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha_login = '$senha' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do CÓDIGO SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            

            $_SESSION['id'] = $usuario['codigo_login'];
            $_SESSION['email'] = $usuario ['email'];
            $_SESSION['tipo_login'] = $usuario ['tipo_login'];

            if($_SESSION['tipo_login'] == 0){

                echo "<script> alert('Administrador logado!');</script>";

                echo "<script> window.location.href='admin/admin.php';</script>";

                } else{
                echo "<script> alert('Usuário logado!');</script>";

                echo "<script> window.location.href='index.php';</script>";
                }
               
            } else{
            echo "<script> alert ('Falha ao logar! E-mail ou senha incorretos'); </script>";
        }
     }
 }


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Mais sorriso - Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="conteudo-principal">
        <form class="formulario" action="" method="POST">
            <div class="titulo">
                <h1>Entrar</h1>
                </div>
                <div class="input-box">
                <input type="text" placeholder="Email" class="input-login-usuario" required="required" name="email">
                </div>
                <div class="input-box">
                <input type="password" placeholder="Senha" class="input-login-senha" required="required" name="senha" >
            </div>
            <div class="esqueceu-a-senha">
                <label><input type="checkbox"> Me Lembrar</label>
                <a href="#">Esqueceu a senha?</a>
            </div>
            <div class="botao">
                <button type="submit">Login</button>
            </div>
            <div class="registre-se">
                <label>Não possui uma conta?</label> <a href="formulario.php">Cadastre-se</a>
            </div>
        </form>
    </div>
</body>
</html>