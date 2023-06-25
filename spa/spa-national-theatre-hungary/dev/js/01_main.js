if(window.innerHeight > window.innerWidth){
    $('.orientation').removeClass("d-none")
}

$(function () {

    var lastOrientation;

    function readDeviceOrientation() {
        lastOrientation = window.orientation;
        if (Math.abs(window.orientation) === 90) {
            $('.orientation').addClass("d-none")
        } else {
            $('.orientation').removeClass("d-none")
        }
    }

   window.onorientationchange = readDeviceOrientation;
});