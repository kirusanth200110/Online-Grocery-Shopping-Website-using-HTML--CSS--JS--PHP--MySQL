<?php
        include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo-icon.jpeg">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>


<?php include('header&footer/header.php'); ?>

    <div class="container">
        <div class="form feedback">
            <div class="form-content">
                <div class="formHeader">Feedback</div>
                <form action="receiveFeed.php" method="post" id="feedback">

                    <div class="field input-field">
                        <input type="text" placeholder="Name" class="input" name="cName" required>
                    </div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" required>
                    </div>

                    <div class="field input-field">
                        <textarea rows="4" cols="50" name="feedback" form="feedback" placeholder="Your text goes here.."></textarea>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="send">Send</button>
                    </div>
                </form>


            </div>

        </div>
    </div>

    <?php include('header&footer/footer.html'); ?>

</body>

</html>