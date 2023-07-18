<?php
    $custFName = $_POST['custFName'];
    $custMName = $_POST['custMName'];
    $custSName = $_POST['custSName'];
    $addressOne = $_POST['addressOne'];
    $addressTwo = $_POST['addressTwo'];
    $addressThree = $_POST['addressThree'];
    $addressFour = $_POST['addressFour'];
    $townCity = $_POST['townCity'];
    $postcode = $_POST['postcode'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    include("dbConnect.php");

    $sql = "INSERT INTO customer (custFName, custMName, custSName, addressOne, addressTwo, addressThree, addressFour, townCity, postcode, telephone, mobile, email) VALUES ('$custFName', '$custMName', '$custSName', '$addressOne', '$addressTwo', '$addressThree', '$addressFour', '$townCity', '$postcode', '$telephone', '$mobile', '$email')";
    if(mysqli_query($conn, $sql))
    
?>