<?php
    session_start();
    $getInvalid = array("\"", "/", "+", "=", "*", "&", "^", "%", "$", "£", "!", ">", "<", ",", ".", "|", "{", "}", "[", "]", ";", ":", "±", "§", "`", "~", "#", "'", "\\");
    $postUserNameClean = str_replace($getInvalid, " ", $_POST['userName']);
    if(!isset($_POST['userName']) || ($postUserNameClean !== $_POST['userName']))
    {
        header("Location: ../index.php?error=dodgyCharacter");
    }
    else
    {
        include("dbConnect.php");
        $pWord = $_POST['password'];
        $sql = "SELECT * FROM users WHERE userName = '$postUserNameClean' AND userPassword = '$pWord'";
        $result = mysqli_query($conn, $sql);
        $resultCount = mysqli_num_rows($result);
        if($resultCount === 1)        
        {
            while($row = mysqli_fetch_assoc($result))
            {
            $_SESSION['message'] = "Authenticated";
            $_SESSION['authLevel'] = $row['userStatus'];
            $_SESSION['userName'] = $row['userName'];
            header("Location: ../index.php?message=success");
            }
        }
        else
        {
            header("Location: ../index.php?error=wrongDetails");
        }
    }
?>