window.onload = function (event) {

    var email = document.getElementById('exampleInputEmail1');
    var password = document.getElementById('exampleInputPassword1');
    var btn = document.getElementById('submitBtn');
    btn.addEventListener('click', getAjaxLogin);


    function getAjaxLogin() {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){
                if (request.responseText == 'yes'){
                    location = '/users';
                }
                else if (request.responseText == 'no'){
                    alert('Error!');
                }
            }
        }

        request.open('POST', '/login/valid');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send("email="+email.value+'&'+"password="+password.value);
    }



};