<?php
$conn = mysqli_connect("localhost","root","","automative_mechatronics");

$select_payment = "SELECT * FROM payment";
$selectPayment = mysqli_query($conn,$select_payment);


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
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Admin Payments</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                <a class="nav-link" href="user.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="payments.php">payments</a>
              </li>
            </ul>
            <form class="d-flex">
              <a href="logout.html"> <button class="btn btn-outline-danger" type="submit">Logout</button></a>
            </form>
          </div>
        </div>
      </nav>
      <div class="container">
      <h1 class="my-5">All Payments</h1>
      <table class="table">
      <thead>
        <tr>
        <th scope="col">pay_id</th>
        <th scope="col">oid</th>
        <th scope="col">email</th>
        <th scope="col">card_number</th>
        <th scope="col">exp</th>
        <th scope="col">total_amount</th>
        <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($selectPayment))
        {
          while($row = mysqli_fetch_assoc($selectPayment))
          {
        ?>
        <tr>
        <th><?php echo $row['pay_id']; ?></th>
        <th><?php echo $row['oid']; ?></th>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['card_number']; ?></td>
        <td><?php echo $row['exp']; ?></td>
        <td><?php echo $row['total_amount']; ?></td>
        <td><a href="products.php?deleteid=<?php// echo $row['pid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php
          }
        }
        ?>
    </tbody>
    </table>
    </div>
  </body>
</html>