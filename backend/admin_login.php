<?php
    session_start();

    include "dbConnection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submitBtn']))
        {
            $error = "";

            if($_POST['admin_username'] == "" || $_POST['admin_password'] == "")
            {
                $error = "Please Fill all Fields.";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                // ADMIN LOGIN CHECK
                $username = test_input($_POST['admin_username']);
                $password = test_input($_POST['admin_password']);

                $query = "SELECT * FROM admin_table WHERE admin_username = '".$username."' AND  admin_password = '".$password."'";

                $result = mysqli_query($link, $query);

                if (!$result) {
                    printf("Error: %s\n", mysqli_error($link));
                    exit();
                }

                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows ($result) > 0)
                { 
                    $_SESSION["id"] = $row['admin_username'];
                    $_SESSION["user_type"] = "admin";
                    header('Location: ../page/quick_look.php');
                }
                else
                {
                    // EMPLOYEE LOGIN CHECK
                    $username = test_input($_POST['admin_username']);
                    $password = test_input($_POST['admin_password']);

                    $query = "SELECT * FROM employee_table WHERE employee_username = '".$username."' AND employee_password = '".$password."'";

                    $result = mysqli_query($link, $query);

                    if (!$result) {
                        printf("Error: %s\n", mysqli_error($link));
                        exit();
                    }

                    $row = mysqli_fetch_array($result);

                    if(mysqli_num_rows ($result) > 0)
                    { 
                        if( $row['employee_moderator_access'] == "Yes" )
                        {
                            $_SESSION["id"] = $row['employee_username'];
                            $_SESSION["user_type"] = "moderator";
                            header('Location: ../page/quick_look.php');
                        }
                        else
                        {
                            $error = "This Employee does not have any moderator access.";
                            echo '<script type="text/javascript">alert("' . $error . '")</script>';
                        }                      
                    }
                    else
                    {
                        $error =  'The username or password are incorrect!';
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
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