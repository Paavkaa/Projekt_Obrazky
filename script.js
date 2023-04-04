
function checkUsername() 
{
    var username = document.getElementById("username").value;
    var usernameError = document.getElementById("usernameError");
    var hideBr = document.getElementById("hideBr1");
    if(username == "") {
        document.getElementById("username").focus();
        document.getElementById("username").classList.remove(":form_text");
        document.getElementById("username").classList.add(":form_warning");
        usernameError.style.display = "inline-block";
        hideBr.style.display = "block";

        return false;
    } else {
        document.getElementById("username").classList.remove("form_warning");
        document.getElementById("username").classList.add("form_text");

        return true;
    }
    
}


function checkEmail()
{
    var mail = document.getElementById("email").value;
    var mailError = document.getElementById("mailError");
    var mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var hideBr = document.getElementById("hideBr2");
    if(mailRegex.test(mail))
    {
        mailError.style.display = "none";
        hideBr.style.display = "none";
        
        return true;
    }
    if(mail == "") 
    {
        document.getElementById("email").focus();
        document.getElementById("email").classList.remove("form_text");
        document.getElementById("email").classList.add("form_warning");
        mailError.style.display = "inline-block";
        hideBr.style.display = "block";

        return false;
    }
}


function checkPassword() {
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var passwordError = document.getElementById("passwordError");
    if(password.length < 8)
    {
        passwordLength.style.display = "inline-block";
        passwordError.style.display = "none";

        document.getElementById("password").value = "";
        document.getElementById("password2").value = "";
        document.getElementById("password").focus();
        document.getElementById("password").classList.remove("form_text");
        document.getElementById("password").classList.add("form_warning");

        return false;
    }
    else if (password !== password2) {
        passwordError.style.display = "inline-block";
        passwordLength.style.display = "none";

        document.getElementById("password").value = "";
        document.getElementById("password2").value = "";
        document.getElementById("password").focus();
        document.getElementById("password").classList.remove("form_text");
        document.getElementById("password").classList.add("form_warning");

        return false;
    } 
    else {
        passwordError.style.display = "none";
        return true;
    }
}

function checkCheckbox() {
    var checkbox = document.getElementById("checkbox");
    var checkboxError = document.getElementById("checkboxError");
    if (checkbox.checked) {
        checkboxError.style.display = "none";
        return true;
    } else {
        checkboxError.style.display = "inline-block";
        return false;
    }
}


document.getElementById("submit").addEventListener("click", function(event) {
    if (!checkUsername() || !checkEmail() || !checkPassword() || !checkCheckbox()) {
        event.preventDefault();
    }
});