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
if(!empty($_GET['search'])) {

	$data = $_GET['search'];
	$sql = "SELECT paciente.*, login.email
	FROM paciente
	JOIN login ON paciente.id_paciente = login.codigo_login
	WHERE id_paciente LIKE '%$data%' or nome_paciente LIKE '%$data%' or email LIKE '%$data%' or cpf LIKE '%$data%' or telefone LIKE '%$data%' ORDER BY id_paciente DESC";

} else {

	$sql = "SELECT paciente.*, login.email
	FROM paciente
	JOIN login ON paciente.id_paciente = login.codigo_login
	ORDER BY paciente.id_paciente DESC;";
}

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
	<script>
		function confirmDelete(id) {
    		if (confirm("Tem certeza de que deseja excluir este perfil?")) {
        		window.location.href = 'deletecd.php?id=' + id;
    }
}
</script>
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
<div class="box-search">
	<input type="search" class="form-control w-25" placeholder="Pesquisar..." id="pesquisar">
	<button onclick="searchData()" class="btn btn-primary">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
 			 <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
		</svg>
	</button>
</div>
<div class="mx-5">
	<table class="table text-white table-bg">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">Email</th>
				<th scope="col">CPF</th>
				<th scope="col">Telefone</th>
				<th scope="col">...</th>
			</tr>
		</thead>
		<tbody class="tbod">
			<?php
				while($user_data = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>" .$user_data['id_paciente']."</td>";
					echo "<td>" .substr($user_data['nome_paciente'], 0, 10);
					if (strlen($user_data['nome_paciente']) > 10) {
						echo "...";
					}
					"</td>";	
					echo "<td>" .$user_data['email']."</td>";
					echo "<td>" .$user_data['cpf']."</td>";
					echo "<td>" .$user_data['telefone']."</td>";
					echo "<td>
						<a class='btn btn-sm btn-primary' href='editcd.php?id=$user_data[id_paciente]'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
  								<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  									<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
							</svg>
						</a>
						<a class='btn btn-sm btn-danger' href='javascript:void(0);' onclick='confirmDelete($user_data[id_paciente])'>
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
 <script>
	var search = document.getElementById('pesquisar');

	search.addEventListener("keydown",  function(event) {
		if (event.key == "Enter") {
			searchData();
		}
	});
		function searchData() {
			window.location = 'cadastros.php?search='+search.value;
		}
	</script>
</html>