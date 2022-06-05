<?php
    $insert = false;
    if(isset($_POST['name'])){
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);

        if(!$conn){
            die("Connection Failed: ". mysqli_connect_error());
        }
        echo "Successfully Connected.";

        //$serial_no = $_POST['serial_no'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="INSERT INTO `login_id`.`details` (`first_name`, `last_name`, `email`,`password`) VALUES ('$first_name','$last_name', '$email', '$password');";
        if($conn->query($sql)==true){
        $insert=true;
        }
        else{
        echo "ERROR:$sql<br>$conn->error";
        }
        $conn->close();
    }
?>
<html lang="en">

<head>
    
    <title>Login & Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function register() {
            alert("SUCCESFULLY REGISTERED!!");
        }
    </script>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .full-page {
            height: 100vh;
            width: 100vw;
            background-image: linear-gradient(to bottom, #ff9933, #663300);
            padding: 10px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat
            position: absolute;
        }

        #login-form {
            display: contents;
        }
        
        .form-box {
            width: 350px;
            height: 480px;
            position: relative;
            margin: 2% auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            overflow: hidden;
        }

        .button-box {
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241;
            border-radius: 30px;
        }

        .toggle-btn {
            padding: 10px 30px;
            cursor: pointer;
            color: white;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
        }

        #btn {
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: #8FCEF2;
            border-radius: 30px;
            transition: .5s;
        }

        .input-group-login {
            top: 150px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        .input-group-register {
            top: 120px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        .input-field {
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }

        .submit-btn {
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: #8FCEF2;
            border: 0;
            outline: none;
            border-radius: 30px;
        }

        .check-box {
            margin: 30px 10px 34px 0;
        }

        span {
            color: #777;
            font-size: 12px;
            bottom: 68px;
            position: absolute;
        }

        #login {
            left: 50px;
        }

        #login input {
            color: white;
            font-size: 15;
        }

        #register {
            left: 450px;
        }

        #register input {
            color: white;
            font-size: 15;
        }

    </style>
</head>

<body>
    
    <div class="full-page">
        
        <button class="btn btn-secondary" onclick="window.location.href='index.html';" >BACK</button>
        
        <div id='login-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                    <button type='button' onclick='register()' class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login'>
                    <input type='text' class='input-field' name="email" placeholder='Email Id' required>
                    <input type='password' class='input-field' name="password" placeholder='Enter Password' required>
                    <input type='checkbox' class='check-box'><span>Remember Password</span>
                    <button type='submit' class='submit-btn'>Log in</button>
                </form>
                <form id='register' class='input-group-register' action="RegLogin.php" method="POST">
                    <input type='text' class='input-field' name="first_name" placeholder='First Name' required>
                    <input type='text' class='input-field' name="last_name" placeholder='Last Name ' required>
                    <input type='email' class='input-field' name="email" placeholder='Email Id' required>
                    <input type='password' class='input-field' name="password" placeholder='Enter Password' required>
                    <input type='password' class='input-field' name="confirm_password" placeholder='Confirm Password' required>
                    <input type='checkbox' class='check-box'><span>I agree to the terms and conditions</span>
                    <button onclick="register()" type='submit' class='submit-btn'>Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }

        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';
        }

    </script>
    <script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
</body>

</html>
