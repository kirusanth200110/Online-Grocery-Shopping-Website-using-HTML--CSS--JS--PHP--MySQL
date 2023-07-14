//slider 
setInterval(next, 4000); //automatic next function in interval time of 4 seconds
let index = 0;
var slider = document.getElementsByClassName('slide-img');
slider[index].style.display = 'block';



function next() { //function that change to next image
    if (index == (slider.length - 1)) {
        index = 0;
    } else {
        index++;
    }
    for (var x = 0; x < slider.length; x++) {
        slider[x].style.display = 'none';
    }
    slider[index].style.display = 'block';
}

function previous() { //function for previous image
    if (index == 0) {
        index = (slider.length - 1);
    } else {
        index--;
    }
    for (var x = 0; x < slider.length; x++) {
        slider[x].style.display = 'none';
    }
    slider[index].style.display = 'block';
};


//Adding products  button

document.getElementById('quant').style.display = "none";

function addItem() {
    document.getElementById('button').style.display = "none";
    document.getElementById('quant').style.display = "block";
    //var txt = '<form action="#"><input type="number" id="quantity" name="quantity" min="1" max="5"><input type="submit" id="submit1" value="ok"></form>';
    //document.getElementById('quant').innerHTML = txt;
};

function logout() { //function for confirm log out..
    var userValue = confirm("Are you sure you want to log out?");
    if (userValue == true) {
        window.location.replace("logout.php");
    }
}