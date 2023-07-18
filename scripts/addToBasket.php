<?php
    session_start();
    include("dbConnect.php");
    $prevPage = $_SERVER['HTTP_REFERER'];
    $custID = 1;
    $prodID = $_POST['prodID'];
    $prodPrice = $_POST['prodPrice'];
    $prodAddQty = $_POST['prodAddQTY'];
    $rowTotal = $prodPrice*$prodAddQty;
    $date = date("Y-m-d H:i:s");
    $total = 2.99;
    $status = 2;

    if(isset($_SESSION['shopCartID']))
    {
        $cartID = $_SESSION['shopCartID'];
        $sql = "INSERT INTO cart_detail (cartID, prodID, qtyAdded, prodPrice,rowTotal) VALUES ($cartID, $prodID, $prodAddQty, $prodPrice, $rowTotal)";
        if(mysqli_query($conn, $sql))
        {
            header("Location: $prevPage?Message=Success");
        }
    }
    else
    {
        $sql = "INSERT INTO cart (custID, dateCreated, cartTotal, cartStatus) VALUES ($custID, '$date', $total, $status)";
        if(mysqli_query($conn, $sql))
        {
            $sql = "SELECT * FROM cart WHERE dateCreated = '$date'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $_SESSION['shopCartID'] = $row['cartID'];
                $cartID = $_SESSION['shopCartID'];
            }
            $sql = "INSERT INTO cart_detail (cartID, prodID, qtyAdded, prodPrice, rowTotal) VALUES ($cartID, $prodID, $prodAddQty, $prodPrice, $rowTotal)";
            if(mysqli_query($conn, $sql))
            {
                header("Location: $prevPage?Message=Success");
            }
        }
        else
        {
            header("Location: $prevPage?Message=Fail");
        }
    }
    ?>
