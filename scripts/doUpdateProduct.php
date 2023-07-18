<?php
    $prodID = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $catID = $_POST['category'];
    $prodDesc = $_POST['prodDesc'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $dateAdded = date("Y-m-d h:i:s");
    $prodPicPath = $_POST['prodPicPath'];
    include("dbConnect.php");
    
    $sql = "UPDATE product SET catID=$category, prodName='$prodName', prodDesc='$prodDesc', prodPrice='$prodPrice', prodStock=$prodStock";
    if(mysqli_query($conn, $sql))
    {
        $sqlPic = "UPDATE prodpic SET prodPicPath='$prodPicPath' WHERE prodID=$prodID";
        if(mysqli_query($conn, $sqlPic))
        {
            header("location: ../index.php?message=Success");
        }
    }
    else
    {
        header("location: ../index.php?message=Fail");
    }
?>