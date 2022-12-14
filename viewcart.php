<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    body{
  padding: 1em;
  background-image: url(https://subtlepatterns.com/patterns/retina_wood.png);
  font-family: arial;
}

img {
  width: 100%;
  max-width: 100%;
}

*{
    box-sizing:border-box;
    -moz-box-sizing:border-box; /* Firefox */
    -webkit-box-sizing:border-box; /*Chrome and Safari*/
 /*  outline: 1px grey solid; */
}

a{
  color: #739931;
}

.page{
  max-width: 78%;
  margin: 0 auto;
}

.page * {
  padding: 0;
  margin: 0;
}

/* Mobile */

#store_cart {
  float: left;
  width: 100%;
}

/* cart header */

.cart_head {
  float: left;
  width: 100%;
  display: table;
  background: #1F1F1F;
  color: white;
background: rgb(69,72,77);
background: -moz-linear-gradient(top,  rgba(69,72,77,1) 0%, rgba(34,34,34,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,1)), color-stop(100%,rgba(34,34,34,1)));
background: -webkit-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(34,34,34,1) 100%);
background: -o-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(34,34,34,1) 100%);
background: -ms-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(34,34,34,1) 100%);
background: linear-gradient(to bottom,  rgba(69,72,77,1) 0%,rgba(34,34,34,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#222222',GradientType=0 );


}

.cart_head li {
  vertical-align: middle;
  padding: 12px;
  font-size: 18px;
  float: left;
}

/* cart header cells */

.cart_head_title {
  display: table-cell;
  width: 100%;
}
.cart_head_product {
  display: none;
}
.cart_head_options {
  display: none;
}
.cart_head_price {
  display: none;
}

/* cart header pseudo-class */

.cart_head li:focus {}
.cart_head li:last-child {}

/* cart item */

.cart_item {
  float: left;
  width: 100%;
  display: table;
  background: #fff;
  border: 1px solid #555;
  border-top: none;

}

.cart_item li {
  vertical-align: middle;
  padding: 9px;
  font-size: 0.8em;
  float: left;
}

.cart_item li p {
  font-size: 1.3em;
}

.cart_item li span {
  font-size: 0.9em;
}

.cart_item li h2 {
  font-size: 1.1em;
}

/* cart item cells */

.cart_img_col {
  display: inline-block;
  width: 30%;
  text-align: center;
  background-image: url(https://i.imgur.com/3P8WF5D.jpg);
  background-size: 90%;
  background-position: center center;
  background-repeat: no-repeat;
  height: 100px;
}

.cart_img_col img {
  display: none;
}

.cart_product_col {
  display: inline-block;
  width: 70%;
  padding-bottom: 0 !important;
}

.cart_options_col {
  display: inline-block;
  width: 30%;
}
.cart_options_col input {
  width: 48px;
}
.cart_price_col {
  text-align: center;
  display: inline-block;
  width: 20%;
}
.cart_del_col {
  display: inline-block;
  width: 20%;
  text-align: center;
}
.cart_del_col img {
  max-width: 25px;
  cursor: pointer;
}
.cart_del_col img:hover {
  opacity: 0.8;
}

/* cart item pseudo-class */

.cart_item:first-child {}
.cart_item:last-child {}
.cart_item li:first-child {}
.cart_item li:last-child {}


/* Tablet */
@media only screen and (min-width: 481px) {

/* cart item */

.cart_item {
  height: 100px;
}

.cart_head li {
  float: none;
  font-size: 1em;
}

.cart_item li {
  float: none;
}

.cart_item li p {
  font-size: 1.2em;
}

.cart_item li span {
  font-size: 1em;
}

.cart_item li h2 {
  font-size: 1em;
}

/* cart header cells */

.cart_head_title {
  display: none;
}
.cart_head_product {
  display: table-cell;
  width: 45%;
}
.cart_head_options {
  display: table-cell;
  width: 18.5%;
}
.cart_head_price {
  display: table-cell;
  width: 21.625%;
}

/* cart item cells */

.cart_img_col {
  width: 15%;
  display: table-cell;
  background-image: none;
}

.cart_img_col img {
  max-width: 60px;
  display: inline-block;
  height: auto;
}

.cart_product_col {
  display: table-cell;
  width: 30%;
  padding-bottom: 12px !important;
}

.cart_options_col {
  display: table-cell;
  width: 18.5%;
}

.cart_price_col {
  display: table-cell;
  width: 11.625%;
}

.cart_del_col {
  display: table-cell;
  width: 9%;
}

.cart_item li:nth-child(even) {
    background: rgba(0,0,0, 0.1);

}

.cart_head li:nth-child(odd) {
  background: rgba(255, 255, 255, 0.1);
}

}

/* Desktop */

@media only screen and (min-width: 769px) {

/* cart item */

.cart_head li:nth-child(even) {
  background: rgba(255, 255, 255, 0.1);
}

.cart_head li:nth-child(odd) {
  background: none;
}

.cart_item {
  height: 10px;
}

.cart_head li {
  font-size: 1.1em;
}

.cart_item li p {
  font-size: 1.4em;
  font-weight: 700;
}

.cart_item li span {
  font-size: 1em;
}

.cart_item li h2 {
  font-size: 1.4em;
}

/* cart header cells */

.cart_head_title {
  display: table-cell;
  width: 15%;
}
.cart_head_product {
  width: 45%;
}
.cart_head_options {
  width: 19.5%;
}
.cart_head_price {
  width: 18.5%;
}

/* cart item cells */

.cart_img_col {
}

.cart_img_col img {
  max-width: 75px;
}

.cart_product_col {
  width: 45%;
}

.cart_price_col {
  width: 11.625%;
}

.cart_options_col {
  width: 19.5%;
}

.cart_del_col {
  width: 6.875%;
}

}

   </style>
</head>
<body>
    
    <?php
    include "config.php";
    session_start();
    $mysql="SELECT * from book_detail where book_id IN (".implode(",",$SESSION['cart']).")";
    $result=mysqli_query($conn,$mysql);
    $i=0;
    ?>
    <div class="page">
        <div id="store_cart">
            <ul class="cart_head">
                <li class="cart_head_title">
                    My Cart
                </li>
                <li class="cart_head_product">
                    Product
                </li>
                <li class="cart_head_options">
                    Edit
                </li>
                <li class="cart_head_price">
                    Price
                </li>
            </ul>
     <?php
     while($row=mysqli_fetch_assoc($result)){
        $images=explode(",",$row['book_image']) ;
     ?>
            <ul class="cart_item">
    
                <li class="cart_img_col">
                    <img src="images/<?php echo $images[0]?>">
                </li>
    
                <li class="cart_product_col">
                    <p><?php echo $row['book_name'] ?></p>
                    <span>price: <?php echo $row['book_price']?></span>
                </li>
                 
                  <li class="cart_options_col">
                    <span>Quantity: </span>
            <input type="number" min="1" value="<?php echo $SESSION['qty'][$i]?>">
                </li>
    
                <li class="cart_price_col">
                    <h2>PKR<?php echo $row['book_price'] * $SESSION['qty'][$i]?></h2>
                </li>
                <li class="cart_del_col text-danger">
            <img src="https://i.imgur.com/bI4oD5C.png">
                </li>
            </ul>
    <?php
    $i++;
     }
    ?>
            <!-- <ul class="cart_item">
    
                <li class="cart_img_col">
                    <img src="https://i.imgur.com/3P8WF5D.jpg">
                </li>
    
                <li class="cart_product_col">
                    <p>SX Max Pro Lite</p>
                    <span><strong>Size: </strong>Medium</span>
                </li>
                 
                  <li class="cart_options_col">
                    <span>Quantity: </span>
                    <input type="number" min="1" value="1">
                </li>
    
                <li class="cart_price_col">
                    <h2>$399</h2>
                </li>
                <li class="cart_del_col">
            <img src="https://i.imgur.com/bI4oD5C.png">
                </li>
            </ul> -->
    
        </div>
    </div>
</body>
</html>