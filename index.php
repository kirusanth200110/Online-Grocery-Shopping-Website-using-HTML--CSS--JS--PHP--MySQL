<?php
        include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>QuicKart - Sri Lanka's Freshest Online Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
    <?php include('header&footer/header.php'); ?>

    <!--slider-->
    <div class="slider">
        <div class="slider-content">
            <div class="slide-img">
                <img src="images/offers/img1.jpg">
            </div>
            <div class="slide-img">
                <img src="images/offers/img2.jpg">
            </div>

            <div class="slide-img">
                <img src="images/offers/img3.jpg">
            </div>
            <div class="slide-img">
                <img src="images/offers/img4.jpg">
            </div>
            <div class="slide-img">
                <img src="images/offers/img5.jpg">
            </div>
        </div>
        <div id="prev" onclick="previous()">
            < </div>
                <div id="next" onclick="next()">></div>

        </div>

        <!--Gallery-->
        <div class="gallery-container">
        <form action="productlist.php" method="get">
            <h1>Shop By Categories</h1>
            <div class="gallery">
                <div class="content">
                    <h3>Vegetables</h3>
                    <img src="images/vegetables.jpg" alt="">
                    <button value="Vegetables" name="category" class="buy-1">View</button>
                </div>
                <div class="content">
                    <h3>Fruits</h3>
                    <img src="images/fruits.jpg" alt="">
                    <button value="Fruits"  name="category" class="buy-2">View</button>
                </div>
                <div class="content">
                    <h3>Dairy Products</h3>
                    <img src="images/dairy.jpg" alt="">
                    <button value="Dairy Products"  name="category" class="buy-3">View</button>
                </div>
                <div class="content">
                    <h3>Beverages</h3>
                    <img src="images/beverages.jpg" alt="">
                    <button value="Beverages"  name="category" class="buy-4">View</button>
                </div>
                <div class="content">
                    <h3>Snacks</h3>
                    <img src="images/snacks.jpg" alt="">
                    <button value="Snacks"  name="category" class="buy-5">View</button>
                </div>
            </div>
            </form>
        </div>
    

        <?php include('header&footer/footer.html'); ?>
</body>

<script src="js/script.js"></script>

</html>