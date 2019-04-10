
//function opens form if display is none
//if the logic button is clicked it dissapears
function openLoginForm() {
    var form = document.getElementById("myForm");
    var buttons = document.getElementById("buttons");

    if (form.style.display == "block") {
        form.style.display = "none";

    } else {
        form.style.display = "block";

    }

    if (buttons.style.display == "block") {
        buttons.style.display = "none";
    } else {
        buttons.style.display = "block";
    }
}
//if the registrer button is clicked it dissapears
function openRegisterForm() {
    //
    var form = document.getElementById("registerForm");
    var buttons = document.getElementById("buttons");


    if (form.style.display == "block") {
        form.style.display = "none";

    } else {
        form.style.display = "block";

    }

    if (buttons.style.display == "block") {
        buttons.style.display = "none";
    } else {
        buttons.style.display = "block";
    }
}

//function to open the edit form if display is none
function editRow() {

    var edit = document.getElementById("editForm");

    if (edit.style.display == "block") {
        edit.style.display = "none";
    } else
        edit.style.display = "block";
}
