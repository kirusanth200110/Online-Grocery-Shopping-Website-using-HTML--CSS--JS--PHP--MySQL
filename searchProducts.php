<?php
        include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Searched</title>
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
        if(isset($_GET['search'])){
            $con=new mysqli("localhost", "root", "", "quickart");
            $search=$_GET['searchbox'];
            $qry="SELECT* FROM products WHERE productName LIKE '%".$search."%' ";
            $xyz=mysqli_query($con, $qry);
            $rows=mysqli_num_rows($xyz);
if ($rows>=1) {
    echo '<h1>Searches Found : '.$rows.'</h1>';
    echo '<div class="item-gallery">';

    while ($collect=$xyz->fetch_assoc()) {
        echo '<div class="content">';
        echo '<h3>'.$collect['productName'].'</h3>';
        echo '<img src="images/products/'.$collect['imgName'].'" alt="">';
        echo '<h6>'.$collect['unit'].'</h6>';
        echo '<h6>'.$collect['price'].'</h6>';
        echo '<button id="add">Add</button></div>';
    }
}
            else{
                echo '<h1>No Searches found</h1>';
            }
            
        mysqli_close($con);
    }
    ?>


            </div>
        </div>
    </div>

    <?php include('header&footer/footer.html'); ?>
</body>

</html>