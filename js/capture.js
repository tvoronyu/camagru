window.onload = function () {
  var video = document.getElementById('video');
  var videoStreamUrl = false;
  var canvas = document.getElementById('canvas');
  var button = document.getElementById('button');
  var context = canvas.getContext('2d');
  var image = document.getElementById('image');
  var btn_grey = document.getElementById('t1');
  var btn_neg = document.getElementById('t2');
  var btn_edge = document.getElementById('t4');
  var btn_embos = document.getElementById('t5');
  var btn_reset = document.getElementById('t3');


    var captureMe = function () {
        if (!videoStreamUrl) alert('То-ли вы не нажали "разрешить" в верху окна, то-ли что-то не так с вашим видео стримом')
        // // переворачиваем canvas зеркально по горизонтали (см. описание внизу статьи)
        // // context.translate(canvas.width, 0);
        // // context.scale(-1, 1);
        // // отрисовываем на канвасе текущий кадр видео
        // console.log(video.offsetWidth);

        context.drawImage(video, 0, 0, 300, 150);
        // context.clearRect(0, 0, canvas.width, canvas.height);
        // image.src = canvas.toDataURL('image/webp');
        // // получаем data: url изображения c canvas
        var base64dataUrl = canvas.toDataURL('image/jpeg');
        // // context.setTransform(1, 0, 0, 1, 0, 0); // убираем все кастомные трансформации canvas
        // // на этом этапе можно спокойно отправить  base64dataUrl на сервер и сохранить его там как файл (ну или типа того)
        // // но мы добавим эти тестовые снимки в наш пример:
        // // var img = new Image();
        // // img.src = base64dataUrl;
        // console.log(canvas.toDataURL());
        // image.setAttribute('src', base64dataUrl);
        // console.log(base64dataUrl);

        // context.drawImage(video, 0, 0, video.width, video.width);
        // image.setAttribute('src', canvas.toDataURL('image/png'));

        // window.location = 'php/image.php?image='+base64dataUrl;
        // image.setAttribute('src', '"'+base64dataUrl+'"');
        // image.src = '"'+base64dataUrl+'"';
        // window.document.body.appendChild(img);

        // var img = encodeURI(base64dataUrl);

        ajaxPost(base64dataUrl);

        // var request = new XMLHttpRequest();
        // // console.log(img);
        // // console.log(request.responseText);
        // // var text = "a=b";
        // request.open('POST', 'php/image.php');
        // request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        // request.send('image='+base64dataUrl);

    };

    function filter_1() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+'&'+'index=1');
    }

    function filter_2() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+'&'+'index=0');
    }

    function filter_3() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+'&'+'index=10');
    }

    function filter_4() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+'&'+'index=5');
    }

    function filter_5() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+'&'+'index=6');
    }

    function ajaxPost(base64dataUrl) {
        var request = new XMLHttpRequest();
        var img = encodeURIComponent(base64dataUrl);
        request.onreadystatechange = function () {

            // var img = document.getElementById('tess');
            if (request.readyState == 4 && request.status == 200) {
                image.setAttribute('src', 'data:image/jpeg;base64,' + decodeURI(request.responseText));
            }
        }
        // console.log('');
        request.open('POST', 'php/image.php');
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('image='+img+'&'+'index=');
    }


    button.addEventListener('click', captureMe);
    btn_grey.addEventListener('click', filter_1, false);
    btn_neg.addEventListener('click', filter_2, false);
    btn_reset.addEventListener('click', filter_3, false);
    btn_edge.addEventListener('click', filter_4, false);
    btn_embos.addEventListener('click', filter_5, false);

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL.createObjectURL = window.URL.createObjectURL || window.URL.webkitCreateObjectURL || window.URL.mozCreateObjectURL || window.URL.msCreateObjectURL

    navigator.getUserMedia({video: true}, function (stream) {
        videoStreamUrl = stream;
        video.src = window.URL.createObjectURL(stream);
        }, function () {
        console.log('что-то не так с видеостримом или пользователь запретил его использовать :P');
    })
};