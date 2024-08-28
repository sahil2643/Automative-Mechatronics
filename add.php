<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$conn = mysqli_connect("localhost", "root", "", "automative_mechatronics");

if(isset($_POST['addtocart'])) {
    if(isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "pid");
        if(!in_array($_GET['pid'], $session_array_id)) {
            $session_array = array(
                'pid' => $_GET['pid'],
                'name' => $_POST['name'],
                'image' => $_POST['image'],
                'price' => $_POST['price'],
                'qty' => $_POST['qty']
            );
            $_SESSION['cart'][] = $session_array;
        } else {
            // If item already exists in cart, increase quantity
            foreach($_SESSION['cart'] as &$item) {
                if($item['pid'] == $_GET['pid']) {
                    $item['qty'] += $_POST['qty'];
                }
            }
        }
    } else {
        $session_array = array(
            'pid' => $_GET['pid'],
            'name' => $_POST['name'],
            'image' => $_POST['image'],
            'price' => $_POST['price'],
            'qty' => $_POST['qty']
        );
        $_SESSION['cart'][] = $session_array;
    }
}




    // print_r($_SESSION['cart']);
    // exit;
// foreach ($session_array as $session_array) {
//     echo $session_array->$name;
//     echo $session_array->$price;
//     echo "<br>";
// }






// $select_product = "SELECT * FROM product WHERE pid = '$pid'";
// $selectProduct = mysqli_query($conn,$select_product);




?>

<!doctype html>
<html class="no-js" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Automative Mechatronics </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/animated-headline.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script></script>

    <style type="text/css">
        :root {
  --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
}




.btn {
  border: 5px solid   #00008B;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  border-image-source:  var(--gradient) !important; 
  text-decoration: none;
  transition: all .4s ease;
}

.btn:hover, .btn:focus {
      background: var(--gradient) !important;
  
  -webkit-text-fill-color: #fff !important;
  border: 5px solid #fff !important; 
  box-shadow: #222 1px 0 10px;
  text-decoration: underline;
}


------------------
    .shopping-cart{
    padding-bottom: 50px;
    font-family: 'Montserrat', sans-serif;
}

.shopping-cart.dark{
    background-color: #f6f6f6;
}

.shopping-cart .content{
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    background-color: white;
}

.shopping-cart .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.shopping-cart .block-heading p{
    text-align: center;
    max-width: 420px;
    margin: auto;
    opacity:0.7;
}

.shopping-cart .dark .block-heading p{
    opacity:0.8;
}

.shopping-cart .block-heading h1,
.shopping-cart .block-heading h2,
.shopping-cart .block-heading h3 {
    margin-bottom:1.2rem;
    color: #3b99e0;
}

.shopping-cart .items{
    margin: auto;
}

.shopping-cart .items .product{
    margin-bottom: 20px;
    padding-top: 20px;
    padding-bottom: 20px;
}

.shopping-cart .items .product .info{
    padding-top: 0px;
    text-align: center;
}

.shopping-cart .items .product .info .product-name{
    font-weight: 600;
}

.shopping-cart .items .product .info .product-name .product-info{
    font-size: 14px;
    margin-top: 15px;
}

.shopping-cart .items .product .info .product-name .product-info .value{
    font-weight: 5000;
}

.shopping-cart .items .product .info .quantity .quantity-input{
    margin: auto;
    width: 80px;
}

.shopping-cart .items .product .info .price{
    margin-top: 15px;
    font-weight: bold;
    font-size: 22px;
 }

.shopping-cart .summary{
    border-top: 2px solid #5ea4f3;
    background-color: #f7fbff;
    height: 100%;
    padding: 30px;
}

.shopping-cart .summary h3{
    text-align: center;
    font-size: 3em;
    font-weight: 600;
    padding-top: 20px;
    padding-bottom: 20px;
}

