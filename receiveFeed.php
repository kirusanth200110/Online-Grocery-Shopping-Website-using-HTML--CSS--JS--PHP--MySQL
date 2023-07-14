<?php
        include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>

<?php include('header&footer/header.php'); ?>

    <div class="container">
<?php

        if(isset($_POST['send'])){
            $Cname=$_POST['cName'];
            $Cemail=$_POST['email'];
            $Cmsg=$_POST['feedback'];
            $date=date("Y:m:d");


            $qry="INSERT INTO Feedback(cName, cEmail, feedback, Ftime, response) VALUES('$Cname', '$Cemail', '$Cmsg', '$date', 0)";

            if($con->query($qry)===TRUE){
                echo '<div class="thank"><h1>Thanks for submitting your feedback!</h1><a href="index.php"><-  Continue Shopping</a></div>';
            }
            else{
                echo '<div class="thank"><h1>something went wrong!</h1><a href="Feedback.php">Try Again</a></div>';
            }
        }

        mysqli_close($con);
    ?>
    </div>

    
<?php include('header&footer/footer.html'); ?>
        
</body>

</html>