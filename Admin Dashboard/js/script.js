function logout() { //function for confirm log out..
    var userValue = confirm("Are you sure you want to log out?");
    if (userValue == true) {
        window.location.replace("logout.php");
    }
}