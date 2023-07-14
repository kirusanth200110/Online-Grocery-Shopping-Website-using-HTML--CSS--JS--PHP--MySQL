<?php
        include('config.php');
if(isset($_SESSION['AccountID'])){
    header('location:index.php');
}


    if(isset($_POST['submit'])){  //Check whether the submit button is clicked or not
    if ($_POST['password']==$_POST['password2']) {
        $firstname=$_POST['firstName'];
        $lastname=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $qry1 = "SELECT * FROM account WHERE AccEmail='$email'";   //Sql query to check whether the user with user name and password exists or not
        $result= $con->query($qry1);  //Execute the sql query
        $acc=$result->fetch_assoc();
        $count = mysqli_num_rows($result); //Count the rows to check whether the user exits or not
        if ($count==1) {
            echo '<script>alert("Email Already Exist!");</script>';
        } else {
            $qry="INSERT INTO account(AccEmail, AccPassword ) VALUES('$email', '$password')";
            if ($con->query($qry) ===true) {
                $account=$con->query("SELECT * FROM account WHERE AccEmail='".$email."'");
                $accountID=$account->fetch_assoc();
                $qry2="INSERT INTO customer(firstName, lastName, AccID) VALUES('".$firstname."','".$lastname."','".$accountID['AccID']."')";
                if ($con->query($qry2) ===true) {
                    echo '<script>alert("Account Created");</script>';
                    $_SESSION['AccountID']=$accountID['AccID'];
                    $_SESSION['cName']=$firstname;
                    $_SESSION['email']=$email;
                    header('location:index.php');
                }
            }else {
                echo '<script>alert("Something  went wrong!!!");</script>';
            }
        }
    }else {
        echo '<script>alert("Passwords did not match!");</script>';
    }
}
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>
<?php include('header&footer/header.php'); ?>

    <section class="container">
        <div class="form signup">
            <div class="form-content">
                <div class="formHeader">Signup</div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                    <div class="field input-field">
                        <input type="text" placeholder="First Name" name="firstName" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" placeholder="Last Name" name="lastName" class="input"   required>
                    </div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" name="email" class="input" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" name="password" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" name="password2" required>
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="submit" value="Create Account">Create Account</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
            </div>

        </div>
    </section>

    <?php include('header&footer/footer.html'); ?>

    <script src="js/script.js"></script>
</body>

</html>


