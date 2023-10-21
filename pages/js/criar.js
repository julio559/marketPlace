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