<?php

?>
<header class="main-header">
    <div class="site-navigation " id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/images/logo-light.png" alt="BookHunt" class="img-fluid">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link " href="index.php">
                                Home
                            </a>
                           
                        </li>
                        <li class="nav-item ">
                            <a href="about.php" class="nav-link js-scroll-trigger">
                                About
                            </a>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link js-scroll-trigger dropdown-toggle" id="navbar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar2">
                                <?php 
                                    include "config.php";
                                    $mysql = "Select * from book_category";
                                    $result = mysqli_query($conn,$mysql);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <a class="dropdown-item " href="Categories.php?cat=<?php echo $row["book_cat_id"]?>">
                                    <?php echo $row["book_cat_name"]?>
                                </a>
                                <?php                                        
                                    }
                                ?>
                            </div>
                        </li>

                        <!-- <li class="nav-item ">
                            <a href="#testimonial" class="nav-link js-scroll-trigger">
                                Reviews
                            </a>
                        </li> -->

                        <!-- <li class="nav-item ">
                            <a href="#author" class="nav-link js-scroll-trigger">
                                Author
                            </a>
                        </li> -->

                        <li class="nav-item ">
                            <a href="#pricing" class="nav-link js-scroll-trigger">
                                Pricing
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="contact.php" class="nav-link js-scroll-trigger">
                                Contact
                            </a>
                        </li>
                        <?php
                        if(isset($_SESSION["u_id"])){
                            ?>
                            
                            <li class="nav-item ">
                                    
                                    <a href="logout.php" class="nav-link js-scroll-trigger btn btn-danger p-2 mt-3">
                                        Logout
                                    </a>
                                    
                                </li>                            
                                
                            <?php
                            }
                            else{
                                ?>
                               <li class="nav-item ">
                                    <a href="log.php" class="nav-link js-scroll-trigger btn btn-info p-2 mt-3">
                                        Log in
                                    </a>
                                </li>                            
                            <?php
                        
                            }
                ?> 
                                               
                                               <li class="nav-item ">
                            <a href="sign_in.php" class="nav-link js-scroll-trigger btn btn-warning p-2 mt-3 ml-2">
                                Register
                            </a>
                        </li>
                    </ul>
                </div> <!-- / .navbar-collapse -->

                <div class="header-right-info d-none d-lg-block">
                    <ul class="header-socials">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div> <!-- / .container -->
        </nav>
    </div>
</header>