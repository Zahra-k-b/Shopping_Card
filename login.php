<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <title>Please login here</title>
    </head>    
    <body>
        <div class="mainContent">
            <?php
                include('includes/header.php');
                include('scripts/dbConnect.php');
            ?>
            <main>
                <section>
                    <h1>Login Page</h1>
                </section>
                <section>
                    <form action="scripts/doLogin.php" method="post">
                        <div>
                            <input type="text" name="userName" value="" placeholder="Enter Username here..." />
                            <input type="password" name="password" value="" placeholder="Enter Password here..." />
                            <input type="submit" name="submit" value="Login" />
                        </div>
                    </form>
                </section>
            </main>
            <?php
                include('includes/footer.php');
            ?>
        </div>
    </body>
</html>