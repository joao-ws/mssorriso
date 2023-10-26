<?php
session_start();

if (isset($_SESSION['id'])) {
    session_destroy();
    echo "<script>alert('Você fez logout com sucesso.'); window.location = 'login.php';</script>";
    exit;
}

?>