<?php

if(isset($_POST['login-submit']))
{
    require 'dbh.inc.php'; 

    $mailUid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty( $mailUid) || empty($password)) {
        header("location: ../index.php?error=emptyfields ");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE uidusers=? OR emailusers=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt , $sql))
        {
            header("location: ../index.php?error=emptyfields ");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt , "ss" , $mailUid , $mailUid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt) ; 
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordcheck = password_verify($password , $row['pwdusers']);
                if ($passwordcheck == false) {
                    header("location: ../index.php?error=falsepasseword ");
                    exit();  
                }else if ($passwordcheck == true) 
                {
                    session_start();
                    $_SESSION['userid']= $row['idusers'];
                    $_SESSION['userUid']= $row['uidusers'];
                    header("location: ../index.php?login=success");
                    exit();
                }else {
                    header("location: ../index.php?error=falsepasseword ");
                    exit();
                }
            }
            else {
                header("location: ../index.php?error=nouser ");
                exit();           
            }
        }
    }
}

else {
    header("location: ../index.php");
    exit();
}