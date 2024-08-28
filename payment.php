<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "automative_mechatronics");

$cart = $_SESSION['cart'];

foreach ($cart as $item) {
    $pid[] = $item['pid'];
    $name[] = $item['name'];
    $image[] = $item['image'];
    $price[] = $item['price'];
    $qty[] = $item['qty'];
}

$pid = implode(",",$pid);
$name = implode(",", $name);
$image = implode(",", $image);
$price = implode(",", $price);
$qty = implode(",", $qty);

$email = $_SESSION['email'];

$select_id = "SELECT rid FROM register WHERE email = '$email'";
$selectId = mysqli_query($conn, $select_id);

$row = mysqli_fetch_assoc($selectId);
$rid = $row['rid'];
$sid = $_SESSION['sid'];

$status = "Panding";
$sql_order = "INSERT INTO orders (pid,rid,sid, name, image, price, qty, status) VALUES ('$pid','$rid','$sid', '$name', '$image', '$price', '$qty', '$status')";

if (isset($_POST['submit'])) {
    $card_number = $_POST['card_number'];
    $exp = $_POST['exp'];
    $total = $_SESSION['total'];

    if (mysqli_query($conn, $sql_order)) {
        $oid = mysqli_insert_id($conn);

        $sql_payment = "INSERT INTO payment (oid, email, card_number,  exp,total_amount) VALUES ('$oid', '$email', '$card_number',  '$exp','$total')";

        if (mysqli_query($conn, $sql_payment)) {
            header("location:order.php");
            foreach($_SESSION['cart'] as $key => $value)
                {
                        unset($_SESSION['cart'][$key]);   
                }
        } else {
            echo "Error inserting payment: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting order: " . mysqli_error($conn);
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Form</title>
        <link href="paymentform.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/pay.css">

        <style>
        .exp{
            padding: 14px 10px 14px 50px;
        width: 99%;
        background-color: #fcfcfc;
        border: 1px solid #00000033;
        outline: none;
        letter-spacing: 1px;
        transition: 0.3s;
        border-radius: 3px;
        color: #333;
        }
        .error {
    color: red;
  }
</style>
    </head>

    <body>
        <div class="wrapper">
            <h2>Payment Form</h2>
            <form method="POST" action="payment.php" id="cvvForm">
                <h1 style="color:green;">Total Payable Amount : <?php echo $_SESSION['total']; ?></h1><br>
                <div class="input-group">
                    <div class="input-box">
                        <h4>Payment Details</h4>
                        <input type="radio" name="pay" id="bc1" checked class="radio">
                        <label for="bc1"><span><i class="fa fa-cc-visa" style="margin-right:7px;"></i>Card Payment</span></label>
                        
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <input type="tel" name="card_number" placeholder="Card Number" required class="name">
                        <i class="fa fa-credit-card icon"></i>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                    <input type="month" name="exp" class="exp" value="2024-02" min="2024-01" max="2040-12">
                    </div>
                </div>
                <div class="input-group">
                <div class="input-box">
                    <!-- <input type="tel" placeholder=" CVV" required class="name" style="width:100px;"> -->
                    <!-- <i class="fa fa-user icon"></i> -->
                    <div class="input-box">
                    <input type="tel" placeholder="CVV" required class="name" style="width:100px;" id="cvvInput">
    <span id="cvvError" class="error"></span>
    <br> 
                </div>
    </div>
    <br>

                <div class="input-group">
      
                    <center> <a href="paymentdone.php"><input type="submit" style="width:200px; height:50px;" value="submit" name="submit" class="btn btn-primary mt-5 w-75"></a></a></center>
                    </div>
                </div>
            </form>
        </div>
        <script>
    document.getElementById('cvvForm').addEventListener('submit', function(event) {
      var cvvInput = document.getElementById('cvvInput').value;
      var cvvError = document.getElementById('cvvError');
      
      if (!/^\d{3}$/.test(cvvInput)) {
        cvvError.textContent = 'CVV must be a 3-digit number';
        event.preventDefault(); // Prevent form submission
      } else {
        cvvError.textContent = ''; // Clear previous error message
      }
    });
  </script>
    </body>

    </html>