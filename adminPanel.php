<?php
    session_start();
        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
        {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <title>Admin</title>
    </head>
    <body>
        <div class="mainContent">
            <?php
            include('scripts/dbConnect.php');
            include('includes/header.php');
            ?>
            <main>
                <section>
                    <h1>Admin Zar Jewellery</h1>
                    <?php
                    include('includes/greeting.php');
                    ?>
                </section>

                <section>
                    <div class="adminPanel">
                        <a href="addProduct.php">Add a New Product</a>
                        <a href="addCategory.php">Add a New Category</a>
                        <a href="editProduct.php">Edit a Product</a>
                        <a href="customers.php">View Customers</a>
                    </div>
                </section>
            </main>
            <?php
                include('includes/footer.php');
            ?>
        </div>
    </body>
</html>
<?php
        }
        else
        {
            header("Location: login.php?error=wrongDetails");
        }
?>