<?php
    session_start();

    include "../backend/dbConnection.php";

    $_SESSION['data_change_id'] = $_GET['id'];

    $sql = "DELETE FROM package_information WHERE package_id='".$_SESSION['data_change_id']."'";
    mysqli_query($link, $sql);

    header('Location: ../page/package_information.php');
?>