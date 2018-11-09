<?php

    $exp_name =  "";
    $exp_type =  "";
    $exp_year =  "";  
    $exp_month = "";  
    $exp_disc =  "";  
    $exp_date = "";
    $past_data = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        date_default_timezone_set('Asia/Dhaka');

        if(isset($_POST['submitBtn']))
        {
            include "dbConnection.php";
          
            $exp_name =    test_input($_POST['exp_name']);
            $exp_type =    test_input($_POST['exp_type']);
            $exp_year =    test_input($_POST['exp_year']);
            $exp_month =   test_input($_POST['exp_month']);
            $exp_disc =    test_input($_POST['exp_disc']);
            $exp_amount =    test_input($_POST['exp_amount']);
            $exp_paid =    test_input($_POST['exp_paid']);
            if(empty($_POST['past_data']))
            {
                $past_data = "";
            }
            else
            {
                $past_data = $_POST['past_data'];
            }
            


            if($exp_name == "")
            {
                $error = "Expanse Name Can't be Empty.";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                if ($past_data == 'ischeked')
                {
                    if($exp_year == "noValue" OR $exp_month == "noValue")
                    {
                        $error = "Select Year and Month Correctly. Idiot !";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }
                    else
                    {
                        $exp_year =    test_input($_POST['exp_year']);
                        $exp_month =   test_input($_POST['exp_month']);
                        $exp_date = NULL;

                        if($exp_disc == "")
                        {
                            $error = "Expanse Description Can't be Empty.";
                            echo '<script type="text/javascript">alert("' . $error . '")</script>';
                        }
                        else
                        {
                            if($exp_amount == "")
                            {
                                $error = "Expanse Amount Can't be Empty.";
                                echo '<script type="text/javascript">alert("' . $error . '")</script>';
                            }
                            else
                            {
                                // After all successfully insert Data to database
                                $query = "insert into `expense_table` (`expense_type`,`expense_name`,`expense_date`, `expense_paid_or_not`,`expense_additional_info`,`expense_amount`,`expense_year`,`expense_month`) values ('$exp_type', '$exp_name', '$exp_date', '$exp_paid', '$exp_disc', '$exp_amount', '$exp_year', '$exp_month')";

                                if(mysqli_query($link, $query) == false)
                                {
                                    $error = "There is a error inserting Data.";
                                    echo '<script type="text/javascript">alert("' . $error . '")</script>'; 
                                }
                                else
                                {
                                    $error = "Expanse Data Inserted Successfully.";
                                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                                }


                            }

                        }
                    }                 
                }
                else
                {
                    // Get current month
                    $now = new \DateTime('now');
                    $exp_month = $now->format('m');
                    $exp_year = $now->format('Y');

                    $exp_date = date("Y/m/d");

                    if($exp_disc == "")
                    {
                        $error = "Expanse Description Can't be Empty.";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }
                    else
                    {
                        if($exp_amount == "")
                        {
                            $error = "Expanse Amount Can't be Empty.";
                            echo '<script type="text/javascript">alert("' . $error . '")</script>';
                        }
                        else
                        {
                            // After all successfully insert Data to database
                            $query = "insert into `expense_table` (`expense_type`,`expense_name`,`expense_date`, `expense_paid_or_not`,`expense_additional_info`,`expense_amount`,`expense_year`,`expense_month`) values ('$exp_type', '$exp_name', '$exp_date', '$exp_paid', '$exp_disc', '$exp_amount', '$exp_year', '$exp_month')";

                            if(mysqli_query($link, $query) == false)
                            {
                                $error = "There is a error inserting Data.";
                                echo '<script type="text/javascript">alert("' . $error . '")</script>'; 
                            }
                            else
                            {
                                $error = "Expanse Data Inserted Successfully.";
                                echo '<script type="text/javascript">alert("' . $error . '")</script>';
                            }


                        }

                    }
                }
                

                
            }

        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>