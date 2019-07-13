window.onload = function (event) {

    var email = document.getElementById('exampleInputEmail1');
    var password = document.getElementById('exampleInputPassword1');
    var btn = document.getElementById('submitBtn');
    btn.addEventListener('click', getAjaxLogin);


    function getAjaxLogin() {
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

        let data = JSON.stringify({
            'email':email.value,
            'password':password.value
        });

        request.open('POST', '/login/verify');
        request.setRequestHeader('Content-type', 'application/json');
        request.send(data);
    }



};