window.onload = function (e) {

    // var response;


    document.getElementById('gallery').addEventListener('click', function (e) {

        if (e.target.id === "like") {

            var data = {
                'photo_name':e.target.classList.value.split(' ')[0]
            };


            var response = getAjaxLikeAndComment('gallery/setLike',1, data);


            try{
                if (response.status === 1){
                    e.path[0].innerText = response.countLike;
                }
            }
            catch (e) {

            }



            console.log(e);
            console.log("Like");
            console.log(response);
        }

        if (e.srcElement.localName === "img") {


            document.getElementById('modalPhoto2').src = e.srcElement.src;

            location = "#openModal2";

        }

        if (e.target.id === "comment"){

            document.getElementById('modalPhoto').src = e.path[2].children[0].src;

            document.getElementById('modal-comment').innerText = "";





            document.getElementById('btn-send').addEventListener('click', function (event) {
                var text = document.getElementById('text').value;
                console.log(document.getElementById('modal-comment').addEventListener('click', function (e) {
                   console.log(e);
                }))

                //
                // return;

                if (text.length > 0) {
                    var response = getAjaxLikeAndComment('gallery/setComment', 1, {'text': text,'photo_name':e.target.classList.value.split(' ')[0]})

                    try {
                        if (response.status === 1) {

                            // var response = getAjaxLikeAndComment('gallery/setComment',1, {"test":"text"});

                            for (var [key, value] of Object.entries(response.records)) {
                                var div = document.createElement('div');
                                div.innerHTML = value.text;
                                document.getElementById('modal-comment').insertBefore(div, document.getElementById('modal-comment').firstChild);
                            }

                            document.getElementById('text').value = "";
                        }
                    } catch (e) {

                    }
                }

            });




            var response = getAjaxLikeAndComment('gallery/getComment',1, {'photo_name':e.target.classList.value.split(' ')[0]});

            for (var [key,value] of Object.entries(response.records)){
                var div = document.createElement('div');
                div.innerHTML = value.text;
                document.getElementById('modal-comment').insertBefore(div, document.getElementById('modal-comment').firstChild);
            }

            // location = "#openModal";

            document.getElementById('openModal').style.display = "block";

            console.log(e);
            console.log(e.path[2].children[0].src);
            console.log("Comment");
        }
    });
    
    window.document.body.addEventListener("click", function (e) {
        console.log(e);
    })

    document.getElementById('close').addEventListener('click',function (e) {
        document.getElementById('openModal').style.display = "none";
    });


    like.onclick = function (e) {
      // alert("fd");
    };


    function getAjaxLikeAndComment(url, method, data) {
        var request = new XMLHttpRequest();

        var response;
        request.onreadystatechange = function () {
            if (request.readyState == '4' && request.status == '200'){
                response = JSON.parse(request.responseText);
                // return response;
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

        // if (response.status === 1){
        //     console.log(response);
        // }
    }

};