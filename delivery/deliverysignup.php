<?php
// session_start();
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['district'];

    // $location=$_POST['district'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from delivery_persons where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into delivery_persons(name,email,password,city) values('$username','$email','$pass','$location')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        header("location:delivery.php");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
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

  <title>Animated Login Form | CodingNepal</title>
  <link rel="stylesheet" href="deliverycss.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #28a745; /* Green background */
    }

    .register-form {
      max-width: 400px;
      width: 100%;
      background: #fff; /* White background */
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    }

    .center h1 {
      text-align: center;
      color: #333;
    }

    .txt_field {
      position: relative;
      margin-bottom: 30px;
    }

    .txt_field input {
      width: 100%;
      padding: 10px 0;
      border: none;
      outline: none;
      border-bottom: 1px solid #333;
      background-color: transparent;
      color: #333;
      font-size: 18px;
    }

    .txt_field input:focus ~ span::before {
      width: 100%;
    }

    .txt_field span::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #ff0000;
      transition: 0.5s;
    }

    .txt_field label {
      position: absolute;
      top: 50%;
      left: 0;
      color: #333;
      pointer-events: none;
      transition: 0.5s;
    }

    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label {
      top: -5px;
      font-size: 14px;
      color: #ff0000;
    }

    input[type="submit"] {
      background: black;
      color: white;
      border: none;
      padding: 10px 30px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 18px;
    }

    .signup_link {
      margin-top: 20px;
      text-align: center;
    }

    .signup_link a {
      color: #ff0000;
      text-decoration: none;
    }

    .signup_link a:hover {
      text-decoration: none;
    }

    /* Eye icon style */
    .eye-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }

  </style>
</head>

<body>
  <div class="register-form">
    <center>
      <h1>Register</h1>
      <form method="post" action=" ">
        <div class="txt_field">
          <input type="text" name="username" required />
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id="password" required />
          <span></span>
          <label>Password</label>
          <i class="eye-icon fas fa-eye" onclick="togglePasswordVisibility()"></i>
        </div>
        <div class="txt_field">
          <input type="email" name="email" required />
          <span></span>
          <label>Email</label>
        </div>
       
        <div class="txt_field">
        
          <select id="district" name="district" style="padding:5px; padding-left: 20px;">
            <option value="mangalore">Mangalore</option>
            <option value="udupi">Udupi</option>
            <option value="kasaragod">Kasaragod</option>
            <option value="manjeshwar">Manjeshwar</option>
            <option value="bantwal">Bantwal</option>
            <option value="puttur">Puttur</option>
            <option value="sullia">Sullia</option>
            <option value="belthangady">Belthangady</option>
            <option value="moodbidri">Moodbidri</option>
            <option value="bengaluru">Bengaluru</option>
            <option value="mumbai">Mumbai</option>
            <option value="pune">Pune</option>
            <option value="goa">Goa</option>
            <option value="kochi">Kochi</option>
            <option value="thrissur">Thrissur</option>
            <option value="kannur">Kannur</option>
            <option value="calicut">Calicut</option>
            <option value="coimbatore">Coimbatore</option>
            <option value="mysuru">Mysuru</option>
            <option value="ooty">Ooty</option>
          </select>
        </div>
        <br>
        <input type="submit" name="sign" value="Register">
        <div class="signup_link">
          Already a member? <a href="deliverylogin.php"><b style="color:lightgreen">Sign in</b></a>
        </div>
      </form>
    </center>
  </div>

  <!-- Font Awesome for eye icon -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- JavaScript to toggle password visibility -->
  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var eyeIcon = document.querySelector(".eye-icon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
      }
    }
  </script>

</body>

</html>
