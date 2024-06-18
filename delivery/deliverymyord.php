<?php
ob_start(); 

// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
include '../connection.php';
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:deliverylogin.php");
}
$name=$_SESSION['name'];
$id=$_SESSION['Did'];
?>


<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Food Donate</title>
           
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <li><a href="delivery.php">Home</a></li>
                    <li><a href="deliverymyord.php" class="active">My-Orders</a></li>
                    <li><a href="../logout.php" >Log-Out</a></li>
                    
                    
                </ul>
            </nav>
        </header>
            <div class="marquee">
                <span>Please deliever food with care!</span>
            </div>
    
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
<?php

// echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=103.113.190.19')));
// echo "Your city: {$city}\n";

// $city = "<script language=javascript> document.write(geoplugin_city());</script>"; 
// $scity=$city;
?>
    <style>
        .itm{
            background-color: white;
            display: grid;
        }
        .itm img{
            width: 400px;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        p{
            text-align: center; font-size: 30PX;color: black; margin-top: 50px;
        }
        a{
            /* text-decoration: underline; */
        }
        @media (max-width: 767px) {
            .itm{
                /* float: left; */
                
            }
            .itm img{
                width: 350px;
                height: 350px;
            }
        }
        
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
.table tr {
    background-color:cadetblue;
}

    .nav-links li:nth-child(4) a {
    color: ruby !important;
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

/* Additional styles for the boxes */
.box-container {
    display: inline-block;
    margin-right: 20px;
}

.box {
    padding: 20px;
    border-radius: 10px;
    background-color: lightblue;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.footer {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-left {
            flex: 1;
            margin-right: 20px;
        }

        .footer-center {
            flex: 1;
            margin-right: 20px;
        }

        .footer-right {
            flex: 1;
        }

        .about span {
            font-weight: bold;
        }

        .contact p {
            margin: 5px 0;
        }

        .sociallist ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sociallist ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .name {
            margin-top: 20px;
        }
    </style>

       
    <center><img src="https://media.tenor.com/images/8a6a14f71e83b620d53d6aa98a25bd61/tenor.gif" alt="" style="margin-left:auto; margin-right: auto;background-color: antiquewhite;"><br>
    </center>

        <div class="get">
            <?php


// Define the SQL query to fetch unassigned orders
$sql = "SELECT fd.Fid AS Fid, fd.name,fd.phoneno,fd.date,fd.delivery_by, fd.address as From_address, 
ad.name AS delivery_person_name, ad.address AS To_address
FROM food_donations fd
LEFT JOIN admin ad ON fd.assigned_to = ad.Aid where delivery_by='$id';
";

// Execute the query
$result=mysqli_query($connection, $sql);



// Check for errors
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Fetch the data as an associative array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// If the delivery person has taken an order, update the assigned_to field in the database
if (isset($_POST['food']) && isset($_POST['delivery_person_id'])) {
    $order_id = $_POST['order_id'];
    $delivery_person_id = $_POST['delivery_person_id'];

    $sql = "UPDATE food_donations SET delivery_by = $delivery_person_id WHERE Fid = $order_id";
    // $result = mysqli_query($conn, $sql);
    $result=mysqli_query($connection, $sql);


    if (!$result) {
        die("Error assigning order: " . mysqli_error($conn));
    }

    // Reload the page to prevent duplicate assignments
    header('Location: ' . $_SERVER['REQUEST_URI']);
    // exit;
    ob_end_flush();
}
// mysqli_close($conn);


?>
<div class="log">
<!-- <button type="submit" name="food" onclick="">My orders</button> -->



<p>Orders completed by you</p>
<br>
</div>
  

<!-- Display the orders in an HTML table -->
<div class="table-container">
         <!-- <p id="heading">donated</p> -->
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th >Name</th>
            <!-- <th>food</th> -->
            <!-- <th>Category</th> -->
            <th>phoneno</th>
            <th>date/time</th>
            <th>Pickup address</th>
           
            <!-- <th>Orders</th> -->
         
          
           
        </tr>
        </thead>
       <tbody>

        <?php foreach ($data as $row) { ?>
        <?php    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Pickup Address\">".$row['From_address'];
?>
        
            <!-- <td><?= $row['Fid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td> -->
            <!-- <td data-label="Action" style="margin:auto"> -->
                <!-- <?php if ($row['delivery_by'] == $id) { ?>
                    Order assigned to you
                <?php } else { ?>
                    Order assigned to another delivery person
                <?php } ?> -->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

            </div>

        
     
        

   <br>
   <br>
</body>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <p class="about" style="color:white">
                <span>About us</span> The basic concept of this project Food Waste Management is to collect the excess/leftover food from donors such as hotels, restaurants, marriage halls, etc. and distribute it to the needy people.
            </p>
        </div>
        <div class="footer-center">
            <div>
                <p><span style="color:white">Contact</span></p>
            </div>
            <div>
                <p style="color:white">+91 6284717464</p>
            </div>
            <div>
                <p><a href="#"><b style="color:white">FoodDan@gmail.com</b></a></p>
            </div>
       
               
        </div>
        <div class="footer-right">
            <h2>Food<span><b style="color: green;">Dan</b></span></h2>
            <br>
            <b style="color:lightblue">FoodDan@2024</b>
           
            
        </div>
    </div>
</footer>
          
</html>
</html>