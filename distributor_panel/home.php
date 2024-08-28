<?php
session_start();  

// name,phone,email,gst,address,productname,price,qty,totalamount

$conn = mysqli_connect("localhost","root","","automative_mechatronics");
$email = $_SESSION['email'];
$select_name = "SELECT * FROM distributor WHERE email = '$email'";
$selName = mysqli_query($conn,$select_name);

while($sel_name = mysqli_fetch_assoc($selName))
{
  $row = $sel_name;
}

$_SESSION['location'] = $row['location'];
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
       body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

.container {
  /* max-width: 800px;
  margin: 50px auto; */
  padding: 20px;
  /* background-color: #fff; */
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
        .heading{
            color: green;
            margin-top: 50px;
            text-align: center;
        }
        .gradient-custom {
    /* fallback for old browsers */
    background: #4facfe;
  
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right,  #41484F,#28313B);
  
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #41484F, #28313B)
  }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        
    <title>Distributor Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light gradient-custom">
        <div class="container">
          <a class="navbar-brand" href="#">Admin_panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="orders.php">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pandingorders.php">Panding_Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="deliveredorders.php">delivered_Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="rejectorders.php">rejected_Orders</a>
              </li>
            </ul>
            <?php
            if(isset($_SESSION['email'])){
            ?>
            <a href="logout.php"> <button class="btn btn-outline-danger" type="submit">Logout</button></a>
         
         <?php
            }else{
              header("location:log.php");
            }
            ?> 
            <!-- <a href="log.php"> <button class="btn btn-outline-danger" type="submit">Login</button></a> -->
          </div>
        </div>
      </nav>
      <div class="container">
      <h1 class="heading my-s">Welcome <br><?php echo $row['name']; ?></h1>
    </div>
  </body>
</html>