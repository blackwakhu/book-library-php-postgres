const passwordInp: HTMLFormElement = document.querySelector("#password-su-inp");

const passwordChecklist: any = document.querySelectorAll(".list-item");


let validationRegex = [
    { regex: /.{8,}/ },
    { regex: /[0-9]/ },
    { regex: /[a-z]/ },
    { regex: /[A-Z]/ },
    { regex: /[^A-Za-z0-9]/ }
]

passwordInp.addEventListener('keyup', () =>  {
    validationRegex.forEach((item, i)  =>  {
        let isValid: boolean = item.regex.test(passwordInp.value)
        
        if (isValid)  {
            passwordChecklist[i].classList.add('checked')
        }  else  {
            passwordChecklist[i].classList.remove('checked')
        }

    })
})
