<?php
    session_start();

    include_once('../conexao.php');

    if(isset($_POST['submit'])) {

        if (isset($_SESSION['id'])) {
            $codigo_login = $_SESSION['id'];
    
            $procedimento = $_POST['procedimento'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $observacao = $_POST['observacao'];

            if ($procedimento == 'none' || empty($data) || $hora == 'none') {
                echo "<script>alert('Erro: Preencha todos os campos obrigatórios (procedimento, data, hora).'); window.history.back();</script>";
            exit;
            
            } else {

            $insert_query = "INSERT INTO agendamento(id_paciente, procedimento, data, hora, observacao) 
                            SELECT id_paciente, '$procedimento', '$data', '$hora', '$observacao'
                            FROM paciente
                            WHERE codigo_login = '$codigo_login'";
    
            $insert_result = mysqli_query($mysqli, $insert_query);
    
            if ($insert_result) {
                echo "<script>alert('Agendamento realizado com sucesso!'); window.location = '../index.php';</script>";
                exit;
            } else {
                echo "<script>alert('Erro ao agendar: " . mysqli_error($mysqli) . "'); window.history.back();</script>";
                exit;
            }
        } 
        } else {
            echo "<script>alert('Erro: código_login não encontrado na sessão. O usuário não está logado corretamente.'); window.history.back();</script>";
        exit;
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
    <script>
    function validarFormulario() {
        var procedimento = document.getElementById("procedimento").value;
        var data = document.getElementById("data").value;
        var hora = document.getElementById("hora").value;

        if (procedimento === "none" || data === "" || hora === "") {
            alert("Preencha todos os campos obrigatórios.");
            return false;
        }
        return true;
    }
</script>
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
                <form class="formulario" method="post" action="agendamento.php" onsubmit="return validarFormulario()">
            <div class="dados-de-agendamento">
                <label class="usuario">Tipo de procedimento:</label>
                <select class="opções-de-procedimentos" name="procedimento">
                    <option value="Canal">Canal</option>
                    <option value="Restauração">Restauração</option>
                    <option value="Facetas">Facetas</option>
                    <option value="Prótese">Prótese</option>
                    <option value="Raspagem">Raspagem</option>
                    <option value="Extração">Extração</option>
                    <option value="Limpeza">Limpeza</option>
                    <option value="Avaliação">Avaliação</option>
                    <option value="Manutenção">Manutenção</option>
                    <option value="none" selected>---nenhum---</option>
                </select>
                </div>
                <div class="data">
                    <label class="se-data" required="required">Selecione a Data:</label>
                    <input class="inpdata" type="date" name="data">
                </div>
                <div class="hora">
                    <label class="usuario">Horário:</label>
                    <select name="hora">
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="none" selected>Hora</option>
                </div>
                </select> 
        <div class="text-area-buttons">
            <textarea placeholder="Observação..." name="observacao"></textarea>
            </div>
            <div class="botão">
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>
</body>