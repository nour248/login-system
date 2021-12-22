<?php
    require "header.php";
?>

    <main class="main2">
        <div class ="div2">
            <section>
                <h1>Sign Up</h1>
                <form class="sect12" action="includes/signup.inc.php" method="POST">
                    <input type="text" name ="uid" placeholder="Username">
                    <br>
                    <input type="text" name ="mail" placeholder="E-mail">
                    <br>
                    <input type="password" name ="pwd" placeholder="password">
                    <br>
                    <input type="password" name ="pwd-repeat" placeholder="repeat password">
                    <br>
                    <button class="cool2"type="submit" name="signup-submit">Sign Up</button>
                </form>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>    