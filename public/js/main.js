$(document).ready(function(){
    
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    }); 
    
    new WOW().init();
    
     $('.newemail').click(function(){
        $('.signup').show();
        $('.signin').hide();
    })
    
    $('.signinn').click(function(){
        $('.signin').show();
        $('.signup').hide();
    })
});