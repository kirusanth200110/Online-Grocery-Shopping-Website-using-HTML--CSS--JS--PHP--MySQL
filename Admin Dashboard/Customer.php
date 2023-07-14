<?php
include('../config.php');
    if(!isset($_SESSION['email'])){
        header('location:../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Customer - Admin </title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo-icon.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../images/logo.png" id="logo">
        </div>
        <ul class="nav-links">
            <li>
                <a href="Dashboard.php">
                    <img src="../icons/dashboard.png" alt="" class="icon">
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Products.php">
                    <img src="../icons/products.png" alt="" class="icon">
                    <span class="links_name">Product</span>
                </a>
            </li>
            <li>
                <a href="customer.php" class="active">
                    <img src="../icons/customer.png" alt="" class="icon">
                    <span class="links_name">Customers</span>
                </a>
            </li>
            <li>
                <a href="Feedback.php">
                    <img src="../icons/feedback.png" alt="" class="icon">
                    <span class="links_name">Feedback</span>
                </a>
            </li>
  
            <li class="log_out">
                <a onclick="logout();">
                    <img src="../icons/logout.png" alt="" class="icon">
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
        <form action="#" method="get">
            <div class="search-box">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">
            <img src="../icons/search.png" alt="" class="icon">
            </button>
            </div>
        </form>
            <div class="profile-details">
                <img src="../icons/admin.png"" class="icon">
                <a href="profile.php"><span class="admin_name">Admin</span></a>
            </div>
        </nav>

        <div class="home-content">

            <div class="sales-boxes">
                <div class="product-list box">
                    <div class="title">Customer Details</div>
                    <div class="sales-details">
                        <table>
                            <tr>
                                <th class="topic">Customer ID</th>
                                <th class="topic">First Name</th>
                                <th class="topic">Last Name</th>
                                <th class="topic">Address</th>
                                <th class="topic">Phone</th>
                                <th class="topic">Edit</th>
                            </tr>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                                <?php
                                    $xyx=mysqli_query($con, "SELECT* FROM customer");

                                    while($collect=$xyx->fetch_assoc()){
                                        echo "<tr><td>".$collect['customerID'];
                                        echo "</td><td>".$collect['firstName'];
                                        echo "</td><td>".$collect['lastName'];
                                        echo "</td><td>".$collect['address'];
                                        echo "</td><td>".$collect['phone'];
                                        echo '</td><td><button type="submit" name="delete" value="'.$collect['AccID'].'" id="edit-btn">Del</button></td></tr>';
                                        if(isset($_GET['delete'])){
                                            $qry2="DELETE FROM customer WHERE AccID=".$_GET['delete'];
                                            $qry3="DELETE FROM account WHERE AccID=".$_GET['delete'];
                                            $con->query($qry2);
                                            $con->query($qry3);
                                            header('Location:Customer.php');
                                        }
                                    }
                                    mysqli_close($con);
                                ?>
                                </form>
                                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>