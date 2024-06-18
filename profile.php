
<?php
include("login.php"); 
// if($_SESSION['loggedin']==true){
//     header("location:loginindex.html");
// }

if($_SESSION['name']==''){
	header("location: signup.php");
}

?> 
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href=profile.css>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 

            <style>
              .marquee {
                    background-color: #28a745;
                    color: #fff;
                    padding: 10px;
                    text-align: center;
                }
                .marquee span {
                    animation: marquee 15s linear infinite;
                    display: inline-block;
                    white-space: nowrap;
                }
                @keyframes marquee {
                    0% {
                        transform: translateX(100%);
                    }
                    100% {
                        transform: translateX(-100%);
                    }
                }
                header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-bar {
    margin-right: 20px;
}

.fooddan-nav {
    display: flex;
    align-items: center;
}

.nav-bar ul {
    display: flex;
    list-style-type: none;
}

.nav-bar ul li {
    margin-right: 20px;
}
.card {
    border: 1px solid black; /* Add border */
    border-radius: 5px; /* Add border radius for rounded corners */
    overflow-y: auto; /* Add overflow-y to enable vertical scrolling */
    max-height: 200px; /* Set maximum height for scrolling */
    padding: 20px; /* Increase padding */
    margin-bottom: 20px; /* Add margin bottom for spacing */
    background-color: rgb(186, 235, 158);
}



        .card-header {
           /* Light green */
            color: #155724; /* Dark green */
            border-color: #c3e6cb; /* Medium green */
        }
        /* Heading style */
.profilebox .heading {
    color: #06C167; /* Green color */
}

/* Table style */
.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #b1d182; /* Light background color */
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color:lightgreen;
}



.table tbody tr:hover {
    background-color: #ddd;
}
.info-box {
     /* Border style */
    border-radius: 5px; /* Rounded corners */
    padding: 15px; /* Padding inside the box */
    background-color:lightblue;
 
}





        



      
     
          </style>
      </head>
      <body style="background-color: antiquewhite;">
        <header style="font-size: 45px; background-color: cadetblue;"><b>Food<b style="color: green;">Dan</b></b></div>
          <div class="hamburger">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
          </div>
          <nav class="nav-bar">
              <ul>
                  <li><a href="home.html">Home</a></li>
                  <li><a href="about.html" >About</a></li>
                  <li><a href="contact.html" >Contact</a></li>
                  <li><a href="profile.php" class="active" >Profile</a></li>
                  
              </ul>
          </nav>
      </header>
          <div class="marquee">
              <span>Don't waste food, share it with those in need!</span>
          </div>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
  
    
    



  <div class="profile">
    <div class="profilebox">
        <p class="headingline">
            
            Profile
        </p>
        <br>
        <div class="info-box">
    <div class="info" style="padding-left: 10px;">
        <p>Name: <?php echo $_SESSION['name']; ?></p><br>
        <p>Email: <?php echo $_SESSION['email']; ?></p><br>
        <p>Gender: <?php echo $_SESSION['gender']; ?></p><br>
        <a href="logout.php" style="margin-top: 6px; border-radius: 5px; background-color: #06C167; color: white; padding: 5px 10px;">Logout</a>
    </div>
</div>


        <br><br>
        <hr>
        <br>
        <p class="headingline">
            
            Your Donations
        </p>
        <div class="table-container">
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Food</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM food_donations WHERE email='$email'";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row['food'] . "</td><td>" . $row['type'] . "</td><td>" . $row['category'] . "</td><td>" . $row['date'] . "</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



   
    
    
</body>
<footer class="footer">
  <div class="footer-container">
      <div class="footer-left">
          <p class="about">
              <span>About us</span> The basic concept of this project Food Waste Management is to collect the excess/leftover food from donors such as hotels, restaurants, marriage halls, etc. and distribute it to the needy people.
          </p>
      </div>
      <div class="footer-center">
          <div>
              <p><span>Contact</span></p>
          </div>
          <div>
              <p>+91 6284717464</p>
          </div>
          <div>
              <p><a href="#">FoodDan@gmail.com</a></p>
          </div>
          <div class="sociallist">
              <ul class="social">
                  <li><a href="https://www.facebook.com/TheAkshayaPatraFoundation/"><img src="https://i.ibb.co/x7P24fL/facebook.png" style="width: 13px; height: auto;"></a></li>
                  <li><a href="https://twitter.com/globalgiving"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png" style="width: 22px; height: auto;"></a></li>
                  <li><a href="https://www.instagram.com/charitism/"><img src="https://i.ibb.co/ySwtH4B/instagram.png" style="width: 20px; height: auto;"></a></li>
                  
              </ul>
          </div>
      </div>
      <div class="footer-right">
          <h2>Food<b style="color: green;">Dan</b></h2>
          <p class="menu">
              <a href="#">Home</a> |
              <a href="about.html">About</a> |
              <a href="profile.php">Profile</a> |
              <a href="contact.html">Contact</a>
          </p>
          <p class="name">FoodDan &copy; 2023</p>
      </div>
  </div>
</footer>
</html>