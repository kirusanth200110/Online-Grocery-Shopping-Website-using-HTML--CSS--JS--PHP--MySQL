<?php
      include('config.php'); 
      if(!isset($_SESSION['AccountID'])){
          header('location:login.php');
      }

    $con=new mysqli("localhost", "root", "", "quickart");
    $qry="SELECT * FROM customer WHERE AccID=".$_SESSION['AccountID'];
    $result=$con->query($qry);
    $accountDet=$result->fetch_assoc();

    if(isset($_POST['update'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $phoneNumber=$_POST['phoneNum'];
        $address=$_POST['address'];
        $qry2="UPDATE customer SET firstName='".$firstname."', lastName='".$lastname."', address='".$address."', phone='".$phoneNumber."' WHERE AccID=".$_SESSION['AccountID'];
        if($con->query($qry2)){
            $_SESSION['cName']=$firstname;
            echo '<script>alert("Details Changed!")</script>';
        }
        else{
            echo '<script>alert("Something went wrong!")</script>';
        }
        mysqli_close($con);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
        <title>Profile</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <script src="js/script.js"></script>

    </head>

    <body>


        <?php include('header&footer/header.php'); ?>

        <div class="container">
            <div class="form profile">
                <div class="form-content">
                    <div class="formHeader">Profile</div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="field input-field">
                            <input type="text" placeholder="First Name" class="input" name="firstname" value="<?php echo $accountDet['firstName'] ?>">
                        </div>
                        <div class="field input-field">
                            <input type="text" placeholder="Last Name" class="input" name="lastname" value="<?php echo $accountDet['lastName'] ?>">
                        </div>
                        <div class="field input-field">
                            <input type="text" placeholder="Phone Number" class="input" name="phoneNum" value="<?php echo $accountDet['phone'] ?>">
                        </div>

                        <div class="field input-field">
                            <textarea rows="4" cols="50" name="address"  placeholder="Address" value="<?php echo $accountDet['address'] ?>"></textarea>
                        </div>
                        <div class="field button-field">
                            <button type="submit" name="update" value="update">Update</button>
                        </div>
                    </form>
                        <div class="field button-field">
                            <a href="passwordChange.php"><button>Change Password</button></a>
                        </div>
                        <div class="field button-field">
                            <a onclick="logout();"><button>Logout</button></a>
                        </div>
                    

                </div>
            </div>
        </div>

        <?php include('header&footer/footer.html'); ?>

    </body>

    </html>