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
    <title> Products - Admin </title>
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
                <a href="Products.php" class="active">
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
                    <div class="title">Products</div>
                    <div class="sales-details">
                        <table>
                            <tr>
                                <th class="topic">Product ID</th>
                                <th class="topic">Product Name</th>
                                <th class="topic">Unit</th>
                                <th class="topic">Price</th>
                                <th class="topic">Category</th>
                                <th class="topic">Delete</th>
                                <th>Image Upload</th>
                            </tr>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                                <?php
                            
                                    if(isset($_POST['sub'])){
                                        $name=$_POST['productName'];
                                        $unit=$_POST['unit'];
                                        $price=$_POST['price'];
                                        $category=$_POST['category'];

                                        $imgDet=pathinfo($_FILES['image']['name']);
                                        $ext=".".$imgDet['extension'];
                                        $fileName=$name.$unit.$ext;
                                        $qry="INSERT INTO products(productName, unit, price, category, imgName) VALUES('$name', '$unit', $price, '$category', '$fileName')";
                                        if(move_uploaded_file($_FILES['image']['tmp_name'],'../images/products/'.$fileName)){
                                            $con->query($qry);
                                            echo "New product added!";
                                        }else{
                                            echo "Something went wrong!";
                                        }
                                    }
                                    
                                    $xyx=mysqli_query($con, "SELECT* FROM products");
                                  
                                    while($collect=$xyx->fetch_assoc()){
                                        echo "<tr><td>".$collect['productID'];
                                        echo "</td><td>".$collect['productName'];
                                        echo "</td><td>".$collect['unit'];
                                        echo "</td><td>".$collect['price'];
                                        echo "</td><td>".$collect['category'];
                                        echo '</td><td><button type="submit" name="delete" value="'.$collect['productID'].'" id="edit-btn">Del</button></td></tr>';
                                        if(isset($_GET['delete'])){
                                            $qry2="DELETE FROM products WHERE productID=".$_GET['delete'];
                                            $qry3="SELECT * FROM products WHERE productID=".$_GET['delete'];
                                            $productDet=$con->query($qry3);
                                            $con->query($qry2);
                                            $imageName=$productDet->fetch_assoc();
                                            unlink('../images/products/'.$imageName['imgName']);
                                            header('Location:Products.php');
                                        }
                                    }
                                    mysqli_close($con);
                                ?>
                                </form>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                        <tr>
                                            <td>new</td>
                                            <td><input type="text" name="productName" placeholder="Name" required></td>
                                            <td><input type="text" name="unit" placeholder="Unit" required></td>
                                            <td><input type="text"  name="price" placeholder="price" required></td>
                                            <td>
                                                <select name="category" required>
                                                    <option value="">Select..</option>
                                                    <option value="Vegetables">Vegetable</option>
                                                    <option value="Fruits">Fruit</option>
                                                    <option value="Dairy Products">Dairy Product</option>
                                                    <option value="Beverages">Beverage</option>
                                                    <option value="Snacks">Snack</option>
                                                </select>
                                            </td><td></td>
                                            <td><input type="file" name="image" required></td>
                                            <td><input type="submit" value="add" name="sub" id="edit-btn"></td>
                                        </tr>
                                    </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>