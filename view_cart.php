<?php
    session_start();
    include("scripts/dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta htpp-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>
    <title>Document</title>
</head>
<body>
    <?php
        $cartID = $_SESSION['cartID'];
        $cartTotal = 0;
        $sql = "SELECT * FROM cart WHERE cartID = $cartID";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $custID = $row['custID'];
            $dateCreated = $row['dateCreated'];
            $cartStatus = $row['cartStatus'];
            echo "<h2>Cart ID: $cartID | Customer ID: $custID | Date of Order: $dateCreated | cart Status: $cartStatus</h?>";
        
           $sqlDetail = "SELECT * FROM cart_detail, product, category
                        WHERE cart_detail.cartID = $cartID
                        AND cart_detail.prodID = product.prodID
                        AND product.catID = category.catID";
            $resultDetail = mysqli_query($conn, $sqlDetail);
            while($rowDetail = mysqli_fetch_assoc($resultDetail))
            {
                $prodName = $rowDetail['prodName'];
                $catName = $rowDetail['catName'];
                $prodPrice = $rowDetail['prodPrice'];
                $qtyAdded = $rowDetail['qtyAdded'];
                $rowTotal = $prodPrice * $qtyAdded;
                $cartTotal = $cartTotal + $rowTotal;

                echo "<p>";
                    echo "Product Name: $prodName | Category: $catName | Price: &pound;$prodPrice | Qty Added: $qtyAdded | Row Total: &pound;$rowTotal";
                echo "</p>";
            }
        }
        echo "<h2>Cart Total: &pound;$cartTotal</h2>";
    ?>
</body>
</html>