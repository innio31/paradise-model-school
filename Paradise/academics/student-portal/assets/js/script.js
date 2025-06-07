document.addEventListener('DOMContentLoaded', function() {
    // Client-side form validation
    const loginForm = document.getElementById('loginForm');
    if(loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const admissionNumber = document.getElementById('admission_number');
            const password = document.getElementById('password');
            let valid = true;
            
            if(admissionNumber.value.trim() === '') {
                valid = false;
                admissionNumber.classList.add('is-invalid');
            } else {
                admissionNumber.classList.remove('is-invalid');
            }
            
            if(password.value.trim() === '') {
                valid = false;
                password.classList.add('is-invalid');
            } else {
                password.classList.remove('is-invalid');
            }
            
            if(!valid) {
                e.preventDefault();
            }
        });
    }
    
    // Dashboard active link highlighting
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        if(link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
});