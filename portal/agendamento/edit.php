<?php
if(!empty($_GET['id'])) {

    include_once('../conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM agendamento WHERE id_agendamento=$id";

        $result = $mysqli->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){

            $procedimento = $user_data['procedimento'];
            $data = $user_data['data'];
            $hora = $user_data['hora'];
            $observacao = $user_data['observacao'];
      
            }
        } else {
            header('Location: ../index.php');
        } 
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wiidth, initial-scale=1.0">
	<title>Clínica Mais Sorriso</title>
	<link rel="stylesheet" type="text/css" href="../css/agendamento.css">
</head>

<body>
<header>
        <nav class="nav-bar">
            <a href="../index.php"><img src="../img/sorriso.png"></a>
            <ul class="lista-de-itens">
                <li><a href="../index.php">Página Incial</a></li>
                <li><a href="meusagendamentos.php">Meus Agendamentos</a></li>
        </nav>
</header>
    <div id="conteudo-principal">
        <div class="container">
            <div class="titulo">
                <h2>Agendamento</h2>
                </div>
        <form class="formulario" method="post" action="saveedit.php">
            <div class="dados-de-agendamento">
                <label class="usuario">Tipo de procedimento:</label>
                <select class="opções-de-procedimentos" id="procedimento" name="procedimento">
                    <option value="Canal"<?php if ($procedimento == 'Canal') echo 'selected'; ?>>Canal</option>
                    <option value="Restauração"<?php if ($procedimento == 'Restauração') echo 'selected'; ?>>Restauração</option>
                    <option value="Facetas"<?php if ($procedimento == 'Facetas') echo 'selected'; ?>>Facetas</option>
                    <option value="Prótese"<?php if ($procedimento == 'Prótese') echo 'selected'; ?>>Prótese</option>
                    <option value="Raspagem"<?php if ($procedimento == 'Raspagem') echo 'selected'; ?>>Raspagem</option>
                    <option value="Extração"<?php if ($procedimento == 'Extração') echo 'selected'; ?>>Extração</option>
                    <option value="Limpeza"<?php if ($procedimento == 'Limpeza') echo 'selected'; ?>>Limpeza</option>
                    <option value="Avaliação"<?php if ($procedimento == 'Avaliação') echo 'selected'; ?>>Avaliação</option>
                    <option value="Manutenção"<?php if ($procedimento == 'Manutenção') echo 'selected'; ?>>Manutenção</option>
                </select>
                </div>
                <div class="data">
                    <label class="se-data" required="required">Selecione a Data:</label>
                    <input class="inpdata" type="date" id="data" name="data" value= "<?php echo $data?>">
                </div>
                <div class="hora">
                    <label class="usuario">Horário:</label>
                    <select id="hora" name="hora">
                        <option value="08:00"<?php if ($hora == '08:00:00') echo 'selected'; ?>>08:00</option>
                        <option value="09:00"<?php if ($hora == '09:00:00') echo 'selected'; ?>>09:00</option>
                        <option value="10:00"<?php if ($hora == '10:00:00') echo 'selected'; ?>>10:00</option>
                        <option value="11:00"<?php if ($hora == '11:00:00') echo 'selected'; ?>>11:00</option>
                        <option value="14:00"<?php if ($hora == '14:00:00') echo 'selected'; ?>>14:00</option>
                        <option value="15:00"<?php if ($hora == '15:00:00') echo 'selected'; ?>>15:00</option>
                        <option value="16:00"<?php if ($hora == '16:00:00') echo 'selected'; ?>>16:00</option>
                        <option value="17:00"<?php if ($hora == '17:00:00') echo 'selected'; ?>>17:00</option>
                </div>
                </select> 
        <div class="text-area-buttons">
            <textarea placeholder="Observação..." id="observacao" name="observacao"><?php echo $observacao; ?></textarea>
            </div>
            <div class="botão">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="updateagenda" id="updateagenda">
            </div>
        </form>
    </div>
</body>