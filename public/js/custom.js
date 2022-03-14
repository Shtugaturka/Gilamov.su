$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#button-up').fadeIn();
        } else {
            $('#button-up').fadeOut();
        }
    });

    $('#button-up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


    var $grid = $('.portfolio-grid');

    $grid.imagesLoaded().progress( function() {
        $grid.isotope({
            itemSelector: '.portfolio-grid-item',
            layoutMode: 'fitRows',
            filter: ':nth-child(-n+8)',
        });

        $('.filter-button-group').on( 'click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            if (filterValue == '*') {
                $grid.isotope({
                    filter: ':nth-child(-n+8)',
                });
            } else {
                $grid.isotope({
                    filter: function () {
                        return $(this).is(filterValue) && $(this).index(filterValue) < 8;
                    }
                });
            }
        });
    });


});
