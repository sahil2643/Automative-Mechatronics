<?php
session_start();
$conn=mysqli_connect("localhost","root","","automative_mechatronics");



if(isset($_SESSION['email'])){


$email = $_SESSION['email'];
$select_id = "SELECT rid FROM register WHERE email = '$email'";
$selectId = mysqli_query($conn,$select_id);

$row = mysqli_fetch_assoc($selectId);
$rid = $row['rid'];


$select_order = "SELECT * FROM orders WHERE rid = $rid";
$selectOrder = mysqli_query($conn,$select_order);
}
            // echo "Name: " . $name[$i] . ", ";
            // echo "Image: " . $image[$i] . ", ";
            // echo "Price: " . $price[$i] . ", ";
            // echo "Quantity: " . $qty[$i] . "<br>";

            // echo $name[$i];
            // echo $image[$i];
        

// exit;

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Assistant');
body {
  background: #eee;
  font-family: Assistant, sans-serif;
}
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
.container-fluid {
            /* margin-top: 200px ; */
        }

        p {
            font-size: 14px;
            margin-bottom: 7px;

        }

        .small {
            letter-spacing: 0.5px !important;
        }

        .card-1 {
            box-shadow: 2px 2px 10px 0px rgb(190, 108, 170);
        }

        hr {
            background-color: rgba(248, 248, 248, 0.667);
        }


        .bold {
            font-weight: 500;
        }

        .change-color {
            color: #AB47BC !important;
        }

        .card-2 {
            box-shadow: 1px 1px 3px 0px rgb(112, 115, 139);

        }

        .fa-circle.active {
            font-size: 8px;
            color: #AB47BC;
        }

        .fa-circle {
            font-size: 8px;
            color: #aaa;
        }

        .rounded {
            border-radius: 2.25rem !important;
        }


        .progress-bar {
            background-color: #AB47BC !important;
        }


        .progress {
            height: 5px !important;
            margin-bottom: 0;
        }

        .invoice {
            position: relative;
            top: -70px;
        }

        .Glasses {
            position: relative;
            top: -12px !important;
        }

        .card-footer {
            background-color: #AB47BC;
            color: #fff;
        }

        h2 {
            color: rgb(78, 0, 92);
            letter-spacing: 2px !important;
        }

        .display-3 {
            font-weight: 500 !important;
        }

        @media (max-width: 479px) {
            .invoice {
                position: relative;
                top: 7px;
            }

            .border-line {
                border-right: 0px solid rgb(226, 206, 226) !important;
            }

        }

        @media (max-width: 700px) {

            h2 {
                color: rgb(78, 0, 92);
                font-size: 17px;
            }

            .display-3 {
                font-size: 28px;
                font-weight: 500 !important;
            }
        }

        .card-footer small {
            letter-spacing: 7px !important;
            font-size: 12px;
        }

        .border-line {
            border-right: 1px solid rgb(226, 206, 226)
        }
 



        .okay {
  border: 2px solid   #00008B;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  border-image-source:  var(--gradient) !important; 
  text-decoration: none;
  transition: all .4s ease;
  height:35px;
  width:100px;
  margin-right:10px;
  margin-top:10px;
  font-size:18px;
}

