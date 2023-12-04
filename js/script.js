function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
$(document).ready(function () {
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    $('.filters_menu li').on('click', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');
    });
});
