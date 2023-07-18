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
        <title>Add a new category</title>

        </head>
        <body>
            <div class="mainContent">
                <?php
                include('scripts/dbconnect.php');
                include('includes/header.php');
                ?>
                <main>
                    <section>
                        <h1>Add a new Category</h1>
                        <?php
                            include('includes/greeting.php');
                        ?>
                    </section>

                    <section>
                        <?php
                            $sql = "SELECT * FROM category
                                    ORDER BY catName ASC";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                             <p><a href="categoryProducts.php?categoryID=<?php echo $row['catID']; ?>"><?php echo $row['catName']; ?></a></p>
                        <?php
                            }
                        ?>
                    </section>
                    <?php
                        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
                        {
                    ?>
                            <section>
                                <form action="scripts/insertCategory.php" method="post">
                                    <div>
                                            <input type="text" name="categoryName" value="" placeholder="Enter Category Name Here..." />
                                            <input type="submit" value="Add Category" />
                                    </div>
                                </form>
                            </section>
                            <?php
                                }
                            ?>
                </main>
                <?php
                    include('includes/footer.php');
                ?>
            </div>
        </body>