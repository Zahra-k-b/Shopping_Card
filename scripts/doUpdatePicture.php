<?php
    $prodID = $_POST['prodID'];
    $prodPicPath = $_POST['prodPicPath'];
    include("dbconnect.php");

    $sqlpic = "UPDATE prodpic SET prodPicPath=$'$prodPicPath' WHERE prodID=$prodID";
    if(mysqli_query($conn, $sqlPic))
        {
            header("location: ../index.php?message=Success");
        }
    else
    {
        header("location: ../index.php?message=Fail");
    }
?>