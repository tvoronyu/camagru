var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');
var gallery = document.getElementById('gallery');
var ramka1 = document.getElementById('ramka1');
var photo = document.getElementById('mainPhoto');

document.getElementById('btnMake').addEventListener('click', function (e) {

    context.drawImage(video, 0, 0, 1024, 640);

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


document.getElementById('btnSave').addEventListener('click', function (e) {

    var base64dataUrl = canvas.toDataURL('image/jpeg');

    var request = new XMLHttpRequest();

    var response = {};


    request.onreadystatechange = function () {
        if (request.readyState == '4' && request.status == '200'){
            console.log(request.responseText);

            response = JSON.parse(request.responseText);
        }
    };

    var image = encodeURIComponent(base64dataUrl);

    let json = JSON.stringify({
        "image":image
    });

    request.open('POST', '/camera/save', false);
    request.setRequestHeader('Content-type', 'application/json');
    request.send(json);

    console.log(canvas.getContext('2d'))
    console.log(photo.getClientRects());

    if (response.status === 1){
        var img = new Image();

        img.src = base64dataUrl;

        img.className = "w-100 pb-1";

        gallery.appendChild(img);
    }


});


document.getElementById('btnClear').addEventListener('click', function (e) {
    clearCanvas();
});

document.getElementById('btnClearEffect').addEventListener('click', function (e) {

    context.drawImage(ramka1, 0, 0, 1024, 640);

});



document.getElementById('template').addEventListener('click', function (e) {

    if (e.path[0].localName == 'img') {

        if (e.path[0].id.match("ramka")) {
            context.drawImage(e.path[0], 0, 0, 1024, 640);
        }
        if (e.path[0].id.match("sticker1")){
            context.drawImage(e.path[0], 0, 0, 200, 200);
        }
        if (e.path[0].id.match("sticker2")){
            context.drawImage(e.path[0], 50, 300, 200, 250);
        }
        if (e.path[0].id.match("sticker3")){
            context.drawImage(e.path[0], 800, 400, 200, 200);
        }
        console.log(e);
        console.log(e.path[0].id.match('ramka'));
        console.log(e.path[0].id);
    }

});

gallery.addEventListener('click', function (e) {

    if (e.srcElement.localName === "img") {

        var elem = document.createElement('div');
        //
        // elem.style.backgroundColor = "white";
        // elem.style.position = "fixed";
        // elem.style.top = 0 + 'px';
        // elem.style.bottom = 0 + 'px';
        // elem.style.left = 0 + 'px';
        // elem.style.right = 0 + 'px';
        // // elem.style.opacity = 0.5;
        // elem.style.background = "black";
        // elem.style.transition = "opacity 400ms ease-in";
        // elem.zIndex = 99999;
        //
        // // elem.style.width = document.getElementById('grid-container').offsetWidth;
        // // elem.style.height = document.getElementById('grid-container').offsetHeight;
        // elem.className = "d-flex justify-content-center align-content-center";
        //
        // elem.innerHTML = "<img src='"+e.srcElement.src+"' class='w-50 h-50 mt-5'>";
        //
        // // var img = new Image();
        // //
        // // img.src = e.srcElement.src;
        // //
        // // img.className = "w-50 h-50 mt-5";
        // // img.style.opacity = 1;
        // //
        // // elem.appendChild(img);
        //
        //
        // document.getElementById('grid-container').appendChild(elem);

        document.getElementById('modalPhoto').src = e.srcElement.src;

        location = "#openModal";

    }



    console.log(e);
    console.log(e.srcElement.localName);



});

window.onload = function (e) {
  clearCanvas();
};


function clearCanvas() {
    canvas.width = 1024;
    canvas.height = 640;

    context.drawImage(photo, 0, 0, 1024, 640);
};


