window.onload = function () {
    var email = document.getElementById('exampleInputEmail1'),
        password = document.getElementById('exampleInputPassword1'),
        confirmPassword = document.getElementById('exampleInputPassword2'),
        name = document.getElementById('exampleInputName1'),
        sername = document.getElementById('exampleInputName2'),
        btn = document.getElementById('btn');

    btn.addEventListener('click', confirm);

    function confirm() {
        if (password.value != confirmPassword.value){
            alert('Баран, введи однакові паролі');
        }
        else if (password.value == '' || !password.value){
            alert('Баран, введи пароль');
        }
        else {
            signupAjax();
        }
    }

    function signupAjax() {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){
                // if (request.responseText == 'yes'){
                    location = '/login';
            //     }
            }
        }

        request.open('POST', '/signup/valid');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send("email="+email.value+'&'+"password="+password.value+'&'+'name='+name.value+'&'+'sername='+sername.value);
    }
}