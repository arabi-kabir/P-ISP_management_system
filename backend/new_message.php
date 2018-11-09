<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['sendBtn']))
        {
            include "dbConnection.php";

            $error = "";

            if($_POST['name'] == "" OR $_POST['email'] == "" OR $_POST['phone'] == "" OR $_POST['messgae'] == "")
            {
                $error = "Enter All Fields.";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $message = $_POST['messgae'];


                $query = "insert into `new_message_table` (`name`,`email`,`contact_number`, `message`, `read_status`) values ('$name', '$email',$phone, '$message', 'new')";
                
                if(mysqli_query($link, $query) == false)
                {
                    $error = "There is a error Sending Complain. Try Again.";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
                else
                {
                    $error = "Message Sent Successfully.";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
            }

            
        }
    }

?>