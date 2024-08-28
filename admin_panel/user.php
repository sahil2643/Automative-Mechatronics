<?php
error_reporting(E_ERROR | E_PARSE);
$conn=mysqli_connect("localhost","root","","automative_mechatronics");

$select = "SELECT * FROM register";
$selectData = mysqli_query($conn,$select);

//select data for update
$rid=$_GET['updateid'];
$select_update="SELECT * FROM register WHERE rid='$rid'";
$selectUpdate=mysqli_query($conn,$select_update);

//update data
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $update_data="UPDATE register SET name='$name',email='$email',phone='$phone',password='$password' WHERE rid='$rid'";
    $updateData=mysqli_query($conn,$update_data);
    if($updateData !='')
    {
        header("location:user.php");
    }
}

//delete data
$deleteid=$_GET['deleteid'];
$delete_data="DELETE FROM register WHERE rid='$deleteid'";
$deleteData=mysqli_query($conn,$delete_data);
if($deleteData)
{
    header("refreash:1 url=user.php");
} 



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Users</title>
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
                <a class="nav-link active" href="user.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="payments.php">payments</a>
              </li>
            </ul>
            <form class="d-flex">
              <a href="logout.php"> <button class="btn btn-outline-danger" type="submit">Logout</button></a>
            </form>
          </div>
        </div>
      </nav>


    <div class="container mt-5">
    <h1 class='my-5'>Users Data</h1>

    <?php
    if($_GET['updateid'])
    {
    ?>
    <form method="post">
    <?php
    if(mysqli_num_rows($selectUpdate))
    {
      while($sel_update=mysqli_fetch_assoc($selectUpdate))
      {
        ?>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Change name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="<?php echo $sel_update['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Change email</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="email" value="<?php echo $sel_update['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Change phone number</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="phone" value="<?php echo $sel_update['phone']; ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Change password</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="password" value="<?php echo $sel_update['password']; ?>">
        </div>
        <div class="menu_setting mb-3" style="float:right;">
            <button type="submit" class="btn btn-outline-primary px-4" name="update">submit</button>
        </div>
        <?php
      }
    }
    ?>
    </form>
    <?php
    }else{
    ?>

      <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">password</th>
        <th scope="col">role</th>
        <th>edit</th>
        <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if(mysqli_num_rows($selectData))
    {
      while($row=mysqli_fetch_assoc($selectData))
      {
        ?>
        <tr>
        <th><?php echo $row['rid']; ?></th>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td><a href="user.php?updateid=<?php echo $row['rid']; ?>"><i class="fa fa-edit"></i></a></td>
        <td><a href="user.php?deleteid=<?php echo $row['rid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php
         }
        }
        ?>
    </tbody>
    </table>
    <?php
    }
    ?>
    </div>
  </body>
</html>