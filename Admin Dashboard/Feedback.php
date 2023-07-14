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
    <title> Feedback-Admin </title>
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
                <a href="customer.php">
                    <img src="../icons/customer.png" alt="" class="icon">
                    <span class="links_name">Customers</span>
                </a>
            </li>
            <li>
                <a href="Feedback.php" class="active">
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
                    <div class="title">Feedback</div>
                    <div class="sales-details">
                        <table>
                            <tr>
                                <th class="topic">Feedback ID</th>
                                <th class="topic">Date</th>
                                <th class="topic">Name</th>
                                <th class="topic">Email</th>
                                <th class="topic">Details</th>
                                <th class="topic">Edit</th>
                            </tr>

                            
                          <form action="Feedback.php" method="get">
                                <?php
                            
                                    $xyx=mysqli_query($con, "SELECT* FROM feedback");
                                    while($collect=$xyx->fetch_assoc()){
                                        echo "<tr><td>".$collect['feedbackID'];
                                        echo "</td><td>".$collect['Ftime'];
                                        echo "</td><td>".$collect['cName'];
                                        echo "</td><td>".$collect['cEmail'];
                                        echo "</td><td>".$collect['feedback'];
                                        if($collect['response']==0){
                                            echo '</td><td><button type="submit" name="read" value="'.$collect['feedbackID'].'">Mark Read</button></td></tr>';
                                            if(isset($_GET['read'])){
                                                $qry2="UPDATE feedback SET response=1 WHERE feedbackID = ".$_GET['read'];
                                                $con->query($qry2);
                                            }
                                        }else if($collect['response']==1){
                                            echo '</td><td>Read</td></tr>';
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