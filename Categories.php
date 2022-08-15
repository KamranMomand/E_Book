<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themeturn.com/tf-db/bookhunt/bookhunt/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2022 15:02:22 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="dreambuzz,bookhunt,promotion,creative,author,book,ebook,marketing,digital, agency, startup,onepage, clean, modern,business, company">
  
  <meta name="author" content="https://themeforest.net/user/dreambuzz">

  <title>BookHunt - Book landing Template</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include "links.php" ?>

</head>

<body id="top-header" data-background="dark" class="dark-theme">
<?php session_start(); ?>
    
<?php include "header.php";

include "config.php";

    $cat_id = $_GET["cat"];
    $mysql = "Select * from book_category where book_cat_id= '$cat_id'";
    $result = mysqli_query($conn,$mysql);
    $row = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn,$mysql);
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(!isset($_SESSION['qty1'])){
        $_SESSION['qty1'] = array();
    }
?>

<!--  Banner start -->
<section class="banner pb-80 dark-bg">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-12 col-lg-12 mx-auto">
                <div class="banner-content col-lg-12 text-center">
                    <h1><?php echo $row["book_cat_description"]?></h1>
                    <a href="#" class="btn btn-main btn-dark-bg">Buy Now</a>  
                    <p>Interested in free chapter? <a href="#" class="text-color">Get it now</a></p>
                </div>
            </div>
           
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

<!--  Banner section ENd -->
<!--  Feature section Start -->
<section class="feature-2 section-padding dark-bg-light">
    <div class="container">
        <div class="row ">
            
        <?php 
            $mysql1 = "Select * from book_detail where book_cat_id= '$cat_id'";
            $result1 = mysqli_query($conn,$mysql1);
            while($row = mysqli_fetch_assoc($result1)){
                $arr=explode(",",$row['book_image']);
        ?>
            <div class="col-lg-4 col-md-6">
                <div class="feature-style-2 mb-4 mb-lg-0">
                    <img class="w-100" style="height:300px" src="data:jpg;charset=utf8;base64,<?php echo base64_encode($row['book_image']); ?>" alt="">
                    <div class="feature-text">
                        <h4><?php echo $row["book_name"]?></h4>
                        <p style="font-size:1.05rem;font-weight:bold" class="text-warning">PKR <?php echo $row["book_price"]?></p>
                        <p style="font-size:0.8rem"><?php echo $row["book_description"]?></p>
                        <a href="detail.php?id=<?php echo $row['book_id']?>" class="btn btn-main btn-dark-bg p-2">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
           
        </div>
    </div>
</section> 
<!-- Features end -->


<?php include "footer.php" ?>

<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>


    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <!--  Owl Carousel-->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
   
    <script src="assets/js/script.js"></script>
  

  </body>
  
<!-- Mirrored from themeturn.com/tf-db/bookhunt/bookhunt/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2022 15:03:03 GMT -->
</html>
   