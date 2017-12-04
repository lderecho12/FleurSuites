<?php

    session_start();

    if ($_SESSION && isset($_SESSION['userfirstname'])) {
        ?>
            <html>
                <link rel="shortcut icon" href="../images/title.ico">
                <header>
                    <div class="navbar">       
                        <nav class="mynavbar">
                            <ul>
                                <li class="myreservations"><a href="../myreservations.php">My Reservations</a></li>
                                <li class="userprofile"><a href="../controllers/logoutfunction.php">
                                    <?php
                                        echo $_SESSION['userfirstname'];
                                    ?>
                                </a></li>
                                <li class="logout"><a href="../../controllers/logoutfunction.php">Logout</a></li>
                            </ul>
                        </nav>
                        <nav class="navbar">
                            <ul>
                                <li class="home"><a href="../index.php">Home</a></li>
                                <li class="rooms"><a href="../rooms.php">Rooms</a></li>
                                <li class="contactus"><a href="../contactus.html">Contact Us</a></li>
                                <li class="aboutus"><a href="../aboutus.html">About Us</a></li>
                            </ul>
                        </nav>
                        <a class="navbarlogo" href="../aboutme.html">
                            <img alt="logo" src="../images/logos/FleurSuitesLogo.png"/>
                        </a> 
                    </div>  
                </header>   
            </html>
        <?php
    } else {
        ?>
            <html>
                <link rel="shortcut icon" href="../images/title.ico">
                <header>
                    <div class="navbar">       
                        <nav class="mynavbar">
                            <ul>
                                <li class="register"><a href="../account/register.php">Register</a></li>
                                <li class="login"><a href="../account/login.php">LogIn</a></li>
                            </ul>
                        </nav>
                        <nav class="navbar">
                            <ul>
                                <li class="home"><a href="../index.php">Home</a></li>
                                <li class="rooms"><a href="../rooms.php">Rooms</a></li>
                                <li class="contactus"><a href="../contactus.html">Contact Us</a></li>
                                <li class="aboutus"><a href="../aboutus.html">About Us</a></li>
                            </ul>
                        </nav>
                        <a class="navbarlogo" href="../aboutme.html">
                            <img alt="logo" src="../images/logos/FleurSuitesLogo.png"/>
                        </a> 
                    </div>  
                </header>   
            </html>
        <?php
    }
?>

<html>
    <head>
        <title>Rooms || Fleur Suites</title>
        <script src="../js/jquery.js"></script>
        <script src="../js/navscroll.js"></script>
        <script src="../js/slideshow.js"></script>
        <link rel="shortcut icon" href="images/title.ico">
        <link rel="stylesheet" type="text/css" href="../styles/standardroomstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/navbarstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/slideshowstyle.css">
    </head>

    <body>
        <div class="backgroundrooms">
            <img src="../images/room1.png" style="width:100%">
        </div>

        <div class="standardroomstatement">
            <p align="center" class="standardroomstatement">STANDARD ROOM</p>
        </div>

        <div class="standardroombody">
            <div class="standardroommorebody">
                <div class="roomsback">
                    <a href="../rooms.php">
                        <img class="roomsback" src="../images/icons/back.ico"/>
                    </a>
                </div>
                <div class="standardroommorebodystatement">
                    <p class="standardroommorebodystatement">
                        Standard Room
                    </p>
                </div>
                <div class="standardroommore">
                    <div class="standardroommoreimages">
                        <div class="slideshow">
                            <div class="mySlides fade">
                                <img src="../images/standardroomimages/big1.jpg">
                            </div>
                            <div class="mySlides fade">
                                <img src="../images/standardroomimages/big2.jpg">
                            </div>
                            <div class="mySlides fade">
                                <img src="../images/standardroomimages/big3.jpg">
                            </div>
                            <div class="mySlides fade">
                                <img src="../images/standardroomimages/big4.jpg">
                            </div>
                            <div class="mySlides fade">
                                <img src="../images/standardroomimages/big5.jpg">
                            </div>

                            <a class="prev" align="center" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" align="center" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <div class="standardroomsimages">
                            <ul class="standardroomsimage">
                                <a class="standardroomsimage1" onclick="selectSlides(1)">
                                    <img class src="../images/standardroomimages/1.jpg">
                                </a>
                                <a class="standardroomsimage2" onclick="selectSlides(2)">
                                    <img class src="../images/standardroomimages/2.jpg">
                                </a>
                                <a class="standardroomsimage3" onclick="selectSlides(3)">
                                    <img class src="../images/standardroomimages/3.jpg">
                                </a>
                                <a class="standardroomsimage4" onclick="selectSlides(4)">
                                    <img class src="../images/standardroomimages/4.jpg">
                                </a>
                                <a class="standardroomsimage5" onclick="selectSlides(5)">
                                    <img class src="../images/standardroomimages/5.jpg">
                                </a>
                            </ul>
                        </div>
                        <script>
                            var slideIndex = 1;
                            showSlides(slideIndex);
                        </script>
                    </div>
                    <div class="standardroommoreproperties">
                        <div class="standardroommorepropertiesstatement">
                            <p class="standardroommorepropertiesstatement">
                                Properties: 
                            </p>                            
                        </div>
                    </div>   
                    <div class="standardroommoreinfo">
                        <div class="standardroommoreinfostatement">
                            <p class="standardroommoreinfostatement">
                                More Info: 
                            </p>                            
                        </div>                        
                    </div>   
                    <div class="standardroommoreamenities">
                        <div class="standardroommoreamenitiesstatement">
                            <p class="standardroommoreamenitiesstatement">
                                Amenities: 
                            </p>                            
                        </div>
                    </div>
                    <div class="standardroommoreterms">
                        <div class="standardroommoretermsstatement">
                            <p class="standardroommoretermsstatement">
                                Terms: 
                            </p>                            
                        </div>                       
                    </div>  
                </div>
                <div class="standardroomcheckinout">
                    
                </div>
            </div>

        </div>
    </body>

</html>