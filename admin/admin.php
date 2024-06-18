<?php
ob_start(); 
include("connect.php"); 
if($_SESSION['name']==''){
    header("location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    

    <?php
     $connection=mysqli_connect("localhost","root","");
     $db=mysqli_select_db($connection,'demo');
    ?>
<style>
    .dashboard{
        background-color:antiquewhite;
    }
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

</style>
</head>
<body> 
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="adminprofile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard" style="background-color:antiquewhite">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Food<b style="color: #06C167; ">Dan</b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">Analytics</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <span class="text">Total users</span>
                        <?php
                           $query="SELECT count(*) as count FROM  login";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">50,120</span> -->
                    </div>
                    <div class="box box2" style="background-color:grey">
                        <i class="uil uil-comments"></i>
                        <span class="text">Feedbacks</span>
                        <?php
                           $query="SELECT count(*) as count FROM  user_feedback";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">20,120</span> -->
                    </div>
                    <div class="box box3" style="background-color: #B28C94">
                        <i class="uil uil-heart"></i>
                        <span class="text">Total donates</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">10,120</span> -->
                    </div>
                </div>
                <br>
                <br>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Donations</span>
                </div>

                <!-- Recent donations table -->
                <div class="table-container">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Food</th>
                                    <th>Category</th>
                                    <th>Phone No</th>
                                    <th>Date/Time</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $loc= $_SESSION['location'];
                                $sql = "SELECT * FROM food_donations WHERE assigned_to IS NULL and location=\"$loc\"";
                                $result=mysqli_query($connection, $sql);
                                $id=$_SESSION['Aid'];

                                if (!$result) {
                                    die("Error executing query: " . mysqli_error($conn));
                                }

                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }

                                if (isset($_POST['food']) && isset($_POST['delivery_person_id'])) {
                                    $order_id = $_POST['order_id'];
                                    $delivery_person_id = $_POST['delivery_person_id'];
                                    $sql = "SELECT * FROM food_donations WHERE Fid = $order_id AND assigned_to IS NOT NULL";
                                    $result = mysqli_query($connection, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        die("Sorry, this order has already been assigned to someone else.");
                                    }

                                    $sql = "UPDATE food_donations SET assigned_to = $delivery_person_id WHERE Fid = $order_id";
                                    $result=mysqli_query($connection, $sql);

                                    if (!$result) {
                                        die("Error assigning order: " . mysqli_error($conn));
                                    }

                                    header('Location: ' . $_SERVER['REQUEST_URI']);
                                    ob_end_flush();
                                }

                                foreach ($data as $row) {
                                    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"food\">".$row['food']."</td><td data-label=\"category\">".$row['category']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Address\">".$row['address']."</td><td data-label=\"quantity\">".$row['quantity']."</td>";

                                    echo "<td data-label=\"Action\">";
                                    if ($row['assigned_to'] == null) {
                                        echo "<form method=\"post\" action=\" \">
                                                <input type=\"hidden\" name=\"order_id\" value=\"".$row['Fid']."\">
                                                <input type=\"hidden\" name=\"delivery_person_id\" value=\"".$id."\">
                                                <button type=\"submit\" name=\"food\">Get Food</button>
                                            </form>";
                                    } else if ($row['assigned_to'] == $id) {
                                        echo "Order assigned to you";
                                    } else {
                                        echo "Order assigned to another delivery person";
                                    }
                                    echo "</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.sidebar-toggle');
            const nav = document.querySelector('nav');

            toggleButton.addEventListener('click', function() {
                nav.classList.toggle('close');
            });
        });
    </script>
</body>
</html>
