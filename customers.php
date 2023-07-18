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
        <title>Zar Jewellery</title>
    </head>
    <body>
        <div class="mainContent">
            <?php
                include('scripts/dbConnect.php');
                include('includes/header.php');
                ?>
                <main>
                <section>
                    <h1>Customers</h1>
                    <?php
                    include('includes/greeting.php');
                    ?>
                </section>
                <?php
                    $sql = "SELECT * FROM customer, users
                            WHERE customer.custID = users.custID
                            ORDER BY custSName ASC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) 
                {
                ?>
                <section>
                    <div>
                        <h1><?php echo $row['custFName'];" ".$row['custMName'];" ".$row['custSName']; ?></h1>
                
                            <?php
                                echo "<p>".$row['addressOne']."</p>";
                                echo "<p>".$row['addressTwo']."</p>";
                                echo "<p>".$row['addressThree']."</p>";
                                echo "<p>".$row['addressFour']."</p>";
                                echo "<p>".$row['townCity']."</p>";
                                echo "<p>".$row['postcode']."</p>";
                                echo "<p>".$row['telephone']."</p>";
                                echo "<p>".$row['mobile']."</p>";
                                echo "<p>".$row['email']."</p>";
                                if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && 
                                (($_SESSION['authLevel'] == 3) || ($_SESSION['custID'] == $row['custID'])))
                                {
                                    echo "<a href=\"editCustomer.php?custID=".$row['custID']."\">Edit Customer</a>";
                                }
                        ?>
                    </div>
                </section>
                <?php
                } 
                ?> 
            </main>
            <?php
                    include("includes/footer.php")
            ?>
        </div>
        </body>
    </html>