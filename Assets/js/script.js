// Login page - Password toggle

const togglePassword = document.getElementById("togglePassword");
const input = document.querySelector(".login-eye input");

//question : pourquoi je dois vérifier si ma const est non null ?
if(togglePassword) {
    togglePassword.addEventListener("click", changeVisibility);
};

function changeVisibility () {
    if (input.type === "password") {
        input.type = "text";
        togglePassword.className= "fas fa-eye";
    } else {
        input.type = "password";
        togglePassword.className= "fa fa-eye-slash";
    }
}


// Popovers

$(function () {
    $('[data-toggle="popover"]').popover()
})



  
