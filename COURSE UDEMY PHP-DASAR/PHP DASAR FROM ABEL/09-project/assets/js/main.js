// Toggle show hide password
function togglePassword(target, icon) {
    const password = document.querySelector(target);
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

    password.setAttribute('type', type);

    if (icon.children[0].classList.contains('fa-eye-slash')) {
        icon.children[0].classList.remove('fa-eye-slash');
        icon.children[0].classList.add('fa-eye');
    } else {
        icon.children[0].classList.remove('fa-eye');
        icon.children[0].classList.add('fa-eye-slash');
    }
}

// upload file name
$('input[type="file"]').change(function (e) {
    let fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
});