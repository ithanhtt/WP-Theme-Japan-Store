jQuery(document).ready(function ($) {
    // Language
    $('.dropdown-content').hide();
    $('.dropdown').click(function (e) { 
        e.preventDefault();
        $('.dropdown-content').fadeToggle( "slow", "linear" );
    });
    // Category
    $('.nav-category').hide();
    $('.dropdown-select').click(function (e) { 
        e.preventDefault();
        $('.nav-category').fadeToggle( "slow", "linear" );
    })
    //
    // $("#call").width(5);
    // Call Time Header
    $("#call").hide();
    $("#call-item").click(function (e) { 
        e.preventDefault();
        $("#call").toggle();
        $("#time").hide();
    });
    $("#time").hide();
    $("#time-item").click(function (e) { 
        e.preventDefault();
        $("#time").toggle();
        $("#call").hide();
    });
    // Banner
    $('.banner-slider-item').slick({
        // slidesToShow: 3,
        // slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '.next',
		prevArrow: '.previous'
      });
    // Product
    $('.product-item').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        dots: false,
        autoplaySpeed: 2000,
        nextArrow: '.next_p',
		prevArrow: '.previous_p',
        infinite: false,
      });
      //
      $('.woocommerce-img-to').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.woocommerce-img-be',
        prevArrow: false,
        nextArrow: false
      });
      $('.woocommerce-img-be').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.woocommerce-img-to',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        prevArrow: false,
        nextArrow: false
      });
      
      
});

// document.addEventListener("DOMContentLoaded", function(event) {
//     /* DOM is ready, so we can query for its elements */
//     var dragonHealth = document.getElementById("health").value;
//     console.log(dragonHealth);
    
//     // /*additional code for comment*/
//     // document.querySelector('button').addEventListener("click", function(event){
//     //   document.getElementById("health").value += 5;
//     // });
//   })

