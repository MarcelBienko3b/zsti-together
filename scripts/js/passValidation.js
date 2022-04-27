const newPass=document.getElementById('newPass');
const checkNewPass=document.getElementById('checkNewPass');
function checkPassword() {
    if(newPass.value!==checkNewPass.value) {
        checkNewPass.style.borderColor="red";
        document.getElementById("sendNewPass").disabled=true;
    } else {
        checkNewPass.style.borderColor="green";
        document.getElementById("sendNewPass").disabled=false;
    }
}