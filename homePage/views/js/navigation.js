$(document).ready(function(){

    //=============================================
    // NAV 
    //=============================================

    const nav_list = document.querySelector('.nav-list');
    const open = document.querySelector('.open');
    const close = document.querySelector('.close');

    open.addEventListener('click', () => {
        nav_list.classList.add('active');
    })

    close.addEventListener('click', () => {
        nav_list.classList.remove('active');
    })

    
    //=============================================
    // STICKY NAVIGATION MENU
    //=============================================

    let nav_offset_top = $('.header_area').height() + 350;

    function navbarFixed() {
        if ($('.header_area').length) {
            $(window).scroll(function () {
                let scroll = $(window).scrollTop();
                if (scroll >= nav_offset_top) {
                    $('.header_area .container').addClass('navbar_fixed');
                } else {
                    $('.header_area .container').removeClass('navbar_fixed');
                }
            })
        }
    }

    navbarFixed();

})