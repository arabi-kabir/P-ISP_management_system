<?php
    $link = mysqli_connect("Localhost", "root", "", "isp");

    if(mysqli_connect_error() == true)
    {
        die("Database connection error.");
    }
?>