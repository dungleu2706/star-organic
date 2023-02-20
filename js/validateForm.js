if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
function ready() {
    var emailMsg = document.getElementById('email-msg');
    var emailInput = document.getElementById('email');
    emailInput.addEventListener('blur', validatEemail);
    /* valide phone number */
    var phoneInput = document.getElementById("phone");
    phoneInput.addEventListener('blur', validatePhone);
    /* show tips for user when focus */
    emailInput.addEventListener('focus', emailTip);
    phoneInput.addEventListener('focus', phoneTip);
}


/* validate email */
function validatEemail() {
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value;
    var emailMsg = document.getElementById('email-msg');
    var atposition = emailValue.indexOf("@");
    var dotposition = emailValue.lastIndexOf(".");

    if (atposition < 1 || dotposition < (atposition + 2) || (dotposition + 2) >= emailValue.length) {
        emailMsg.className= "msg";
        emailMsg.textContent = "Please enter a valid email...!!!";
        return false;
    }
    else {
        emailMsg.textContent ='';
    }
}

/* validate phone */
function validatePhone() {
    var phoneInput = document.getElementById("phone");
    var phoneNumber = phoneInput.value;
    var phoneMsg = document.getElementById('phone-msg');
    var re  = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/
    var phoneNumberisValid = re.test(phoneNumber);
    if (phoneNumberisValid == false) {
        phoneMsg.className = "msg"; 
        phoneMsg.textContent ="Please enter a valid phone number...!!!";
    }
    else {
        phoneMsg.textContent ="";
    }
}

/* email tip */
function emailTip() {
    var emailMsg = document.getElementById('email-msg');
    emailMsg.className = 'tip';
    emailMsg.textContent = "Email must have \"@\" and \".com\"... ex: C2011L@aptech.com ";
}

/* phone tips */
function phoneTip() {
    var phoneMsg = document.getElementById('phone-msg');
    phoneMsg.className = "tip";
    phoneMsg.textContent = "Phone must be number from 0 to 9";
}