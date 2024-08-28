<?php
// error_reporting(E_ERROR | E_PARSE);
session_start();
$conn = mysqli_connect("localhost","root","","automative_mechatronics");

$select_order = "SELECT * FROM orders";
$selectOrder = mysqli_query($conn,$select_order);

    // Assuming you have already connected to the database
    

    

    // Query to fetch data from multiple tables using JOIN
    $sql = "SELECT 
                shipping.name AS shipping_name,
                shipping.phone AS shipping_number,
                shipping.email AS shipping_email,
                shipping.gst AS shipping_gst,
                shipping.address AS shipping_address,
                shipping.location AS shipping_location,
                orders.oid,
                orders.name,
                orders.price,
                orders.qty,
                orders.status,
                orders.date,
                payment.total_amount
            FROM 
                shipping
            INNER JOIN 
                orders ON shipping.sid = orders.sid
            INNER JOIN 
                payment ON orders.oid = payment.oid";

    $result = mysqli_query($conn, $sql);

    
            // echo "Name: " . $row["shipping_name"] . "<br>";
            // echo "Number: " . $row["shipping_number"] . "<br>";
            // echo "Email: " . $row["shipping_email"] . "<br>";
            // echo "GST: " . $row["shipping_gst"] . "<br>";
            // echo "Address: " . $row["shipping_address"] . "<br>";
            // echo "Location: " . $row["shipping_location"] . "<br>";
            // echo "oid: " . $row["oid"] . "<br>";
            // echo "Product Name: " . $row["name"] . "<br>";
            // echo "Price: " . $row["price"] . "<br>";
            // echo "Quantity: " . $row["qty"] . "<br>";
            // echo "status: " . $row["status"] . "<br>";
            // echo "Total Amount: " . $row["total_amount"] . "<br>";
            // echo "date: " . $row["date"] . "<br>";
            


            if(isset($_POST['accept']))
              {
                $orderid = $_GET['oid'];
                print_r($orderid);
                exit;
                // $statusaccept = "Accept";
                // $sql = "UPDATE INTO orders SET status = '$statusaccept' WHERE oid = ''"
              }
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
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
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

.container {
  /* max-width: 800px; */
  /* margin: 50px auto; */
  padding: 20px;
  /* background-color: #fff; */
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
  text-align: center;
}

.order-details {
  margin-bottom: 70px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, table td {
  padding: 10px;
  border: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}

.decision-buttons {
  text-align: center;
  margin-top: 20px;
}

.accept-btn,
.reject-btn {
  padding: 10px 20px;
  margin: 0 10px;
  font-size: 16px;
  cursor: pointer;
  border: none;
  border-radius: 4px;
  transition: box-shadow 0.3s ease, transform 0.3s ease;
  
}

.accept-btn:hover,
.reject-btn:hover {
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
  transform: translateY(-2px);
}


.accept-btn {
  background-color: #4caf50;
  color: #fff;
  width:150px;
}

.reject-btn {
  background-color: #f44336;
  color: #fff;
  width:150px;
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
                <a class="nav-link" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
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
          </div>
        </div>
      </nav>
      <div class="container">
    <h1>Product Purchase Details</h1>
    <?php
  
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {

        $name = explode(",",$row['name']);
        $price = explode(",",$row['price']);
        $qty = explode(",",$row['qty']);

        $count = count($name);
        if($row['shipping_location'] == $_SESSION['location'])
        {
        if($row['status'] == "Panding")
        {
    ?>
    <div class="order-details" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 20px; padding:10px 0;">
      <h2>Order <?php echo $row["oid"]; ?></h2>
      <p style="margin-left:10px;"><strong>Customer:</strong> <?php echo $row["shipping_name"]; ?></p>
      <p style="margin-left:10px;"><strong>Order Date:</strong> <?php echo $row["date"]; ?></p>
      <p style="margin-left:10px;"><strong>order Status:</strong> <?php echo $row["status"]; ?></p>
      <table>
        <thead>

          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for($i = 0; $i < $count; $i++){
          ?>
          <tr>
            <td><?php echo $name[$i]; ?></td>
            <td><?php echo $qty[$i]; ?></td>
            <td>₹<?php echo $price[$i]; ?></td>
          </tr>
          <?php
          }
          ?>
          <!-- Add more product rows as needed -->
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"><strong>Total:</strong></td>
            <td>₹<?php echo $row["total_amount"]; ?></td>
          </tr>
        </tfoot>
      </table>
      <div class="decision-buttons my-4">
      <!-- <button class="accept-btn">Accept Order</button> -->
      <form action="statuschange.php" method="POST">
        <input type="hidden" name="oid" value="<?php echo $row['oid']; ?>">
        <input type="submit" name="accept" value="Accept" class="accept-btn">
        <input type="submit" name="reject" value="Reject" class="reject-btn">
      </form>

      <!-- <button class="reject-btn">Reject Order</button> -->
    </div>
    </div>
    <?php
        }
      }
    }
    }
    ?>
  </div>
  </body>
</html>






