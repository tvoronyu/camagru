

document.getElementById('inputNameEdit').addEventListener('click', function (e) {
    var name = document.getElementById('inputName');
    var btn = document.getElementById('btnName');

    btn.setAttribute('class', 'btn btn-primary w-75');

    name.removeAttribute('disabled');
    name.focus();

});

document.getElementById('inputSerNameEdit').addEventListener('click', function (e) {
    var sername = document.getElementById('inputSerName');
    var btn = document.getElementById('btnSerName');

    btn.setAttribute('class', 'btn btn-primary w-75');

    sername.removeAttribute('disabled');
    sername.focus();

});

document.getElementById('inputEmailEdit').addEventListener('click', function (e) {
    var email = document.getElementById('inputEmail');
    var btn = document.getElementById('btnEmail');

    btn.setAttribute('class', 'btn btn-primary w-75');
    email.removeAttribute('disabled');
    email.focus();
});



document.getElementById('btnName').addEventListener('click', function (e) {
    var name = document.getElementById('inputName');
    var btn = document.getElementById('btnName');

    if (btn.getAttribute('class') !== 'btn btn-primary w-75 disabled') {
        var result = getAjaxLogin("/user/changeName", 1, {"name":name.value});

        if (result.status === 1) {
            btn.setAttribute('class', 'btn btn-primary w-75 disabled');
        }

        console.log(result);
    }

})

document.getElementById('btnSerName').addEventListener('click', function (e) {
    var sername = document.getElementById('inputSerName');
    var btn = document.getElementById('btnSerName');

    if (btn.getAttribute('class') !== 'btn btn-primary w-75 disabled') {
        var result = getAjaxLogin("/user/changeSerName", 1, {"sername":sername.value});

        if (result.status === 1) {
            btn.setAttribute('class', 'btn btn-primary w-75 disabled');
        }

        console.log(result);
    }

})

document.getElementById('btnEmail').addEventListener('click', function (e) {
    var email = document.getElementById('inputEmail');
    var btn = document.getElementById('btnEmail');

    if (btn.getAttribute('class') !== 'btn btn-primary w-75 disabled') {
        var result = getAjaxLogin("/user/changeEmail", 1, {"email":email.value});

        if (result.status === 1) {
            btn.setAttribute('class', 'btn btn-primary w-75 disabled');
        }

        console.log(result);
    }

});

document.getElementById('checkbox').addEventListener('change', function (e) {
    var result;
    if (document.getElementById('checkbox').checked){
        result = getAjaxLogin("/user/notification", 1, {"notification":true});
    }
    else {
        result = getAjaxLogin("/user/notification", 1, {"notification":false});
    }

    console.log(result);
});

document.getElementById('btnPass').addEventListener('click', function (e) {

    var oldPass = document.getElementById('oldPass').value;
    var newPass = document.getElementById('newPass').value;

    var data = {
        "old":oldPass,
        "new":newPass
    };

    var result = getAjaxLogin("/user/changePassword", 1, {"password":data});

    console.log(result);

});








function getAjaxLogin(url, method, data) {
    var request = new XMLHttpRequest();

    var response;

    request.onreadystatechange = function () {
        if (request.readyState == '4' && request.status == '200'){
            response = JSON.parse(request.responseText);
        };
    };

    let dataJson = JSON.stringify(data);

    if (method === 1)
        request.open('POST', url, false);
    if (method === 2)
        request.open('GET', url, false);
    request.setRequestHeader('Content-type', 'application/json');
    request.send(dataJson);

    return response;
}