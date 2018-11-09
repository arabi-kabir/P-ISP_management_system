<?php

    include "../backend/dbConnection.php";

    $now = new \DateTime('now');
    $month = $now->format('m');
    $year = $now->format('Y');

    $sql = "SELECT * FROM customer_package_info_table";
    $result = mysqli_query($link, $sql);                  
            
    if (mysqli_num_rows($result) > 0) {

        while( $row = mysqli_fetch_assoc($result) ) {

            if($row['customer_status'] == 'active')
            {
                $id = $row['customer_id'];

                $sql = "insert into customer_payments (`customer_id`, `payment_status`, `pay_year`, `pay_month`) values (".$row['customer_id'].", 'Due', ".$year.", '".$month."')";
                
                mysqli_query($link, $sql); 
                              
            }                        
        }
        $sql1 = "insert into set_due_all_table (`click`, `year`, `month`) values ('done', ".$year.", ".$month.")";
                
        mysqli_query($link, $sql1);

        header('Location: ../page/customer_payments.php');
    }

?>