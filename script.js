function checkUsername() 
{
    var username = document.getElementById("username").value;
    var usernameError = document.getElementById("usernameError");
    if(username == "") {
        document.getElementById("username").focus();
        document.getElementById("username").classList.remove("form_text");
        document.getElementById("username").classList.add("form_warning");
        usernameError.style.display = "inline-block";

        return false;
    } else 
    {
        document.getElementById("username").classList.remove("form_warning");
        document.getElementById("username").classList.add("form_text");
        usernameError.style.display = "none";

        return true;
    }
    
}


function checkEmail()
{
    var mail = document.getElementById("email").value;
    var mailError = document.getElementById("mailError");
    var mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(mailRegex.test(mail))
    {
        document.getElementById("email").classList.remove("form_warning");
        document.getElementById("email").classList.add("form_text");
        mailError.style.display = "none";
        
        return true;
    }
    if(mail == "" || !mailRegex.test(mail)) 
    {
        document.getElementById("email").focus();
        document.getElementById("email").classList.remove("form_text");
        document.getElementById("email").classList.add("form_warning");
        mailError.style.display = "inline-block";

        return false;
    }
}


function checkPasswordLength() {
    var password = document.getElementById("password").value;
    var passwordError = document.getElementById("passwordLengthError");

    if (password.length < 8) 
    {
        document.getElementById("password").focus();
        document.getElementById("password").classList.remove("form_text");
        document.getElementById("password").classList.add("form_warning");
        passwordError.style.display = "inline-block";


        return false;
    } 
    else 
    {
        document.getElementById("password").classList.remove("form_warning");
        document.getElementById("password").classList.add("form_text");
        passwordError.style.display = "none";

        return true;
    }


}

function checkPasswordMatch()
{
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var passwordError = document.getElementById("passwordMatchError");


    if (password !== password2) {
        document.getElementById("password2").focus();
        document.getElementById("password2").classList.remove("form_text");
        document.getElementById("password2").classList.add("form_warning");
        passwordError.style.display = "inline-block";

        return false;
    } 
    else {
        document.getElementById("password2").classList.remove("form_warning");
        document.getElementById("password2").classList.add("form_text");
        passwordError.style.display = "none";

        return true;
    }
}

document.getElementById("username").addEventListener("blur", function() {
    checkUsername();
});
document.getElementById("email").addEventListener("blur", function() {
    checkEmail();
});
document.getElementById("password").addEventListener("blur", function() {
    checkPasswordLength();
});
document.getElementById("password2").addEventListener("blur", function() {
    checkPasswordMatch();
});
