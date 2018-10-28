window.onload = function (event) {

    var email = document.getElementById('exampleInputEmail1');
    var password = document.getElementById('exampleInputPassword1');
    var btn = document.getElementById('submitBtn');
    btn.addEventListener('click', getAjaxLogin);


    function getAjaxLogin() {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){
                console.log(request.responseText);
            }
        }

        request.open('POST', '../../controllers/ValidLogin.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send("email="+email.value+'&'+"password="+password.value);
    }



};