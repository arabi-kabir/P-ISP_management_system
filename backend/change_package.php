<?php

    session_start();

    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }

    // Update Query
    include "dbConnection.php";
    
    $result = mysqli_query($link,"update package_information set package_name='".$_POST['package_name']."',package_price='".$_POST['package_price']."',package_speed='".$_POST['package_speed']."' WHERE package_id='".$_POST['package_id']."'");


    header('Location: ../page/package_information.php');

?>