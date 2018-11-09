<?php
    session_start();

    include "dbConnection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submitBtn']))
        {
            $error = "";

            if($_POST['customer_username'] == "" || $_POST['customer_password'] == "")
            {
                $error = "Please Fill all Fields.";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                // USER LOGIN CHECK
                $username = test_input($_POST['customer_username']);
                $password = test_input($_POST['customer_password']);

                $query = "SELECT * FROM customer_login_table WHERE customer_username = '".$username."' AND  customer_password = '".$password."'";

                $result = mysqli_query($link, $query);

                if (!$result) {
                    printf("Error: %s\n", mysqli_error($link));
                    exit();
                }

                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows ($result) > 0)
                { 
                    $_SESSION["username"] = $row['customer_username'];
                    $_SESSION["userid"] = $row['customer_id'];

                    header('Location: ../page/customer_home.php');
                }
                else
                {
                    $error =  'The username or password are incorrect!';
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
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