.okay:hover, .btn:focus {
      background: var(--gradient) !important;
  
  -webkit-text-fill-color: #fff !important;
  border: 2px solid #fff !important; 
  box-shadow: #222 1px 0 10px;
  text-decoration: underline;
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
                            <a href="index.php"><img src="img/Screenshot_20240125_111959-modified (1).png" class="logo1" alt=""></a>
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
                            <h2>Order History</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <body class="black-bg">
        <?php
        if(isset($_SESSION['email'])){
        ?>
    <div class="container my-5   justify-content-center">
        <div class="card card-1">
            <div class="card-header bg-white">
                <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                   
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between mb-3">
                    <div class="col-auto"> <h6 class="color-1 mb-0 change-color"></h6> </div>
                    <div class="col-auto  "> <small></small> </div>
                </div>
                <center><h1 style="font-size:40px; margin-bottom:50px;">Your Product Purchase History</h1></center>
                <div class="row">
                    <div class="col">
                        <div class="card card-2">
                            <?php
                            if(mysqli_num_rows($selectOrder)) {
                                while($sel_order = mysqli_fetch_assoc($selectOrder)) {
                                    $name = explode(',', $sel_order['name']);
                                    $image = explode(',', $sel_order['image']);
                                    $price = explode(',', $sel_order['price']);
                                    $qty = explode(',', $sel_order['qty']);
                            
                                    // Assuming all arrays have the same length
                                    $count = count($name);
                            
                                    for ($i = 0; $i < $count; $i++) {
                            ?>
                              <div class=" border-danger border-top">
                            <div class="card-body">
                                <h3>Date : <?php echo $sel_order['date']; ?></h3>
                                <div class="media">
                                    <div class="sq align-self-center "> 
                                        <!-- <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="https://i.imgur.com/RJOW4BL.jpg" width="135" height="135" />  -->
                                    <?php echo "<img src='admin_panel/image/".$image[$i]."'class='img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0' style='height:135px; width:135px;'>";?>
</div>
                                    <div class="media-body my-auto text-left">
                                        <div class="row  my-auto flex-column flex-md-row">
                                            <div class="col " style="margin-left:10px; margin-top:20px;"> <h2 class="mb-0">Name: <?php echo $name[$i]; ?></h2>  </div>
                                          
                                            <div class="col "  style="margin-left:5px; margin-top:20px;"><h3>Qty : <?php echo $qty[$i]; ?></h3></div>
                                            <div class="col "  style="margin-left:5px; margin-top:20px;"><h3>Price : &#8377;<?php echo $price[$i]; ?></h3></div>
                                            <div class="col " style="margin-right:100px;  margin-top:20px;"><h3 class="mb-0">Total Amount: &#8377;<?php echo $price[$i]*$qty[$i]; ?></h3 >
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3 ">
                                <div class="row">
                                    
                                    <div class="col mt-auto">
                                       
                                        <div class="media row justify-content-between ">
                                            <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2"></small> <i class=""></i> </span></div>
                                            <!-- <div class="flex-col"> <span> <small class="text-right mr-sm-2"></small><i class="fa fa-circle active"></i></span></div> -->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php
                        }?>
                        <center><button class="okay" style="margin-bottom:50px;"><a href="billingpage.php?oid=<?php echo $sel_order['oid']; ?>">View Bil</a></button></center>
                        
                        <?php
                    }
                }
                            ?>
                           
                        </div>
                    </div>
                </div>
               
                <!-- <div class="row mt-4">
                    <div class="col">
                        <div class="card card-2">
                            <div class="card-body">
                                <div class="media">
                                    <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="https://i.imgur.com/fUWWpRS.jpg" width="135" height="135" /> </div>
                                    <div class="media-body my-auto text-right">
                                        <div class="row  my-auto flex-column flex-md-row">
                                            <div class="col-auto my-auto "> <h6 class="mb-0"> Michel Mark</h6> </div>
                                            <div class="col my-auto  "> <small>Black Rim </small></div>
                                          
                                            <div class="col my-auto  "> <small>Qty : 1</small></div>
                                            <div class="col my-auto ">  <h6 class="mb-0">&#8377;1,235.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3 ">
                                <div class="row ">
                                   
                                    <div class="col mt-auto">
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row mt-4">
                    <div class="col">
                        <div class="row justify-content-between">
                            <div class="col-auto"><p class="mb-1 text-dark"><b>Order Details</b></p></div>
                            <div class="flex-sm-col text-right col"> <p class="mb-1"><b>Total</b></p> </div>
                            <div class="flex-sm-col col-auto"> <p class="mb-1">&#8377;4,835</p> </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Discount</b></p> </div>
                            <div class="flex-sm-col col-auto"><p class="mb-1"> No Discount</p></div>
                        </div>
                        
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col"><p class="mb-1"><b>Delivery Charges</b></p></div>
                            <div class="flex-sm-col col-auto"><p class="mb-1">Free</p></div>
                        </div>
                    </div>
                </div> -->
                
            </div>
            <!-- <div class="card-footer">
                <div class="jumbotron-fluid">
                    <div class="row justify-content-between ">
                        <div class="col-sm-auto col-auto my-auto"><img class="img-fluid my-auto align-self-center " src="img/Screenshot_20240125_111959-modified (1).png" width="115" height="115"></div>
                        <div class="col-auto my-auto "><h2 class="mb-0 font-weight-bold">TOTAL PAID</h2></div>
                        <div class="col-auto my-auto ml-auto"><h1 class="display-3 ">&#8377; 5,528</h1></div>
                    </div>
                    <div class="row mb- mt-3 mt-md-0">
                        
                        <div class="col-auto "><small class="text-white">GSTN:268FD07EXX </small> </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <?php
        }else{
    ?>
        <center><h1 style="margin-top:50px; font-size:40px; color:green;">Please Login For See your order history</h1><a href="log.php" class="btn" style="margin:30px 0 100px 0">log in</a></center>

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="add.php">Add to Cart</a></li>
                        <li><a href="order.php">MY Order</a></li>

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
                        <li><a href="feedback.php" target="_blank"><i class="fas fa-star"></i>Give feedback</a></li>
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
<!-- end -->

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

</body>
</html>