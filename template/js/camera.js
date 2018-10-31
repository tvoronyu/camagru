window.onload = function () {
    var canvas = document.getElementById('canvas');
    var video = document.getElementById('video');
    var video_1 = document.getElementById('video_1');
    var button = document.getElementById('button');
    var newphoto = document.getElementById('newphoto');
    // var allow = document.getElementById('allow');
    var context = canvas.getContext('2d');
    var img = document.getElementsByClassName('img-fluid');
    var img1 = document.getElementById('img-1');
    var img5 = document.getElementById('img-5');
    var img3 = document.getElementById('img-3');
    var img4 = document.getElementById('img-4');
    var img6 = document.getElementById('img-6');
    var img_video = document.getElementById('img-video');
    var filter_image = document.getElementById('filter-image');
    var load = document.getElementById('fountainTextG');
    var videoStreamUrl = false;

    // функция которая будет выполнена при нажатии на кнопку захвата кадра
    // var captureMe = function () {
    function captureMe() {

    //     if (!videoStreamUrl) alert('То-ли вы не нажали "разрешить" в верху окна, то-ли что-то не так с вашим видео стримом')
    //     // переворачиваем canvas зеркально по горизонтали (см. описание внизу статьи)
    //     context.translate(video.width, 0);
    //     context.scale(-1, 1);
    //     var cw = Math.floor(canvas.clientWidth / 100);
    //     var ch = Math.floor(canvas.clientHeight / 100);
        canvas.width = 1024;
        canvas.height = 720;
        // console.log(canvas);
    //     // отрисовываем на канвасе текущий кадр видео
        context.drawImage(video, 0, 0, 1024, 720);
    //     // получаем data: url изображения c canvas
        var base64dataUrl = canvas.toDataURL('image/jpeg');
        // console.log(canvas.scrollHeight);
        // context.setTransform(1, 0, 0, 1, 0, 0); // убираем все кастомные трансформации canvas
    //     // на этом этапе можно спокойно отправить  base64dataUrl на сервер и сохранить его там как файл (ну или типа того)
    //     // но мы добавим эти тестовые снимки в наш пример:
    //     var img = new Image();
    //     img.src = base64dataUrl;
    //     var img = encodeURIComponent(base64dataUrl);
        ajaxPost(base64dataUrl);
    //     window.document.body.appendChild(img);
    }

    function capture_video() {

        canvas.width = 1024;
        canvas.height = 720;
        // console.log(canvas);
        //     // отрисовываем на канвасе текущий кадр видео
        context.drawImage(video, 0, 0, 1024, 720);
        //     // получаем data: url изображения c canvas
        var base64dataUrl = canvas.toDataURL('image/jpeg');
        img_video.src = base64dataUrl;
        // console.log(canvas.scrollHeight);

    }
    
    
    function replaceImage(param) {

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == '1'){
                // setTimeout(loadfunction,1000);
                setTimeout(function () {
                    if (request.readyState == '1'){
                        load.setAttribute('style', 'position: absolute;');
                    }
                }, 200);
                console.log('wait!');
            }
            else if (request.readyState == '4'){
                load.setAttribute('style', 'position: absolute;display: none;');
                console.log('Success!');
            }
            if (request.readyState == '4' && request.status == '200'){
                filter_image.setAttribute('src', 'data:image/jpeg;base64,'+decodeURI(request.responseText));

                console.log(decodeURI(request.responseText));
            }
        }

        request.open('POST', '/camera/getPhoto');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('filter='+param);

        // alert(param);



    }
    
    
    //
    button.addEventListener('click', captureMe);
    setInterval(capture_video,1);
    newphoto.addEventListener('click', resetphoto);

    img1.onclick = function (event) {
        replaceImage('1');
    };

    img5.onclick = function (event) {
        replaceImage('sepia');
    };

    img3.onclick = function (event) {
        replaceImage('17');
    };

    img4.onclick = function (event) {
        replaceImage('0');
    };

    img6.onclick = function (event) {
        replaceImage('7');
    };
    // img1.addEventListener('click', replaceImage);

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
        // video_1.src = videoStreamUrl;
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
                // console.log(decodeURI(request.responseText));
            }
        }

        request.open('POST', '/camera/make', false);
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