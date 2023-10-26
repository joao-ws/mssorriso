<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
</head>
<body>
	<header>
			<nav class="menus">
				<a href="index.php"><img src="img/sorriso.png"></a>
				<ul class="lista-de-itens">
				<li><a href="index.php">Página Inicial</a></li>
				<li><a href="formulario.php">Cadastro</a></li>
				<li><a href="agendamento.php">Agendamento</a></li>
			</nav>
	</header>
	<div id="conteudo-principal">
				<form method="POST" action="cadastro.php" class="form">
					<div class="container">
			<div class="titulo">
				<h1>Cadastre-se</h1>
			</div>
					<div class="dados-cadastrais">
						<input id="pn" required="required" type="text" name="pn">
						<label for="pn" class="nome">Nome e Sobrenome</label>
					</div>
					<div class="dados-cadastrais">
						<input id="cpf" required="required" type="text" name="sn">
						<label for="cpf" class="cadastro-de-pessoa-fisica">CPF</label>
					</div>
					<div class="dados-cadastrais">
						<input id="tel" required="required" type="text" name="tel">
						<label for="tel" class="telefone">Celular</label>
					</div>
					<div class="dados-cadastrais">
						<input id="email" required="required" type="text" name="email">
						<label for="email" class="email">Email</label>
					</div>
					<div class="dados-cadastrais">
						<input id="password" required="required" type="password" name="password">
						<label for="password" class="senha">Senha</label>
					</div>
					<div class="dados-cadastrais">
						<input id="confirmpassword" required="required" type="password" name="confirmpassword">
						<label for="confirmpassword" class="csenha">Confirme sua Senha</label><br>
						<div class="botao">
							<button class="button">Finalizar Cadastro</button>
						</div>
				</form>
		</div>
	</div>
</body>
</html>
