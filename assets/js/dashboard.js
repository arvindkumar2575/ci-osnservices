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

        let requrl = BASE_URL+"/api/user/login"
        common.ajaxCall(requrl,"GET",data,(res)=>{
            if(res.status){
                console.log(res)
                $('.short-popup-msg').find('.popup-desc').html(res.message)
                $('.short-popup-msg').css("display","block")
                let e = $('.short-popup-msg').find('.popup-msg-progressbar')
                app.fillProgress(e)
                setInterval(() => {
                    window.location.href=BASE_URL+"/user/dashboard";
                }, 2000);
            }else{
                console.log(res)
            }
        },(err)=>{
            console.log(err)
        })
    })
});

















