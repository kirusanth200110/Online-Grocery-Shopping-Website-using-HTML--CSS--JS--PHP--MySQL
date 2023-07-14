<?php
        include('config.php');
        if(isset($_SESSION['cName'])){
            header('location:index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <title> Log In </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

</head>


<body>

<?php include('header&footer/header.php'); ?>


<?php
    
    if(isset($_POST['submit'])) {   //Check whether the submit button is clicked or not
        $email = $_POST['email'];       //process for login   & get the data from login page
        $password =$_POST['password'];
 
        $qry = "SELECT * FROM account WHERE AccEmail='$email'";   //Sql query to check whether the user with user name and password exists or not

        $res= $con->query($qry);  //Execute the sql query
        $acc=$res->fetch_assoc();
        $count = mysqli_num_rows($res); //Count the rows to check whether the user exits or not
        if($count==1) {
            if($acc['AccPassword']==$password){
                echo '<script>alert("Login successful!!")</script>';
                if($acc['AccID']==1){
                    $_SESSION['name']="Admin";
                    $_SESSION['AccountID']="Admin";
                    $_SESSION['email']=$_POST['email'];
                    header('location:Admin Dashboard/Dashboard.php');
                }
                else{
                    $qry2 = "SELECT * FROM customer WHERE AccID='".$acc['AccID']."'"; 
                    $res2=$con->query($qry2);
                    $cus=$res2->fetch_assoc();
                    $_SESSION['cName']=$cus['firstName'];
                    $_SESSION['AccountID']=$cus['AccID'];
                    header('location:index.php');
                }
            }
            else{
                echo '<script>alert("Incorrect Password!")</script>';
            }
        }
        else {
            echo '<script>alert("Account Not Found!")</script>';
        }
    }
?>
    <section class="container">
        <div class="form login">
            <div class="form-content">
                <div class="formHeader">Login</div>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="field input-field">
                            <input type="email" name="email" placeholder="Enter Email" class="input" required>
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password" placeholder="Password" class="password" required>
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="submit" class="button-field" value="submit">Login</button>
                        </div>
                        
                    </form>
                    <!-- Login form end here -->

                <div class="form-link">
                    <span>Don't have an account? <a href="Signup.php">Signup</a></span>
                </div>
            </div>

        </div>

    </section>

    
<?php include('header&footer/footer.html'); ?>

    <script src="js/script.js"></script>
</body>

</html>
