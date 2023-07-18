<header>
                <div class="logo">
                    <h1>Zar Jewellery</h1>
                </div>
                <nav>
                    <div><a tabindex="1" href="index.php">Home</a></div>
                    <?php
                        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated") && ($_SESSION['authLevel'] == 3))
                        {
                            echo "<div><a tabindex=\"2\" href=\"adminPanel.php\">Admin</a></div>";
                        }
                    ?>
                    <div><a tabindex="3" href="addCategory.php">Categories</a></div>
                    <div><a tabindex="4" href="contactUs.php">Contact Us</a></div>
                    <?php
                        if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated"))
                        {
                            echo "<div><a tabindex=\"4\" href=\"scripts/doLogout.php\">Log Out</a></div>"; 
                        }
                        else
                        {
                            echo "<div><a tabindex=\"4\" href=\"login.php\">Log In</a></div>";
                        }
                    ?>
                </nav>
            </header>