<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <link rel="shortcut icon" href="img/FIRST_ONE.png">
    <title>AKC</title>
</head>
<body>
    <header>
        <nav class="ase">
            <a href="index.php">
                <img src="img/FIRST_ONE.png" alt="logo" >
            </a>
            <ul class="menu">
               <li><a href="index.php">Home</a></li>
               <li><a href="projects.php">Projects</a></li>
               <li><a href="">Tutorials</a></li>
               <li><a href="">Contact</a></li>
               <li><a href="">About me</a></li>
            </ul>
            <div>
                <?php
                     if (isset($_SESSION['userid'])) {
                        echo  '<form classe="logout" action="includes/logout.inc.php" method = "POST">
                            <button class="B" type="submit" name="logout-submit">logout</button>
                                </form>' ;
                    }else {
                        echo '<form class="login" action="includes/login.inc.php" method = "POST">
                        <input type="text" name="mailuid" placeholder="user name / email">
                        <input type="password" name ="pwd" placeholder="password">
                        <button class="A"type="submit" name="login-submit">login</button>
                    </form>
                    <a href="signup.php">Sign Up</a>' ; 
                    }
                ?>   
            </div>
        </nav>   
    </header>
