<?php
    include('config.php');
      if(!isset($_SESSION['AccountID'])){
          header('location:login.php');
      }
?>
      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <title>change password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>

<?php include('header&footer/header.php'); ?>

    <div class="container">
        <div class="form feedback">
            <div class="form-content">
                <div class="formHeader">Change Password</div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="field input-field">
                        <input type="password" placeholder="Enter old password" class="password" name="oldPassword" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Enter new password" class="password" name="newPassword" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Confirm new password" class="password" name="newPassword2" required>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="change">Change</button>
                    </div>
                </form>
    <?php

        if(isset($_POST['change'])){
            $oldPass=$_POST['oldPassword'];
            $newPass=$_POST['newPassword'];
            $conPass=$_POST['newPassword2'];
            $qry1="SELECT * FROM account WHERE AccID='".$_SESSION['AccountID']."'"; 

            $res=$con->query($qry1);
            $personDetail=$res->fetch_assoc();
            
            if($oldPass==$personDetail['AccPassword'] && $newPass==$conPass){
                $qry2="UPDATE account SET AccPassword='".$newPass."' WHERE AccID='".$_SESSION['AccountID']."'";

                if($con->query($qry2)===TRUE){
                    echo '<script>alert("Password Changed")</script>';
                }
                else{
                    echo '<script>alert("Something went wrong!! Try Again")</script>';
                }
            }
            else if($oldPass==$personDetail['AccPassword']){
                echo '<script>alert("Passwords didn\'t match!!")</script>';
            }
            else{
                echo '<script>alert("Old Password is wrong!!")</script>';
            }
        }

        mysqli_close($con);
    ?>

            </div>

        </div>
    </div>


    <?php include('header&footer/footer.html'); ?>
</body>
    <script src="js/script.js"></script>

</html>