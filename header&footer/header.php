<header>
        <img src="images/logo.png" alt="logo" class="logo">
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="Feedback.php">Feedback</a></li>
                <li><a href="FollowUs.php">Follow Us</a></li>
            </ul>
        </nav>
        <div class="nav-buttons">
            <form method="get" action="searchProducts.php">
                <input id="searchBar" type="text" name="searchbox" placeholder="Search everything..." required>
                <input id="search" type="submit" name="search" value="search">
            </form>
    <?php
        if(isset($_SESSION['cName'])){
            echo'<a class="logInButton" href="profile.php"><button>'.$_SESSION['cName'].'<img src="icons/profile.png" id="userProfile"></button></a>';
        }
        else{ 
            echo '<a class="logInButton" href="login.php"><button>LogIn/SignUp <img src="icons/profile.png" id="userProfile"></button></a>';
        }
    ?>
            
            <a class="cartButton" href="#"><img src="icons/cart.png" class="icons" id="cart" alt="cart"></a>
        </div>
    </header>