.shopping-cart .summary .summary-item:not(:last-of-type){
    padding-bottom: 10px;
    padding-top: 10px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.shopping-cart .summary .text{
    font-size: 2em;
    font-weight: 600;
}

.shopping-cart .summary .price{
    font-size: 2em;
    float: right;
}

.shopping-cart .summary button{
    margin-top: 20px;
}

@media (min-width: 768px) {
    .shopping-cart .items .product .info {
        padding-top: 25px;
        text-align: left; 
    }

    .shopping-cart .items .product .info .price {
        font-weight: bold;
        font-size: 22px;
        top: 17px; 
    }

    .shopping-cart .items .product .info .quantity {
        text-align: center; 
    }
    .shopping-cart .items .product .info .quantity .quantity-input {
        padding: 4px 10px;
        text-align: center; 
    }
}

.pinfo{
    font-size:15px;
    padding-top:10px;
}

.box
{
    width:100px;
    height:35px;
    border: 1px solid black;
    font-size:18px;
}

    </style>
</head>
<header>
    <!-- Header Start -->
      <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo1">
                            <a href="index.html"><img src="img/Screenshot_20240125_111959-modified (1).png" class="logo1" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                               
                                <ul id="navigation">
                                  
                                <li><a href="index.php">Home</a></li>
                                    <li><a href="product.php">products</a></li>
                                    <li><a href="order.php">My_order</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="aboutus.php">About us</a></li>

                                </ul>
                            </nav>
                        </div>          
                        <!-- Header-btn -->
                        <div>
                          <?php
                          $count=0;
                          if(isset($_SESSION['cart']))
                          {
                            $count=count($_SESSION['cart']);
                          }
                          ?>
                        <a href="add.php"><img src="img/shopping-cart.png" class="logo1" style="height:50px;" alt=""><span style="font-size:20px; margin:0 10px 0 5px">[<?php echo $count; ?>]<spam></a>
<?php
if(isset($_SESSION['email'])) {
    ?><div class="header-btns d-none d-lg-block f-right">
                          <a href="logout.php" class="btn">Logout</a>
                       </div>

                       <?php 
}else{
                       ?>
                       
                       <a href="log.php" class="btn">log in</a>
                       <?php
                       
}?>
                       <!-- Mobile Menu -->
                       <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Header End -->
</header>
<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70">
                            <h2>Add to Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
   <body>
   <?php
if(isset($_SESSION['email'])) {
    ?>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                            <?php
                                if(!empty($_SESSION['cart'])) {
                                    foreach($_SESSION['cart'] as $key => $value) {
                                        ?>
                                <div class="product">
                                    <div class="row">
                                        <div class="col-md-3 col-">
                                        <?php echo "<img src='admin_panel/image/".$value['image']."'class='img-fluid' style='height:250px; width:auto;'>";?>
                                            <!-- <img class="img-fluid mx-auto d-block image" src="img\gallery\cnc-tool-resharpening-250x250.webp" style="height:200px; width:auto;"> -->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="col-md-4 product-name">
                                                        <div class="product-name">
                                                            <a href="#" >Lorem Ipsum dolor</a>
                                                            <div class="product-info">
                                                            <?php if(isset($value['name'])) { ?>
                                                                <div class="pinfo">Name: <span class="value"><?php echo $value['name']; ?></span></div>
                                                                <?php } ?>
                                                                        <?php if(isset($value['price'])) { ?>
                                                                            <div class="pinfo">Price: <span class="value"><?php echo $value['price']; ?> per Piece</span></div>
                                                                <?php } ?>
                                                                <?php if(isset($value['qty'])) { ?>
                                                                            <div class="pinfo">Quantity: <span class="value"><?php echo $value['qty']; ?></span></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="button">
                                                        <!-- <a href="add.php?action=remove&pid=<?//php echo $value['pid']; ?>"><button class="btn btn-primary btn-lg btn-block" style=" margin-top:50px; margin-left:100px;">Remove</button></a> -->
                                                        <a href="add.php?action=remove&pid=<?php echo $value['pid'];?>" onclick="return confirmRemove(); "><img src="img/remove.png" class="logo1" alt="" style="margin-top:50px; margin-left:150px;"></a>

                                                    </div>
                                                    <!-- <div class="col-md-4 quantity mt-5">
                                                        <p>Quantity:</p>
                                                        <input id="quantity" type="number" value ="1" class="box form-control quantity-input">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <?php
                                    
                                    $total = $value['price'] * $value['qty'];

                                    $subtotal += $total;
                                    $_SESSION['total'] = $subtotal;
                                    // print_r($subtotal);
                                    
                                    }
                                }

                                if(isset($_GET['action']))
                                {
                                    if($_GET['action'] == "remove")
                                    {
                                        foreach($_SESSION['cart'] as $key => $value)
                                        {
                                            if($value['pid'] == $_GET['pid'])
                                            {
                                                unset($_SESSION['cart'][$key]);
                                            }
                                        }
                                    }
                                }
                                ?>
                                <?php
                                if(!empty($_SESSION['cart'])){
                                ?>
                                <center><a href="product.php#abcd"><button class="btn btn-primary" style="margin-left:15px;">Add More</button></a></center>
                                <?php
                                }else{
                                ?>
                                <center><a href="product.php#abcd"><button class="btn btn-primary" style="margin-top:150px;">Buy Now</button></a></center>
                                <?php
                                }
                                ?>
                                <!-- <?php //$quantity = $value['price'] * $value['qty']; -->
                                // echo $quantity; ?>
                                                          <!--  -->  </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php if($subtotal != ''){echo $subtotal;}else{echo "0";}?></span></div>
                                <div class="summary-item"><span class="text">Discount</span><span class="price">0</span></div>
                                <div class="summary-item"><span class="text">Shipping</span><span class="price">0</span></div>
                                <div class="summary-item"><span class="text">Total</span><span class="price"><?php if($subtotal != ''){echo $subtotal;}else{echo "0";}?></span></div>
                                <a href="shippingform.php"><button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button></a>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
        </section>
    </main>
    <?php
}else{
    ?>
        <center><h1 style="margin-top:50px; font-size:40px; color:green;">Please Login For Access Cart</h1><a href="log.php" class="btn" style="margin:30px 0 100px 0">log in</a></center>
    <?php
}
    ?>

 
<!--? Footer Start-->
<footer>
     <div class="footer-area lightgrey-bg">
        <div class="container">
            <div class="row"> 
                <!-- footer-last -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="flex-head">
                    <h2>Quick links</h2>
                </div>
                <div class="flex-link">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="product.html">Products</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="aboutus.html">About us</a></li>
                        <li><a href="add.html">Add to Cart</a></li>
                        <li><a href="order.html">MY Order</a></li>

                    </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="flex-head">
                    <h2>Contact Us</h2>
                </div>
                <div class="flex-link">
                    <ul>
                        <li><a href="#"><i class="fas fa-phone"></i> +91 9924178481</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> +91 8401492895</a></li>
                        <br>
                        <li><a href="#"><i class="fa-solid fa-address-book"></i> Udhoyog nagr 80 foot rod <br>Surendranagar,363001</a></li>
                    </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="flex-head">
                    <h2>info</h2>
                </div>
                <div class="flex-link">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-clock"></i> 6:00am - 10:00pm</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> Shivampatel00@gmail.com</a></li>
                         <li><a href="#"><i class="fas fa-envelope"></i> Umangpatel99.com</a></li>
                        <li><a href="feedback.html" target="_blank"><i class="fas fa-star"></i>Give feedback</a></li>
                    </ul>
                </div>
              </div>
            </div>
        
            <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>
            
            <div class="row text-center">
              <div class="col-md-4 box">
                <span class="copyright quick-links">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://www.Silver shol club.com" target="_blank">Sumit Gupta</a>
                </span>
              </div>
              <div class="col-md-4 box">
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="">
                    <i class="fab fa-youtube"></i>
                  </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="">
                    <i class="fab fa-instagram"></i>
                  </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
    
    </div>
</footer>
<!-- Footer End-->

               </div>
           </div>
       </div>
   </div>
</div>

<!-- JS here -->

<script src="./js/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./js/jquery-1.12.4.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./js/wow.min.js"></script>
<script src="./js/animated.headline.js"></script>
<script src="./js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./js/jquery.nice-select.min.js"></script>
<script src="./js/jquery.sticky.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./js/jquery.counterup.min.js"></script>
<script src="./js/waypoints.min.js"></script>
<script src="./js/jquery.countdown.min.js"></script>
<script src="./js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./js/contact.js"></script>
<script src="./js/jquery.form.js"></script>
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/mail-script.js"></script>
<script src="./js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->  
<script src="./js/plugins.js"></script>
<script src="./js/main.js"></script>
<script>
function confirmRemove() {
  if(confirm("Are you sure you want to remove this item from the cart?")) {
    // If the user confirms, proceed with the removal action
    reloadPage();
    return true;
  } else {
    // If the user cancels, prevent the link from being followed
    return false;
  }
  function reloadPage() {
    location.reload();
}
setTimeout(function() {
    reloadPage();
}, 20);
}



    
</script>

</body>
</html>