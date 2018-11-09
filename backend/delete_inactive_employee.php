<?php

    session_start();

    include "../backend/dbConnection.php";

    $data_change_id = $_GET['id'];

    $sql = "SELECT * FROM employee_table WHERE employee_id='$data_change_id' ";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    if( $row['emp_status'] == 'active' )
    {
        $result = mysqli_query($link,"update employee_table set emp_status='inactive' WHERE employee_id='".$data_change_id."'");
    }
    else
    {
        mysqli_query($link,"update employee_table set emp_status='active' WHERE employee_id='".$data_change_id."'");
    }


    header('Location: ../page/update_delete_employee.php');
?>