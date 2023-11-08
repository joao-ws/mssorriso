<?php
    include_once('../conexao.php');

    if(isset($_POST['updateagenda'])){

        $id = $_POST ['id'];
        $procedimento = $_POST['procedimento'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $observacao = $_POST['observacao'];

        $sqlUpdate = "UPDATE agendamento 
        SET procedimento='$procedimento', data='$data', hora='$hora', observacao='$observacao'
        WHERE id_agendamento='$id'";

        $result = $mysqli->query($sqlUpdate);
    }
        header('Location: meusagendamentos.php');

?>