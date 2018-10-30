window.onload = function () {
    var canvas = document.getElementById('canvas');
    var video = document.getElementById('video');
    var button = document.getElementById('button');
    var newphoto = document.getElementById('newphoto');
    // var allow = document.getElementById('allow');
    var context = canvas.getContext('2d');
    var img = document.getElementsByClassName('img-fluid');
    var videoStreamUrl = false;

    // функция которая будет выполнена при нажатии на кнопку захвата кадра
    // var captureMe = function () {
    function captureMe() {

    //     if (!videoStreamUrl) alert('То-ли вы не нажали "разрешить" в верху окна, то-ли что-то не так с вашим видео стримом')
    //     // переворачиваем canvas зеркально по горизонтали (см. описание внизу статьи)
    //     context.translate(video.width, 0);
    //     context.scale(-1, 1);
    //     // отрисовываем на канвасе текущий кадр видео
        context.drawImage(video, 0, 0, 300, 150);
    //     // получаем data: url изображения c canvas
        var base64dataUrl = canvas.toDataURL('image/jpeg');
        // context.setTransform(1, 0, 0, 1, 0, 0); // убираем все кастомные трансформации canvas
    //     // на этом этапе можно спокойно отправить  base64dataUrl на сервер и сохранить его там как файл (ну или типа того)
    //     // но мы добавим эти тестовые снимки в наш пример:
    //     var img = new Image();
    //     img.src = base64dataUrl;
    //     var img = encodeURIComponent(base64dataUrl);
        ajaxPost(base64dataUrl);
    //     window.document.body.appendChild(img);
    }
    //
    button.addEventListener('click', captureMe);
    newphoto.addEventListener('click', resetphoto);

    // navigator.getUserMedia  и   window.URL.createObjectURL (смутные времена браузерных противоречий 2012)
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL.createObjectURL = window.URL.createObjectURL || window.URL.webkitCreateObjectURL || window.URL.mozCreateObjectURL || window.URL.msCreateObjectURL;

    // запрашиваем разрешение на доступ к поточному видео камеры
    navigator.getUserMedia({video: true}, function (stream) {
        // разрешение от пользователя получено
        // скрываем подсказку
        // allow.style.display = "none";
        // получаем url поточного видео
        // try {
        //     stream.srcObject = stream;
        //     video.src = stream.srcObject;
        // } catch (error) {
        videoStreamUrl = window.URL.createObjectURL(stream);
        video.src = videoStreamUrl;
        // }
        // устанавливаем как источник для video

    }, function () {
        console.log('что-то не так с видеостримом или пользователь запретил его использовать :P');
    });

    //запит який віправляє фото з канвасу на сервер і якщо на сервері все добре збереглось,
    // то він замніює усі фото на фільтрах на фотку яку було зроблену на камеру

    function ajaxPost(param) {
        var request = new XMLHttpRequest();
        var imge = encodeURIComponent(param);

        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){
                var i = -1;

                // img[0].removeAttribute('src');
                while (img[++i]){

                    img[i].setAttribute('src', 'data:image/jpeg;base64,'+decodeURI(request.responseText));
                }
                console.log(decodeURI(request.responseText));
            }
        }

        request.open('POST', '/camera/make');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+imge);
    }
    
    function resetphoto() {

        var i = -1;

        while (img[++i]){
            img[i].setAttribute('src', '/template/img/user.jpg');
        }
    }
};