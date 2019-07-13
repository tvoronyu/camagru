var canvas = document.getElementById('canvas');
var canvas2 = document.getElementById('canvas2');
var context = canvas.getContext('2d');
var context2 = canvas2.getContext('2d');
var video = document.getElementById('video');
var photo = document.getElementById('photo1');
var canvas_container = document.getElementById('canvas-container');

document.getElementById('but1').addEventListener('click', function (e) {
    canvas.width = 1000;
    canvas.height = 720;
    canvas2.width = 1000;
    canvas2.height = 720;
    // console.log(canvas);
    //     // отрисовываем на канвасе текущий кадр видео
    context.drawImage(video, 0, 0, 1000, 720);
    context2.drawImage(canvas, 0, 0, 1000, 720);
    //     // получаем data: url изображения c canvas
    var base64dataUrl = canvas2.toDataURL('image/jpeg');

    // document.getElementById('photo').src = base64dataUrl;

    // base64dataUrl = base64dataUrl.replace('data:image/jpeg;base64,/', "");

    var request = new XMLHttpRequest();


    request.onreadystatechange = function () {
        if (request.readyState == '4' && request.status == '200'){
            // var i = -1;
            //
            // // img[0].removeAttribute('src');
            // while (img[++i]){
            //
            //     img[i].setAttribute('src', 'data:image/jpeg;base64,'+decodeURI(request.responseText));
            // }
            console.log(request.responseText);
            // console.log(decodeURI(request.responseText));
        }
    }

    var image = encodeURIComponent(base64dataUrl);

    let json = JSON.stringify({
        "image":image
    });

    request.open('POST', '/test', false);
    request.setRequestHeader('Content-type', 'application/json');
    request.send(json);

    console.log(canvas.getContext('2d'))
    console.log(photo.getClientRects());

    var img = new Image();

    img.src = photo.src;

    img.style.width = "50px";

    img.style.position = "relative";

    img.style.top = "-100px";

    var mouse = {
        x:0,
        y:0,
        down:false
    };



    var dragObject = {};

    document.onmousedown = function(e){

        mouse.down = true;

        if (mouse.down) {
            document.onmousemove = function (e) {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            }
        }
    };



    document.onmouseup = function(e){
        mouse.down = false;
    };



    // img.addEventListener('mousedown', function (e) {
    //
    // });
    //
    // img.addEventListener('mouseup', function (e) {
    //     img.removeEventListener('mousemove', mouseMove);
    // });

    // img.addEventListener()

    canvas_container.append(img);

    // context.drawImage(photo, 30, 30, 100, 70);

    // console.log(base64dataUrl);
});


navigator.getUserMedia = navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia;

if (navigator.getUserMedia) {
    navigator.getUserMedia(
        { video: { width: 1280, height: 720 } },
        function(stream) {
            video.srcObject = stream;
            video.onloadedmetadata = function(e) {
                video.play();
            };
        },
        function(err) {
            console.log("The following error occurred: " + err.name);
        }
    );
} else {
    console.log("getUserMedia not supported");
}
