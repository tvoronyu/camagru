
function getAjaxLogin(url, method, data) {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == '4' && request.status == '200'){
            let response = JSON.parse(request.responseText);
            return response;
        };
    };

    let dataJson = JSON.stringify(data);

    if (method === 1)
        request.open('POST', '/login/verify');
    if (method === 2)
        request.open('GET', '/login/verify');
    request.setRequestHeader('Content-type', 'application/json');
    request.send(dataJson);
}