<?php

    if(!empty($_GET['id']))
    {
        include_once('../conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM agendamento WHERE id_agendamento=$id";

        $result = $mysqli->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM agendamento WHERE id_agendamento=$id";
            $resultDelete = $mysqli->query($sqlDelete);
        }
    }
    header('Location: admin.php')

?>