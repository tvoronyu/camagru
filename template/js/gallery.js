window.onload = function (e) {


    document.getElementById('gallery').addEventListener('click', function (e) {

        if (e.target.id === "like") {
            console.log(e);
            console.log("Like");
        }

        if (e.target.id === "comment"){

            document.getElementById('modalPhoto').src = e.path[2].children[0].src;



            location = "#openModal";

            console.log(e);
            console.log(e.path[2].children[0].src);
            console.log("Comment");
        }
    });

    like.onclick = function (e) {
      alert("fd");
    }


};