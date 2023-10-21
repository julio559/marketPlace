const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');
const toggleFormButton = document.getElementById('toggleForm');

toggleFormButton.addEventListener('click', () => {
    if (signupForm.style.display === 'none') {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        toggleFormButton.textContent = 'Voltar ao Login';
    } else {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
        toggleFormButton.textContent = 'Criar Conta';
    }
});