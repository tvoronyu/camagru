window.onload = function () {
    var email = document.getElementById('exampleInputEmail1'),
        password = document.getElementById('exampleInputPassword1'),
        name = document.getElementById('exampleInputName1'),
        sername = document.getElementById('exampleInputName2'),
        btn = document.getElementById('btn');

    btn.addEventListener('click', signupAjax);

    function signupAjax() {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){

                let response = JSON.parse(request.responseText);

                if (response.status == 1){
                    location = '/camera';
                }
                else {
                    alert(response.msg);
                    password.value = ""
                }
            }
        }

        var jsn = {
            "email":email.value,
            "password":password.value,
            "name":name.value,
            "sername":sername.value
        };

        request.open('POST', '/signup/verify');
        request.setRequestHeader('Content-type', 'application/json');
        request.send(JSON.stringify(jsn));
        // request.send("email="+email.value+'&'+"password="+password.value+'&'+'name='+name.value+'&'+'sername='+sername.value);
    }
}