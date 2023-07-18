<?php
    $prodName = $_POST['prodName'];
    $prodDesc = $_POST['prodDesc'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $catID = $_POST['catID'];

    include("dbConnect.php");

    $sql = "INSERT INTO product (catID, prodName, prodDesc, prodPrice, prodStock) VALUE ($catID, '$prodName', '$prodDesc', $prodPrice, $prodStock)";
    if(mysqli_query($conn, $sql))
    {
        header("location: ../index.php?message=Success Product Added");
    }
    else
    {
        echo "Error with adding product";
    }
?>