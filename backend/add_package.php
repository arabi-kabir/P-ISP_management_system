<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include "dbConnection.php";

    if(isset($_POST['submitBtn']))
    {
        $package_name = $_POST['package_name'];
        $package_price = $_POST['package_price'];
        $package_speed = $_POST['package_speed'];

        $query = "insert into `package_information` (`package_name`,`package_price`,`package_speed`) values ('$package_name', '$package_price', '$package_speed')";

        if(mysqli_query($link, $query) == false)
        {
            $error = "There is a error inserting package";
            echo '<script type="text/javascript">alert("' . $error . '")</script>'; 
        }

    }
}

?>