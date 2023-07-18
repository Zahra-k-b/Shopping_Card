<?php
                    if((isset($_SESSION['message'])) && ($_SESSION['message'] == "Authenticated"))
                    {
                        $greeting = $_SESSION['userName'];
                    }
                    else
                    {
                        $greeting = "";
                    }
                    
                    
                    $hour = date('H');
                        if($hour < 12)
                        {
                            echo "<h1>Good Morning, $greeting<h1>";
                        }
                        elseif($hour < 18)
                        {
                            echo "<h1>Good Afternoon, $greeting</h1>";
                        }
                        else
                        {
                            echo "<h1>Good Evening, $greeting</h1>";
                        }
                    ?>