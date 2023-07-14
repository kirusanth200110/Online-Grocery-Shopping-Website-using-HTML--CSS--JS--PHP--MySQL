<?php 
    include('config.php');
    if(!isset($_GET['category'])){
        header('location:Home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $_GET['category'] ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
<?php include('header&footer/header.php'); ?>

    <!--Gallery-->
    <div class="container">
        <div class="gallery-container">
        <?php
            echo "<h1>".$_GET['category']."</h1>";
            echo '<div class="item-gallery">';

        $xyx=mysqli_query($con, "SELECT* FROM products WHERE category='".$_GET['category']."'");
  
        while($collect=$xyx->fetch_assoc()){
            echo '<div class="content">';
            echo '<h3>'.$collect['productName'].'</h3>';
            echo '<img src="images/products/'.$collect['imgName'].'" alt="image">';
            echo '<h6>'.$collect['unit'].'</h6>';
            echo '<h6>Rs. '.$collect['price'].'</h6>';
            $_SESSION['productID']=$collect['productID'];
            echo '<a href="item.php"><button id="add">Add</button></a></div>';
        }
        
        mysqli_close($con);
    ?>


            </div>
        </div>
    </div>

    <?php include('header&footer/footer.html'); ?>

</body>

</html>