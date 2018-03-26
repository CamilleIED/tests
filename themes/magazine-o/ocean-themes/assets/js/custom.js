jQuery(document).ready(function($){
    $(".block-layout-c-owl-carousel").owlCarousel({

        // Most important owl features
        items : 3,
        responsive:{
            0:{
                items:1,
                nav: false,
            },
            767:{
                items:3,
            },
            1000:{
                items:3
            }
        },

        dots: false,

        margin: 30,
        stagePadding: 0,

    	//Autoplay
    	autoplay : false,
    	autoplayTimeout: 5000,
        loop:true,
        autoplayHoverPause : true,

        // Navigation
        nav: false,
        navText : ["prev","next"],
        rewind : true,

        //Pagination
        pagination : false,
        paginationNumbers: false,

        // CSS Styles
        baseClass : "owl-carousel",
        theme : "owl-theme"

    });


    /*owl
    ------------------*/
    $(".block-layout-e-owl-carousel").owlCarousel({

        // Most important owl features
        items : 3,
        responsive:{
            0:{
                items:1,
                nav: false,
            },
            767:{
                items:3,
            },
            1000:{
                items:3
            }
        },

        dots: false,

        margin: 30,
        stagePadding: 0,

    	//Autoplay
    	autoplay : false,
    	autoplayTimeout: 5000,
        loop:true,
        autoplayHoverPause : true,

        // Navigation
        nav: false,
        navText : ["prev","next"],
        rewind : true,

        //Pagination
        pagination : false,
        paginationNumbers: false,

        // CSS Styles
        baseClass : "owl-carousel",
        theme : "owl-theme"

    });

});
