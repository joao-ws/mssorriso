<?php
session_start();
include('protect.php');
include('conexao.php');

$codigo_login = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Clínica Mais Sorriso</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<header>
		<div id="conteudo_principal">
			<nav class="menus">
				<a href="index.php"><img src="img/sorriso.png"></a>
				<ul class="lista-de-itens">
				<li><a href="#pn">Página Inicial</a></li>
				<li><a href="agendamento/agendamento.php">Agendar Consulta</a></li>
				<li><a href="agendamento/meusagendamentos.php">Meus Agendamentos</a></li>
			</nav>
			<nav>
				<div class="right-items">
					<ul class="itens-da-direita">
					<?php echo "<a class='right-items'>" . $_SESSION['email']. "</a>" ?>
					<li><a href="Logout.php">Logout</a></li>
				</div>
			</nav>
		</div>
 </header>
 		<div id="input-e-botaos">
 			<div id="botaos">
 				<input type="text" required="required" name="name" autocomplete="on" id="input_text">
 				<span class="pesquise">Pesquise pelos procedimentos</span>
 				<button class="botão">Buscar</button>
 	</div>
 </div>
 <form>
 	<div id="rodapé">
 		<footer>
 			<nav class="menus-do-rodapé">
 				<ul class="lista-de-itens-do-rodapé">
 					<li><a href="#">Ajuda</a></li>
 					<li><a href="#">Quem Somos</a></li>
 					<li><a href="#">Contato</a></li>
 				</nav>
 		</footer>
 	</div>
 </form>

</body>
</html>