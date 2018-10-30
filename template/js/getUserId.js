window.onload = function () {
    document.body.onclick = function (e) {
        var elem = e ? e.target : window.event.srcElement;
        while (!(elem.id || (elem == document.body))) elem = elem.parentNode;
        if (!elem.id)
            return;
        else {
            id = elem.id;
            var tmp = id.replace('user-', '');
            location = '/users/'+tmp;
    //         console.log(tmp);
    //
    //         getAjaxUser(tmp);
    //     }
    //
    // };
    //
    // function getAjaxUser(id) {
    //     var request = new XMLHttpRequest();
    //
    //     request.onreadystatechange = function () {
    //         if (request.readyState == '4' && request.status == '200'){
    //             console.log(request.responseText);
    //             if (request.responseText == 'yes'){
    //                 location = '/users';
    //             }
    //             else if (request.responseText == 'no'){
    //                 alert('Error!');
    //             }
    //         }
        }
    //
    //     request.open('POST', '/users/'+id);
    //     request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //     request.send();
    }
}