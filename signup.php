<?php
    if(isset($_POST['sign_in_btn']))
    {
        require("includes/db_connect.php");

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $reppassword = $_POST['reppassword'];

        if(empty($username) || empty($email) || empty($password) || empty($reppassword))
        {
            header("Location: index.php?error=emptyfield&username=".$username."&email=".$email);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("Location: index.php?error=invalidusernameemail");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: index.php?error=invalidemail&username=".$username);
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("Location: index.php?error=invalidusername&email=".$email);
            exit();
        }
        elseif($password !== $reppassword)
        {
            header("Location: index.php?error=passwordcheck&username=".$username."&email=".$email);
            exit();
        }
        else
        {
            $sql = "SELECT username FROM user WHERE username=?";
            $stmt = $database->connect()->prepare($sql);

            if(!$stmt)
            {
                header("Location: index.php?error=sqlerror");
                exit();
            }
            else
            {
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();
                $resultCheck = $stmt->num_rows;

                if($resultCheck > 0)
                {
                    header("Location: index.php?error=usertaken&email=".$email);
                    exit();
                }
                else
                {
                    $sql = "INSERT INTO user(username, email, password) VALUES(?, ?, ?)";
                    $stmt = $database->connect()->prepare($sql);
                    if(!$stmt)
                    {
                        header("Location: index.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        $hashed = password_hash($password, PASSWORD_DEFAULT);

                        $stmt->bind_param("sss", $username, $email, $hashed);
                        $stmt->execute();
                        header("Location: index.php?signup=success");
                        exit();
                    }
                }
            }
        }

        $stmt->close();
        $conn->close();
    }
    else
    {
        header("Location: index.php");
        exit();
    }
?>