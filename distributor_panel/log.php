<?php
$conn = mysqli_connect("localhost","root","","automative_mechatronics");
session_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $select_data = "SELECT * FROM register WHERE email='$email' AND password = '$password'";
    $selectData = mysqli_query($conn,$select_data);
    if(mysqli_num_rows($selectData) == 1)
    {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header("location:home.php");
    }
    else
    {
        echo '<div class="alert alert-danger">please  check yor email and password</div>';
    }
}


if(isset($_SESSION["email"]))
{
  header("location:home.php");
}



// if(isset($_POST['submit']))
// {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $selectData = "SELECT * FROM register WHERE email='$email' AND password='$password'";
//   $result = mysqli_query($conn,$selectData);

//   if(mysqli_num_rows($result) == 1)
//   {
//     $_SESSION['email']=$email;
//     $_SESSION['password']=$password;

//     header("location: index.php");  
//   }
//   else
//   {
//     echo '<div class="alert alert-danger">please  check yor email and password</div>';
//   }
// }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>img{
    width: 100%;
}
body{

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

        .right {
            background: linear-gradient(-45deg, #dcd7e0, #fff);
            url('img/TT.jpeg ');
            color:;
            position: relative;
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





</style>
</head>
<body>
    

<section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form action="" method="post">
                        <h3>SIGN IN</h3>
                        <input type="text" name="email"placeholder="Email">
                        <input type="text" name ="password"placeholder="PASSWORD">
                        <h3><a href="">Forgot Password</a></h3>
                        <button class="submit" name="submit">submit</button>
            <h3><a href="register.php">Register</a></h3>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>Automative Mechatronics</h2>
                    <h5>CNC Tools</h5>
        </div>
    </section>
    </form>
</body>

</html>



<?php


// unset($_SESSION["email"]);
// unset($_SESSION["password"]);


// header('Refresh: 2; URL = index.php');
?>