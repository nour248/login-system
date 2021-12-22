<?php

if (isset($_POST['signup-submit']))
{
    require 'dbh.inc.php'; 

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email)|| empty($password)||empty($passwordrepeat))
    {
        header("location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" , $username)) 
    {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
        header("location: ../signup.php?error = invalidemail=".$username."&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) 
    {
        header("location: ../signup.php?error = invaliduidemail=".$username."&mail=".$email);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("location: ../signup.php?error = passwordCheck=".$username."&mail=".$email);
        exit();
    }
    else 
    {
        $sql = "SELECT uidusers FROM users WHERE uidusers=?" ; 
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt , $sql))
        {
            header("location: ../signup.php?error = invaliduidemail");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt , "s" ,$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt) ; 
            if ($resultCheck > 0 )
            {
                header("location: ../signup.php?error = invaliduidemail?&mail=".$email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidusers,emailusers,pwdusers) VALUES (?,?,?);" ; 
                $stmt = mysqli_stmt_init($conn); 
                if(!mysqli_stmt_prepare($stmt , $sql))
                {
                    header("location: ../signup.php?error = invaliduidemail");
                    exit();
                }else {
                    $hashedPwd = password_hash($password,PASSWORD_DEFAULT); 

                    mysqli_stmt_bind_param($stmt , "sss" ,$username , $email , $hashedPwd);
                    mysqli_stmt_execute($stmt); 
                    header("location: ../signup.php?Sinup=succes");
                    exit();
                }    
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("location: ../signup.php");
    exit();
}
