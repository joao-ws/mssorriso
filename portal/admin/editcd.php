<?php
if(!empty($_GET['id'])) {

    include_once('../conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT paciente.*, login.email
		FROM paciente
		JOIN login ON paciente.id_paciente = login.codigo_login
		WHERE paciente.id_paciente = $id";

        $result = $mysqli->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){

            $nome_paciente = $user_data['nome_paciente'];
            $cpf = $user_data['cpf'];
            $telefone = $user_data['telefone'];
            $email = $user_data['email'];
		} 
		} else {
            header('Location: admin.php');
        } 
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script>
        function confirmUpdate() {
            if (confirm("Tem certeza de que deseja atualizar este cadastro?")) {
            return true;
        // Usuário confirmou, então direcione para saveeditag.php
                window.location.href = "saveeditcd.php?id=<?php echo $id; ?>";
    } else {
        return false;
        // Usuário cancelou, não faça nada
    }
}
</script>
</head>
<body>
	<header>
			<nav class="menus">
				<a href=""><img src="../img/sorriso.png"></a>
				<ul class="lista-de-itens">
				<li><a href="admin.php">Consultas</a></li>
				<li><a href="cadastros.php">Cadastros</a></li>
			</nav>
	</header>
	<div id="conteudo-principal">
				<form method="POST" action="saveeditcd.php" class="form">
					<div class="container">
			<div class="titulo">
				<h1>Cadastre-se</h1>
			</div>
					<div class="dados-cadastrais">
						<input id="pn" required="required" type="text" name="nome" value= "<?php echo $nome_paciente?>">
						<label for="pn" class="nome">Nome e Sobrenome</label>
					</div>
					<div class="dados-cadastrais">
						<input id="cpf" required="required" type="text" name="cpf" value= "<?php echo $cpf?>">
						<label for="cpf" class="cadastro-de-pessoa-fisica">CPF</label>
					</div>
					<div class="dados-cadastrais">
						<input id="tel" required="required" type="text" name="telefone" value= "<?php echo $telefone?>">
						<label for="tel" class="telefone">Celular</label>
					</div>
					<div class="dados-cadastrais">
						<input id="email" required="required" type="text" name="email" value= "<?php echo $email?>">
						<label for="email" class="email">Email</label>
					</div>
						<div class="botao">
							<input type="hidden" name="id" value="<?php echo $id?>">
							<input type="submit" name="updatecadastro" id="updatecadastro" onclick="return confirmUpdate();">
				</form>
		</div>
	</div>
</body>
</html>