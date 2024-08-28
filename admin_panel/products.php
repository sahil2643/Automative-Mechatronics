<?php
error_reporting(E_ERROR | E_PARSE);
$conn = mysqli_connect("localhost","root","","automative_mechatronics");

if(isset($_POST['add']))
{
  $name=$_POST['name'];
  $price=$_POST['price'];

  $image=$_FILES['image']['name'];
  $image_tmp=$_FILES['image']['tmp_name'];
  $folder='image/';
  $target_file=$folder.basename($image);

  $insert_data="INSERT INTO product(name,image,price) VALUES('$name','$image','$price')";
  $insertData=mysqli_query($conn,$insert_data);
  move_uploaded_file($image_tmp,$target_file);
  if($insertData != '')
  {
    header("location:products.php");
  }

}

$select_data = "SELECT * FROM product";
$selectData = mysqli_query($conn,$select_data);

//select data for update
$pid=$_GET['updateid'];
$select_update="SELECT * FROM product WHERE pid='$pid'";
$selectUpdate=mysqli_query($conn,$select_update);

//update data
if(isset($_POST['update']))
{
  $name=$_POST['name'];

  $image=$_FILES['image']['name'];
  $image_old=$s['image_old'];
  $price = $_POST['price'];

  
  if($image !='')
    {
      $update_img=$_FILES['image']['name'];
    }
    else
    {
      $update_img=$img_old;
    }

    $update_data="UPDATE product SET name='$name',image='$update_img',price='$price' WHERE pid='$pid'";
    $updateData=mysqli_query($conn,$update_data);

    if($updateData !='')
    {
      if($_FILES['image']['name'] !='')
      {
        move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES['image']['name']);
        unlink("image/".$_POST['image_old']);
      }
      header("location:products.php");
    }
}
  //delete data 
$deleteid=$_GET['deleteid'];
$delete_data="DELETE FROM product WHERE pid='$deleteid'";
$deleteData=mysqli_query($conn,$delete_data);
if($deleteData)
{
    header("refreash:2 url=products.php");
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
    <title>Admin Products</title>
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
                <a class="nav-link active" href="products.php">products</a>
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

      <div class="container">
        <h1 class="my-5">product details</h1>
        <?php
        if(isset($_GET['addid']))
        {
        ?>
        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Enter product name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="enter name" name="name">
        </div>

        <label for="img">Select image:</label><br>
        <input type="file" id="img" accept="image/*" name="image"><br><br>
        
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Enter product price</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter price" name="price">
        </div>
        <div class="menu_setting mb-3" style="float:right;">
        <button type="submit" class="btn btn-outline-primary px-4" name="add">submit</button>
    </div>
        </form>

        <?php
        }elseif($_GET['updateid']){
        ?>

        <form method="post" enctype="multipart/form-data">
          <?php
        if(mysqli_num_rows($selectUpdate))
        {
        while($sel_update=mysqli_fetch_assoc($selectUpdate))
        {
        ?>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Enter product name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="enter name" name="name" value="<?php echo $sel_update['name'];?>">
        </div>

        <label for="myfile">Select a file:</label><br>
        <?php echo "<img src='image/".$sel_update['image']."' height=100px width=100px>";  ?><br><br>
        <input type="file" name="image"><br><br>
        <input type="hidden" name="image_old" value="<?php echo $sel_update['image']; ?>"><br><br>
        
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Enter product price</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter price" name="price" value="<?php echo $sel_update['price'];?>">
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
        <div class="menu_setting mb-3" style="float:right;">
        <a href="?addid=add_data"><button type="button" class="btn btn-outline-primary px-4">Add product</button></a>
    </div>
      <table class="table">
      <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">image</th>
        <th scope="col">price</th>
        <th>edit</th>
        <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($selectData))
        {
          while($row = mysqli_fetch_assoc($selectData))
          {
        ?>
        <tr>
        <th><?php echo $row['pid']; ?></th>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo "<img src='image/".$row['image']."' height='120px' width='120px' ";?></td>
        <td><?php echo $row['price']; ?></td>
        <td><a href="products.php?updateid=<?php echo $row['pid']; ?>"><i class="fa fa-edit"></i></a></td>
        <td><a href="products.php?deleteid=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
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