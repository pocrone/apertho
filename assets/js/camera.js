const webcamElement = document.getElementById('webcam');
const canvasElement = document.getElementById('canvas');
const snapSoundElement = document.getElementById('snapSound');
const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);

let pict;

$('#webcamon').click(function () {
    webcam.start()
        .then(result => {
            console.log("webcam started");
        })
        .catch(err => {
            console.log(err);
        });
});

$('#cameraFlip').click(function () {
    webcam.flip();
    webcam.start();
});

// $('$webcamoff').click(function () {
//     webcam.stop();
// });

$('#snap').click(function () {
    let picture = webcam.snap();
    let pict = picture;
    console.log("hasil gambar =" + picture);
    document.querySelector('#download-photo').href = picture;
    document.querySelector('#img-hidden').src = picture;
    $('#canvas').removeClass('d-none');
    // $("#canvas").append("<img src=" + picture + " alt='hasil scan' style='width: 100 %; height: auto>");
})









