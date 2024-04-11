document.addEventListener('DOMContentLoaded', function() {
    // CLOSE THE FORM TRANSFER TO INDEX.PHP
    document.querySelector('.form_close').addEventListener('click', function() {
        document.querySelector('.form_center').classList.remove('show');
        window.location.href = 'index.php';
    });

    // TOGGLE SIGNUP TO LOGIN
    document.getElementById('signup').addEventListener('click', function() {
        document.querySelector('.login_form').style.display = 'none';
        document.querySelector('.signup_form').style.display = 'block';
        document.querySelector('.form_center').classList.add('show');
    });

    // TOGGLE LOGIN TO SIGNUP FORM
    document.getElementById('login-link').addEventListener('click', function() {
        document.querySelector('.signup_form').style.display = 'none';
        document.querySelector('.login_form').style.display = 'block';
        document.querySelector('.form_center').classList.add('show');
    });

    // SHOW/HIDE PASSWORD
    document.querySelectorAll('.pwhide').forEach(icon => {
        icon.addEventListener('click', function() {
            let input = this.parentElement.querySelector('input');
            if (input.type === 'password') {
                input.type = 'text'; // SHOW PW
                this.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password'; // HIDE PW
                this.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });
    });
});
