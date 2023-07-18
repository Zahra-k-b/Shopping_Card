<?php
    session_start();
    if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && 
    (($_SESSION['authLevel'] == 3) || ($_SESSION['custID'] == $_GET['custID'])))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <title>Edit Customers</title>
    </head>
    <body>
        <div class="mainContent">
            <?php
            include('scripts/dbConnect.php');
            include('includes/header.php');
            ?>
            <main>
                <section>
                    <h1>Edit Customers</h1>
                </section>
                <section>
                <form action="scripts/doCustomer.php" method="post">
                    <div>
                            <?php
                                $custID = $_GET['custID'];
                                $sql = "SELECT * FROM customer, users
                                WHERE customer.custID = users.custID
                                AND customer.custID = $custID";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?> 
                            <input type="text" name="custFName" value="<?php echo $row['custFName']; ?>" />
                            <input type="text" name="custMName" value="<?php echo $row['custMName']; ?>" />
                            <input type="text" name="custSName" value="<?php echo $row['custSName']; ?>"/>
                            <input type="text" name="addressOne" value="<?php echo $row['addressOne']; ?>"/>
                            <input type="text" name="addressTwo" value="<?php echo $row['addressTwo']; ?>"/>
                            <input type="text" name="addressThree" value="<?php echo $row['addressThree']; ?>"/>
                            <input type="text" name="addressFour" value="<?php echo $row['addressFour']; ?>"/>
                            <input type="text" name="townCity" value="<?php echo $row['townCity']; ?>"/>
                            <input type="text" name="postcode" value="<?php echo $row['postcode']; ?>"/>
                            <input type="text" name="telephone" value="<?php echo $row['telephone']; ?>"/>
                            <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"/>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>"/>
                            <?php echo "<h2>UserName:".$row['userName']; ?>
                            <input type="password" name="userPassword" value="<?php echo $row['userPassword']; ?>" />
                            <input type="hidden" name="custID" value="<?php echo $row['custID']; ?>" />
                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>" />
                            <input type="submit" name="submit" value="update customer Details" />
                        </div>
                        <?php
                        }
                        ?>
                </form>
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