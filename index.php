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
            <?php
                include('scripts/dbConnect.php');
                include('includes/header.php');
                ?>
                <main>
                    <h1>ALL JEWELLERY</h1>
                        <div class="gallery">
                                <img class="one" src="images/slide1.png" alt="" />
                                <img class="two" src="images/slide2.jpg" alt="" />
                                <img class="three" src="images/slide3.jpg" alt="" />
                            </div>
                            <p>Looking for wear-forever fashion jewellery? You've come to the right place.</p>
                            <p>Expect necklaces, earrings, rings, and everything in-between with crystal designs that make a unique statement, day or night.</p>
                <div>

                <?php
                    $sql = "SELECT * FROM category, product
                            WHERE category.catID = product.catID
                            AND product.prodStatus = 1
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
                            <h1><span> Price: &pound;<?php echo $row['prodPrice']; ?></span></h1>
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
                        ?>
                                <img src="images/<?php echo $rowPic['prodPicPath']; ?>" height="200" width="200" alt="" />
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