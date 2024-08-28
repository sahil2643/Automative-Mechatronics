<?php

// error_reporting(E_ERROR | E_PARSE);
$conn=mysqli_connect("localhost","root","","automative_mechatronics");

// $buyid=$_GET['buyid'];

session_start();

$email = $_SESSION['email'];

$sel_address = "SELECT * FROM register WHERE email = '$email'";
$selAddress = mysqli_query($conn,$sel_address);

if( mysqli_num_rows($selAddress) == 1){
$row = mysqli_fetch_assoc($selAddress);
}



// $total = $_SESSION['total'];
// print_r($_SESSION['total']);



// $cart = $_SESSION['cart'];

// foreach($cart as $item){
//   $name[] = $item['name'];
//   $image[] = $item['image'];
//   $price[] = $item['price'];
//   $qty[] = $item['qty'];
// }

// $name = implode(",",$name);
// $image = implode(",",$image);
// $price = implode(",",$price);
// $qty = implode(",",$qty);


// // print_r($name);
// // print_r($image);
// // print_r($price);
// // print_r($qty);
//   $email = $_SESSION['email'];

//   $select_id = "SELECT rid FROM register WHERE email = '$email'";
//   $selectId = mysqli_query($conn,$select_id);

//   $row = mysqli_fetch_assoc($selectId);
//   $rid = $row['rid'];
//   // echo $rid;
//   // exit;


  


//   // print_r($row['name']);
//   // exit;

  
// $sql = "INSERT INTO orders (rid , name, image, price, qty) VALUES ('$rid','$name','$image','$price','$qty')";

// $insert_data = mysqli_query($conn,$sql);



// if($buyid != '')
// {
//   $_SESSION['buyid']=$buyid;
// }



if(isset($_POST['submitdata']))
{
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gst=$_POST['gst'];
    $address=$_POST['address'];
    $location=$_POST['location'];

    $insert_data="INSERT INTO shipping(name,phone,email,gst,address,location) VALUES('$name','$phone','$email','$gst','$address','$location')";
    $insertData=mysqli_query($conn,$insert_data);

    $sid = mysqli_insert_id($conn);
    $_SESSION['sid'] = $sid;

    if($insertData !='')
    {
      header("location:payment.php");
    }
}


?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Automative Mechatronics  </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
    <style type="text/css">
        :root {
  --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
}



.card {
  background: #222;
  border: 1px solid #dd2476;
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
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
.extra:hover{

   transform: translateY(-20px);
   transition: 0.3s;
 }
 .wrapper {
  height: 420px;
  width: 654px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 420px;
  width: 327px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 420px;
  width: 327px;
  border-radius: 0 7px 10px 7px;
  background-color: #ffffff;
}

.product-text {
  height: 300px;
  width: 327px;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 52px;
  font-size: 34px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  margin: 0 0 47px 38px;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #d2d2d2;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
  height: 103px;
  width: 327px;
  margin-top: 17px;
  position: relative;
}

.product-price-btn p {
  display: inline-block;
  position: absolute;
  top: -13px;
  height: 50px;
  font-family: 'Trocchi', serif;
  margin: 0 0 0 38px;
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn button {
  float: right;
  display: inline-block;
  height: 50px;
  width: 176px;
  margin: 0 40px 0 16px;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: #ffffff;
  background-color: #9cebd5;
  cursor: pointer;
  outline: none;
}

.product-price-btn button:hover {
  background-color: #79b0a1;
}

    

.login {
            height: 940px;
            width: 100%;
            background: radial-gradient();
            position: relative;
        }

        .login_box {
            width: 1090px;
            height: 700px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: ;
            border-radius: 10px;
            box-shadow: 1px 4px 22px -8px #0004;
            display: flex;
            overflow: hidden;
        }

        .login_box .left {
            width: 41%;
            height: 100%;
            padding: 25px 25px;

        }

        .login_box .right {
            width: 59%;
            height: 100%
        }

        .left .contact {
            display: flex;
            align-items: center;
            justify-content: center;
            align-self: center;
            height: 100%;
            width: 73%;
            margin: auto;
        }

        .left h3 {
            text-align: center;
            margin-bottom: 40px;
        }

        .left input {
            border: none;
            width: 80%;
            margin: 15px 0px;
            border-bottom: 1px solid #4f30677d;
            padding: 7px 9px;
            width: 100%;
            overflow: hidden;
            background: transparent;
            font-weight: 600;
            font-size: 14px;
        }

        .left {
            background: linear-gradient(-45deg, #dcd7e0, #fff);
        }

        .submit {
            border: none;
    padding: 15px 70px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 120px;
    background: ;
    color: black;
    font-weight: bold;
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    transition: transform 0.3s, box-shadow 0.3s; 
        }

      

        .right .right-text {
            height: 100%;
            position: relative;
            transform: translate(0%, 45%);
        }

        .right-text h2 {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 50px;
            font-weight: 500;
        }

        .right-text h5 {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 19px;
            font-weight: 400;
        }

        .radio input {
            margin: 0;
            padding: 0;
            width: 10%;
            margin-left: 20px;
        }

        .radio p {
            font-size: 20px;
            margin: 7px;
        }

        /* Add styles for the dropdown container */
        #distributorDropdown {
            display: none;
            margin-top: 15px;
        }
        .submit:hover {
    transform: scale(1.1); /* Zoom in by 10% on hover */
    box-shadow: 0px 12px 20px -11px rgba(88, 54, 114, 1);
    background:#ADA09C; /* Increase shadow on hover */
}

.locations
{
  background: linear-gradient(-45deg, #dcd7e0, #fff);

}



</style>
</head>
 <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70">
                            <h2>Shipping form</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<body >
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
    <!--? slider Area Start-->
 
<body >
    
<!-- <form action="payment.php" method="post">
<input type="hidden" value="<?php echo $name; ?>" name="name">
<input type="hidden" value="<?php echo $price; ?>" name="price">
<input type="hidden" value="<?php echo $image; ?>" name="image">
<input type="hidden" value="<?php echo $qty; ?>" name="qty">
<input type="submit">
</form> -->
<section class="login">
    <div class="login_box">
      <div class="left">
       
        <div class="contact">
          <form action="" method="post">
            <h2>Shipping form</h2>
            <input type="text" name="name"placeholder="Frist Name" value="<?php echo $row['name']; ?>" Required>
            <input type="number" name="phone"placeholder="Phone Number" value="<?php echo $row['phone'] ?>" Required>
            <input type="hidden" name="email"placeholder="E-mail" value="<?php echo $_SESSION['email'];?>">
            <input type="text" name="gst"placeholder="Gst number" value="<?php echo $row['gst'] ?>" Required>
            <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" Required>
            <input type="hidden" name="price" value="<?php echo $price ?>" Required>
           
           <!-- <label for="location" >Select your location</label> -->
  <select class="locations" name="location" id="location" Required  >
    <option value=""  >--Select location--</option>
    <option value="ahmedabad">ahmedabad</option>
    <option value="botad">botad</option>
    <option value="rajkot">rajkot</option>
    <option value="morbi">morbi</option>
    <option value="surat">surat</option>
  </select>
            <a href="payment.php"><input type="submit" id="rzp-button1" name="submitdata" class="submit" style="margin-top: 70px;"></a>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text">
          <h2>Automative Mechatronics</h2>
          <h5>CNC Tools</h5>
        
    </div>
  </section>
  




    
               </div>
           </div>
       </div>
   </div>
</div>
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

</body>
</html>