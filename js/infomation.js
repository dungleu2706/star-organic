function send(){
    var arr = document.getElementsByTagName('input');
    var form_name = arr[0].value;
    var form_phone = arr[1].value;
    var form_lastname = arr[2].value;
    var form_email = arr[3].value;
    var form_message = arr[4].value;
    if(form_name == "" || form_lastname == "" || form_phone == "" || form_email == "" || form_message == ""){
        alert("Please fill all fields or fill its correctly");
        return;
    }
    if(!isNaN(form_phone)){ //is not a number
        alert("Phone must be a number");
        return;
    }
    
    
}
