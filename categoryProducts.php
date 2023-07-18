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
        <title>Category Products</title>
    </head>
    <body>
        <div class="mainContent">
            <?php
                include('scripts/dbConnect.php');
                include('includes/header.php');
                ?>
                <main>
                <?php                    
                    $categoryID = $_GET['categoryID'];
                    $sql = "SELECT * FROM category, product
                    WHERE category.catID = product.catID
                    AND product.prodStatus = 1
                    AND category.catID = $categoryID
                    ORDER BY prodPrice DESC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) 
                {
                ?>
                <section>
                    <div>
                        <h1><?php echo $row['prodName']; ?></h1>
                        <p><?php echo substr($row['prodDesc'],0,1000); ?></p>
                        <form action="scripts/addToBasket.php" method="post">
                            <input type="hidden" name="prodID" value="<?php echo $row['prodID']; ?>" />
                            <input type="hidden" name="prodPrice" value="<?php echo $row['prodPrice']; ?>" />
                            <h1><span> Price Each: &pound;<?php echo $row['prodPrice']; ?></span></h1>
                            <h3><span> Per Quantity:<?php echo $row['prodStock']; ?></span></h3>
                            <input type="text" name="qtyAdded" value="1" />
                            <input type="submit" name="baskAdd" value="Add To Basket" />
                        </form>
                        <?php
                            $prodID = $row['prodID'];
                            $sqlPic = "SELECT * FROM product, prodPic
                                    WHERE product.prodID = prodPic.prodID
                                    AND product.prodID = $prodID
                                    AND product.prodStatus = 1";
                            $resultPic = mysqli_query($conn, $sqlPic);
                            while($rowPic = mysqli_fetch_assoc($resultPic))
                            {
                            if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
                            {
                            echo "<a href=\"editProduct.php?prodID=".$row['prodID']."\">Edit Product</a>";
                            }
                            ?>       
                                <img src="images/<?php echo $rowPic['prodPicPath']; ?>" height="160" width="160" alt="" />
                        <?php        
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