function is_username_valid(username){
    if(/[a-z]{5,9}$/.test(username)){
        return true;
    }else{
        alert('Please Enter valid username !');
        return false;
    }
}
function is_password_valid(password){
    if(/(?=.*[a-z])(?=.*[A-Z])(?=(.*[0-9]){3})(?=.*[!@#$%^&*(),.?":{}|<>])(?=.{8,}).*$/.test(password)){
        return true;
    }else{
        alert('Please Enter valid Password !');
        return false;
    }
}