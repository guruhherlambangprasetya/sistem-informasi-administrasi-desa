$(document).ready(function () {
    for (var i = 0; i < m.length; i++) {
        $('<div class="item"><img src="' + m[i] + '"><div class="carousel-caption"></div>   </div>').appendTo('.carousel-inner');
        $('<li data-target="#carousel-example-generic" data-slide-to="' + i + '"></li>').appendTo('.carousel-indicators')

    }
    $('.item').first().addClass('active');
    $('.carousel-indicators > li').first().addClass('active');
    $('#carousel-example-generic').carousel();
});