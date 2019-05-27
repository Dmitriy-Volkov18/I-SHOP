<?php
    if(isset($_POST['login_btn']))
    {
        require("includes/db_connect.php");

        $email_username = $_POST['log_email_username'];
        $password = $_POST['log_password'];

        if(empty($email_username) || empty($password))
        {
            header("Location: index.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM user WHERE username=? OR email=?;";
            $stmt = $database->connect()->prepare($sql);

            if(!$stmt)
            {
                header("Location: index.php?error=sqlerror");
                exit();
            }
            else
            {
                $stmt->bind_param("ss", $email_username, $email_username);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if($row = $result->fetch_assoc())
                {
                    $password_check = password_verify($password, $row['password']);

                    if($password_check == false)
                    {
                        header("Location: index.php?error=wrongpassword");
                        exit();
                    }
                    elseif($password_check == true)
                    {
                        session_start();
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_username'] = $row['username'];

                        header("Location: index.php?login=success");
                        exit();
                    }
                    else
                    {
                        header("Location: index.php?error=wrongpassword");
                        exit();
                    }
                }
            }
        }
    }
    else
    {
        header("Location: index.php");
        exit();
    }