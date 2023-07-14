<?php
        include('config.php');
        if(!isset($_SESSION['AccountID'])){
            header('location:login.php');
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
<?php include('header&footer/header.php'); ?>

    <div class="container">
        <div class="form itemBox">
        <?php
        $xyz=mysqli_query($con, "SELECT* FROM products WHERE productID='".$_SESSION['productID']."'");
        $product=$xyz->fetch_assoc();
            echo '<img src="images/products/'.$product['imgName'].'" alt="">';
            echo '<div class="desc">';
            echo '<h1>'.$product['productName'].'</h1>';
            echo '<h3>'.$product['unit'].'</h3>';
            echo '<h2>Rs.'.$product['price'].'</h2>';

        mysqli_close($con);
        ?>
                <div class="buttons">
                    <button id="button" onclick="addItem()">Add</button>
                    <div id="quant">
                        <form action="#">
                            <input type="number" id="quantity" name="quantity" min="1" max="5">
                            <input type="submit" id="submit1" value="ok" name="">
                        </form>
                    </div>

                </div>
        </div>
    </div>


    <?php include('header&footer/footer.html'); ?>

</body>
<script src="js/script.js"></script>

</html>