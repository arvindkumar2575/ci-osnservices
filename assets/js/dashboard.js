let app = {};

let url = window.location.href;

// ready function 
$(document).ready(function() {
    
    $(".user-login-form").find("input").click(function(e) {
        if($(this).hasClass("field-focus-error")){
            $(this).removeClass("field-focus-error")  
        }
    })

    app.fillProgress = common.fillProgress;

    $("#user-login-form-success").click(function(e){
        e.preventDefault()
        let data = {};
        // first name 
        let username_elm =  $('input[name=username]')
        if(username_elm.val()==""){
            username_elm.addClass("field-focus-error")
            return false;
        }
        data.username=username_elm.val()
    
        // last name 
        let password_elm =  $('input[name=password]')
        if(password_elm.val()==""){
            password_elm.addClass("field-focus-error")
            return false;
        }
        data.password=password_elm.val()
    
        data.form_type=$('input[name=form_type]').val()
        console.log(data)

        let requrl = BASE_URL+"/api/login"
        common.ajaxCall(requrl,"GET",data,(res)=>{
            if(res.status){
                console.log(res)
                $('.short-popup-msg').find('.popup-desc').html(res.message)
                $('.short-popup-msg').css("display","block")
                let e = $('.short-popup-msg').find('.popup-msg-progressbar')
                app.fillProgress(e)
                setInterval(() => {
                    window.location.href=BASE_URL+"/dashboard";
                }, 2000);
            }else{
                console.log(res)
            }
        },(err)=>{
            console.log(err)
        })
    })
});


(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });



    $('.dropdown-sidebar-item').click(function(){
        $(this).addClass("active").siblings().removeClass('active')
        $(this).toggleClass('active').parent().find('.dropdown-sidebar-menu').toggleClass('open')
    })
    $('.dropdown-sidebar-menu-item').click(function(){
        console.log($('.dropdown-sidebar-menu-item'))
        $('.dropdown-sidebar-menu-item').removeClass('active')
        $(this).addClass("active").siblings().removeClass('active')
    })

    
})(jQuery);


















