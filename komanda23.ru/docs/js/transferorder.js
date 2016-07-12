/**
 * Created by es.sitnikov on 08.06.2016.
 */

$(document).ready(function(){
    $('#transferorder-place_a, #transferorder-place_b').focusout(function(){
        place_a = document.getElementById('transferorder-place_a');
        place_b = document.getElementById('transferorder-place_b');
        if(place_a.value && place_b.value){
            track(place_a, place_b, document.getElementById('mapOut'));
        }
    });
});