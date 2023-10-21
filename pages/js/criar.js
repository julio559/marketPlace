const passwordInput = document.getElementById("senha");
const toggleButton = document.getElementById("toggle");
const toggleIcon = document.getElementById("toggleIcon");

toggleButton.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.className = "bi bi-eye";
    } else {
        passwordInput.type = "password";
        toggleIcon.className = "bi bi-eye-slash-fill";
    }
});


let createForm = document.getElementById("createForm");
let loginForm = document.getElementById("loginForm");
let showCreateFormButton = document.getElementById("showCreateForm");
let showLoginFormButton = document.getElementById("showLoginForm");

createForm.style.display = "none";  // Oculta inicialmente o formulário de criação

showCreateFormButton.addEventListener("click", function() {
    loginForm.style.display = "none";
    createForm.style.display = "block";
});

showLoginFormButton.addEventListener("click", function() {
    createForm.style.display = "none";
    loginForm.style.display = "block";
});