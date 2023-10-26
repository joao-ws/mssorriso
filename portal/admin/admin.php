<?php session_start();
include('../conexao.php');

	if ($_SESSION['tipo_login'] <> 0) {

		echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";					
		session_destroy();
	 
		unset ($_SESSION['nome_login']);
		unset ($_SESSION['tipo_login']);

		echo "<script> window.location.href='../login.php';</script>";				

	} 

$codigo_login = $_SESSION['id'];

$sql = "SELECT agendamento.id_agendamento, agendamento.data, agendamento.hora, agendamento.procedimento, agendamento.observacao, paciente.nome_paciente
FROM agendamento JOIN paciente ON agendamento.id_paciente = paciente.id_paciente
ORDER BY agendamento.id_agendamento DESC";

$result = $mysqli->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Clínica Mais Sorriso</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<header>
		<div id="conteudo_principal">
			<nav class="menus">
				<img src="../img/sorriso.png">
				<ul class="lista-de-itens">
				<li><a href="admin.php">Consultas</a></li>
				<li><a href="cadastros.php">Cadastros</a></li>
			</nav>
			<nav>
				<div class="right-items">
					<ul class="itens-da-direita">
					<?php echo "<a class='right-items'>" . $_SESSION['email']. "</a>" ?>
					<li><a href="../Logout.php">Logout</a></li>
				</div>
			</nav>
		</div>
 </header>
</body>
<div class="m-5">
	<table class="table text-white table-bg">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Data</th>
				<th scope="col">Hora</th>
				<th scope="col">Procedimento</th>
				<th scope="col">Observação</th>
				<th scope="col">...</th>
			</tr>
		</thead>
		<tbody class="tbod">
			<?php
				while($user_data = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>" .$user_data['id_agendamento']."</td>";
					echo "<td>" .$user_data['nome_paciente']."</td>";
					echo "<td>" .$user_data['data']."</td>";
					echo "<td>" .$user_data['hora']."</td>";
					echo "<td>" .$user_data['procedimento']."</td>";
					echo "<td>" .$user_data['observacao']."</td>";
					echo "<td>
						<a class='btn btn-sm btn-primary' href='editag.php?id=$user_data[id_agendamento]'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
  								<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  									<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
							</svg>
						</a>
						<a class='btn btn-sm btn-danger' href='deleteag.php?id=$user_data[id_agendamento]'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  								<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
							</svg>
						</a>					
					</td>"; 
					echo "</tr>";
				}
				?>
		</tbody>
	</table>

	
 </div>
</html>