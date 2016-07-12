/**
 * Created by es.sitnikov on 08.06.2016.
 */
function track(elemA, elemB, elemOut){
    punktA = elemA.value;
    punktB = elemB.value;
    console.log(punktA);
    console.log(punktB);

    ymaps.route([punktA, punktB], {mapStateAutoApply:true, routingMode:"auto"}).then(
        function(router) {
            route && myMap.geoObjects.remove(route);
            route = router;
            myMap.geoObjects.add(route);
            elemOut.innerHTML = 'Длина маршрута = ' + route.getHumanLength()
        },
        function(error) {
            elemOut.innerHTML = 'Невозможно построить маршрут';
        }
    );
}