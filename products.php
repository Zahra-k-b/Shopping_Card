<?php
    session_start();
        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
        {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/liveSearch.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zar Jewellery</title>
</head>
</body>

    <?php
        include("includes/header.php")
    ?>

    <div class="main" id="main">

    <?php
        include("scripts/dbConnect.php");
        $sql = "SELECT *FROM product";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
        ?>
            <div class="prodCard">
                </div>
                    <h1><?php echo $row['prodName']; ?></h1>
                    <p><?php echo substr($row['prodDesc'],0,250); ?></p>
                </div>

                <div class="prodPic" style="background-image: url('images/<?php echo $row['prodPicPath']; ?>')"></div>
                <img src="images/<?php echo $rowPic['prodPicPath']; ?>" height="160" width="160" alt="" />

                <?php
                    if((isset($_SESSION['authLevel'])) && ($_SESSION['authLevel'] == 3))
                    {
                        $authLevel = $_SESSION['authLevel'];
                ?>
                <form action="editProduct.php" method="get">
                    <input type="hidden" name="prodID" value="<?php echo $row['prodID']; ?>" />
                    <input type="submit" name="submit" value="Update" />
                </form>
                <?php
                    }
                    else
                    {
                ?>
                <form action="scripts/addToBasket.php" method="post">
                    <input type="hidden" name="prodID" value="<?php echo $row['prodPrice']; ?>" />
                    <input type="hidden" name="prodPrice" value="<?php echo $row['prodPrice']; ?>" />
                    <span>&pound;<?php echo $row['prodPrice']; ?></span>
                    <input type="text" name="prodAddQTY" value="1" />
                    <input type="submit" name="basketAdd" value="Add" />
                    </form>
                    <?php    
                        }
                    ?>
                </div>
            <?php
        }
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