<?php
    session_start();
        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
        {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/liveSearch.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zar Jewellery</title>
</head>
<body>
    <div class="mainContent">
            <?php
                include('scripts/dbConnect.php');
                include('includes/header.php');
            ?>
            <main>
                <section>
                    <h1>Add a New Product</h1>
                    <?php
                        include('includes/greeting.php');
                    ?>
                </section>

                <section>
                    <form action="scripts/doInsert.php" method="post">
                        <div>
                            <select name="category">
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    echo "<option value=\"".$row['catID']."\">".$row['catName']."</option>";
                                    }
                                ?> 
                            </select>
                            <input type="text" name="prodName" value="" placeholder="Enter Product Name Here..." />
                            <input type="text" name="prodPrice" value="" placeholder="Enter Price Here..." />
                            <input type="text" name="prodPicPath" value="" placeholder="Enter Picture File Here..." />
                            <input type="text" name="prodStock" value="" placeholder="Enter Quantity Here..." />
                            <input type="submit" name="submit" value="Post Entry" />
                        </div>
                        <textarea name="prodDesc" placeholder="Enter Product Description here..."></textarea>
                    </form>
                </section>
            </main>
            <?php
                include('includes/footer.php');  
            ?>
    </div>
</body>
</html>
<?php
        }
        else
        {
            header("Location: login.php?error=wrongDetails");
        }
?>