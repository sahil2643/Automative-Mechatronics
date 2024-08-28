<?php
    $conn = mysqli_connect("localhost", "root", "", "automative_mechatronics");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpass = $_POST['cpass'];
        $address = $_POST['address'];
        $gst = $_POST['gst'];

        if ($password == $cpass) {
            $sql = "INSERT INTO register(name,email,phone,password,address,gst) VALUES('$name','$email','$phone','$password','$address','$gst')";
            $insert = mysqli_query($conn, $sql);

            if ($insert != '') {
                header("location:index.php");
            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <style>
        img {
            width: 100%;
        }

        body {
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
    background: #583672;
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
                    <form method="post" onsubmit="return validateForm()">
                        <h2>Registration form</h2>
                        <input type="text" name="name" placeholder="USERNAME" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="tel" name="phone" placeholder="Phone Number" required>
                        <input type="text" name="gst" placeholder="Gst number" required>
                        <input type="password" name="password" placeholder="PASSWORD" required>
                        <input type="password" name="cpass" placeholder="Confirm PASSWORD" required>
                        <input type="text" name="address" placeholder="Enter your address" required>
                        

                        <input type="submit" name="submit" class="submit">
                        <h3><a href="log.php">Login</a></h3>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>Automative Mechatronics</h2>
                    <h5>CNC Tools</h5>
                </div>
            </div>
        </div>
    </section>

    <script>
        

        function validateForm() {
            var name = document.getElementsByName('name')[0].value;
            var email = document.getElementsByName('email')[0].value;
            var phone = document.getElementsByName('phone')[0].value;
            var password = document.getElementsByName('password')[0].value;
            var cpass = document.getElementsByName('cpass')[0].value;
            var roleUser = document.getElementById('user').checked;
            var roleDistributor = document.getElementById('distributor').checked;

            if (name === "" || email === "" || phone === "" || password === "" || cpass === "") {
                alert("All fields must be filled out");
                return false;
            }

            // Email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Invalid email format");
                return false;
            }

            // Phone number validation
            var phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phone)) {
                alert("Invalid phone number format");
                return false;
            }

            // Password confirmation
            if (password !== cpass) {
                alert("Passwords do not match");
                return false;
            }

            // Role selection validation
            if (!roleUser && !roleDistributor) {
                alert("Please select a role");
                return false;
            }

            return true; // Submit the form if all validations pass
        }
    </script>
</body>
</html>
