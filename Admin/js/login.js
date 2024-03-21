let form = document.getElementById('loginForm');
let firstName = document.getElementById('firstName');
let passwordInput = document.getElementById('password');
let username = "xtardhananjay";
let password = "(23dhananjay)";

form.onsubmit = (e) => {
    if (firstName.value == username) {
        firstName.style.borderColor = "lightgray";
        if (passwordInput.value == password) {
            passwordInput.style.borderColor = "lightgray";
            
        }else{
            passwordInput.style.borderColor = "red";
            e.preventDefault();
        }
    }else{
        firstName.style.borderColor = "red";
        e.preventDefault();
    }
}