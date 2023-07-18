<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <title>Cuntact Us</title>
    </head>
    <body>
        <div class="mainContent">
            <?php
            include('scripts/dbConnect.php');
            include('includes/header.php');
            ?>
            <main>
                <section>
                    <h1>Cuntact Us</h1>
                    <?php
                    include('includes/greeting.php');
                    ?>
                </section>
                <section>
                    <dive>
                        <p><h1>Call us</h1></p>
                        <p>To purchase a Zar Jewellery creation by phone, for personal advice on jewellery & watches or assistance with your order: 
                        <p>Monday - Friday: 8 a.m. - 7 p.m. </p>
                        <p> Saturday: 8 a.m. - 6 p.m. </p>
                        <p> Sunday: 9 a.m. - 5.30 p.m. </p>
                        <p>Tel. +44 (0)20 3147 4850</p>
                        <p>_______________________</p>
                        <p><h1>Visit us</h1></p> 
                        <p>Selfridges</p>
                        <p>400 Oxford Street</p>
                        <p>London W1A 1AB</p>
                        <p>United Kingdom</p>
                        <p>_______________________</p>
                        <p><h1>Email us</h1></p> 
                        <p>zarjewellery@gmail.com</p>
                        </div>
                    </section>
                    </main>
            <?php
                include('includes/footer.php');
            ?>
    </body>
</html>
