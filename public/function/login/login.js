var passwordInp = document.querySelector("#password-su-inp");
var passwordChecklist = document.querySelectorAll(".list-item");
var validationRegex = [
    { regex: /.{8,}/ },
    { regex: /[0-9]/ },
    { regex: /[a-z]/ },
    { regex: /[A-Z]/ },
    { regex: /[^A-Za-z0-9]/ }
];
passwordInp.addEventListener('keyup', function () {
    validationRegex.forEach(function (item, i) {
        var isValid = item.regex.test(passwordInp.value);
        if (isValid) {
            passwordChecklist[i].classList.add('checked');
        }
        else {
            passwordChecklist[i].classList.remove('checked');
        }
    });
});
