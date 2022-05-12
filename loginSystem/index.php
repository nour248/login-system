<?php
    require "header.php";
?>

    <main class="main1">
        <div>
            <section>
                <?php 
                    if (isset($_SESSION['userid'])) {
                        echo  '<p>You are logged in !</p>' ;
                    }else {
                        echo '<p>You are logget out !</p>' ; 
                    }
                ?>
            </section>
        </div>
    </main>

<?php
    require "footer.php" ;
?>   
//PPP
