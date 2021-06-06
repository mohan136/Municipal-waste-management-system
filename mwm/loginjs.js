
function validateForm(){
        var user=document.getElementById("username");
        var pass=document.getElementById("password");
        if(user.value=="" && pass.value==""){
            changeText();
            return false;
        }
        else if(pass.value==""){
            changeText();
            return false;
        }
        else if(user.value==""){
            changeText();
            return false;
        }
}
function togglePassword(){
    var pass=document.getElementById("password");
    var eye=document.getElementById("eye");
    if(pass.type=="password"){
        eye.setAttribute("class","far fa-eye-slash");
        pass.type="text";
    }
    else{
        eye.setAttribute("class","far fa-eye");
        pass.type="password";
    }
}
function changeText(){
    var no=document.getElementById("no");
    if(no!=null){
        document.getElementById("no").setAttribute("id","nomsg");
    }
    else{
        var nomsg=document.getElementById("nomsg").innerHTML;
        if(nomsg=="NO"){
            document.getElementById("nomsg").innerHTML="N🙂";
        }
        else if(nomsg=="N🙂"){
            document.getElementById("nomsg").innerHTML="N😕";
        }
        else if(nomsg=="N😕"){
            document.getElementById("nomsg").innerHTML="N🙁";
        }
        else if(nomsg=="N🙁"){
            document.getElementById("nomsg").innerHTML="N☹️";
        }
        else if(nomsg=="N☹️"){
            document.getElementById("nomsg").innerHTML="N😤";
        }
        else if(nomsg=="N😤"){
            document.getElementById("nomsg").innerHTML="N😠";
        }
        else if(nomsg=="N😠"){
            document.getElementById("nomsg").innerHTML="N😡";
        }
    }
}
function forgotPassword(){
    alert("Contact administrator to change password.");
}
function check_details(){
    var aadhaar=document.getElementById("c_aadhaar");
    var phn=document.getElementById("c_phn")
    if(aadhaar.value.toString().length!=12){
        alert("Please enter valid aadhaar num");
        return false;
    }
    else if(phn.value.toString().length!=10){
        alert("Please enter valid Phone num without country code");
        return false;
    }
}
function change(){
    window.location.href = "home.php";
}