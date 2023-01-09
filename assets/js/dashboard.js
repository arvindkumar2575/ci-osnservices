let app = {};

let url = window.location.href;

// ready function 
$(document).ready(function () {

    $(".user-login-form,.user-register-form").find("input").click(function (e) {
        if ($(this).hasClass("field-focus-error")) {
            $(this).removeClass("field-focus-error")
        }
    })

    app.fillProgress = common.fillProgress;

    $("#user-login-form-success").click(function (e) {
        e.preventDefault()
        let data = {};
        // first name 
        let username_elm = $('input[name=username]')
        if (username_elm.val() == "") {
            username_elm.addClass("field-focus-error")
            return false;
        }
        data.username = username_elm.val()

        // last name 
        let password_elm = $('input[name=password]')
        if (password_elm.val() == "") {
            password_elm.addClass("field-focus-error")
            return false;
        }
        data.password = password_elm.val()

        data.form_type = $('input[name=form_type]').val()

        let emailValidator = validation.email(data.username);
        let passwordValidator = validation.password(data.password);

        let requrl = BASE_URL + "/api/login"

        if (emailValidator == true && passwordValidator == true) {
            common.ajaxCall(requrl, "GET", data, (res) => {
                if (res.status) {
                    $('.short-popup-msg').find('.popup-desc').html(res.message)
                    $('.short-popup-msg').css("display", "block")
                    let e = $('.short-popup-msg').find('.popup-msg-progressbar')
                    app.fillProgress(e)
                    setInterval(() => {
                        window.location.href = BASE_URL + "/dashboard";
                    }, 2000);
                } else {
                    let message = res.message
                    common.popup_error(message)
                }
            }, (err) => {
                console.log(err)
            })
        }else {
            let message = (emailValidator != true) ? emailValidator : passwordValidator
            common.popup_error(message)
        }
    })

    $("#user-register-form-success").click(function (e) {
        e.preventDefault()
        let data = {};
        // first name 
        let first_name_elm = $('input[name=first_name]')
        if (first_name_elm.val() == "") {
            first_name_elm.addClass("field-focus-error")
            return false;
        }
        data.first_name = first_name_elm.val()

        // last name 
        let last_name_elm = $('input[name=last_name]')
        if (last_name_elm.val() == "") {
            last_name_elm.addClass("field-focus-error")
            return false;
        }
        data.last_name = last_name_elm.val()

        let username_elm = $('input[name=username]')
        if (username_elm.val() == "") {
            username_elm.addClass("field-focus-error")
            return false;
        }
        data.username = username_elm.val()

        // last name 
        let password_elm = $('input[name=password]')
        if (password_elm.val() == "") {
            password_elm.addClass("field-focus-error")
            return false;
        }
        data.password = password_elm.val()

        data.form_type = $('input[name=form_type]').val()
        console.log(data)

        let emailValidator = validation.email(data.username);
        let passwordValidator = validation.password(data.password);

        let requrl = BASE_URL + "/api/regiser"

        if (emailValidator == true && passwordValidator == true) {
            common.ajaxCall(requrl, "POST", data, (res) => {
                if (res.status) {
                    console.log(res)
                    $('.short-popup-msg').find('.popup-desc').html(res.message)
                    $('.short-popup-msg').css("display", "block")
                    let e = $('.short-popup-msg').find('.popup-msg-progressbar')
                    app.fillProgress(e)
                    setInterval(() => {
                        window.location.href = BASE_URL;
                    }, 2000);
                } else {
                    let message = res.message
                    common.popup_error(message)
                }
            }, (err) => {
                console.log(err)
            })
        }else {
            let message = (emailValidator != true) ? emailValidator : passwordValidator
            common.popup_error(message)
        }
    })

    $("form#add-video-form").submit(function (e) {
        e.preventDefault()
        let url = BASE_URL+'/api/add-video'
        let data = {}

        let course_id_elm = $('select[name=course_id]')
        if (course_id_elm.val() == "") {
            course_id_elm.addClass("field-focus-error")
            return false;
        }
        data.course_id = course_id_elm.val()

        let title_elm = $('input[name=title]')
        if (title_elm.val() == "") {
            title_elm.addClass("field-focus-error")
            return false;
        }
        data.title = title_elm.val()

        let url_elm = $('input[name=url]')
        if (url_elm.val() == "") {
            url_elm.addClass("field-focus-error")
            return false;
        }
        data.url = url_elm.val()

        data.description = $('textarea[name=description]').val()
        data.form_type = $("input[name=form_type]").val();
        data.id = $("input[name=id]").val();
        common.ajaxCall(url, "POST", data, (res) => {
            if (res.status) {
                window.location.href = BASE_URL + '/dashboard'
            }
        }, (err) => {
            console.log(err)
        })
    });

    $(".video-url-link").on("click",function(){
        let video_link = $(this).data('id')
        if(video_link!=undefined && video_link!=null && video_link!=''){
            let url = 'https://www.youtube.com/embed/'
            $('iframe.video-iframe').attr('src',url+video_link)
        }
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
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });



    $('.dropdown-sidebar-item').click(function () {
        $(this).addClass("active").siblings().removeClass('active')
        $(this).toggleClass('active').parent().find('.dropdown-sidebar-menu').toggleClass('open')
    })
    $('.dropdown-sidebar-menu-item').click(function () {
        console.log($('.dropdown-sidebar-menu-item'))
        $('.dropdown-sidebar-menu-item').removeClass('active')
        $(this).addClass("active").siblings().removeClass('active')
    })


})(jQuery);


















