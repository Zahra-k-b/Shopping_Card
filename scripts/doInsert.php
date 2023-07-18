<?php
    $prodName = $_POST['prodName'];
    $category = $_POST['category'];
    $prodDesc = $_POST['prodDesc'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $dateAdded = date("Y-m-d h:i:s");
    $prodPicPath = $_POST['prodPicPath'];

    include("dbConnect.php");

    if(isset($_SESSION['prodID']))
    {
       $prodID = $_SESSION['prodID'];
       $sql = "INSERT INTO prodPic (prodID, prodPicPath) VALUE ($prodID, $prodPicPath)";
       if(mysqli_query($conn, $sql))
       {
        header("location: $prevPage?message=success");
       }
    }
    else
    {
        $sql = "INSERT INTO product (catID, prodName, prodDesc, prodPrice, prodStock) VALUES ($category, '$prodName', '$prodDesc', $prodPrice, $prodStock)";
        if(mysqli_query($conn, $sql))
        {
            $sql = "SELECT * FROM product WHERE prodName = '$prodName'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $prodID = $row['prodID'];
            }
            $sql = "INSERT INTO prodPic (prodID, prodPicPath) VALUES ($prodID, '$prodPicPath')";
            if(mysqli_query($conn, $sql))
            {
                header("location: ../index.php?message=success");
            }
        }
        else
        {
            echo "Error with Product Insert";
        }
    }

?>