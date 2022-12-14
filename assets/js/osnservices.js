let app = {};

let url = window.location.href;





// on ready function 
$(document).ready(function() {

    if(url.indexOf("contact-us") > -1) {
        let urlParams = new URLSearchParams(window.location.search);
        let q = urlParams.has("q")?urlParams.get("q"):""
        if(q===""){
            app.contactFormSelector();
        }else{
            app.contactFormSelector(q);
        }
    }

    $(".contact-form").find("input,textarea,select").click(function(e) {
        if($(this).hasClass("field-focus-error")){
            $(this).removeClass("field-focus-error")  
        }
    })


    $('#contact-btn-success').click(function(e) {
        e.preventDefault()
        let data = {};
        // first name 
        let first_name_elm =  $('input[name=First_Name]')
        if(first_name_elm.val()==""){
            first_name_elm.addClass("field-focus-error")
            return false;
        }
        data.first_name=first_name_elm.val()
    
        // last name 
        let last_name_elm =  $('input[name=Last_Name]')
        if(last_name_elm.val()==""){
            last_name_elm.addClass("field-focus-error")
            return false;
        }
        data.last_name=last_name_elm.val()
    
        // email id 
        let email_id_elm =  $('input[name=Email_Id]')
        if(email_id_elm.val()==""){
            email_id_elm.addClass("field-focus-error")
            return false;
        }
        data.email_id=email_id_elm.val()
    
        // mobile no 
        let mobile_no_elm =  $('input[name=Mobile_No]')
        if(mobile_no_elm.val()==""){
            mobile_no_elm.addClass("field-focus-error")
            return false;
        }
        data.mobile_no=mobile_no_elm.val()
    
        // reason option 
        let reason_options_elm =  $('select[name=Option-1]')
        if(reason_options_elm.val()==""){
            reason_options_elm.addClass("field-focus-error")
            return false;
        }
        data.reason_options=reason_options_elm.val()
    
        // default message 
        let default_message_elm =  $('textarea[name=Message-Default]')
        data.default_message=default_message_elm.val()
    
        // itr options 
        let itr_options_elm =  $('select[name=Option-2]')
        data.itr_options=itr_options_elm.val()
    
        data.form_type=$('input[name=form_type]').val()
        // console.log(data)
        let requrl=BASE_URL+"/api/form-submit"
        common.ajaxCall(requrl,"POST",data,(res)=>{
            if(res.status){
                console.log(res)
                $('.short-popup-msg').find('.popup-desc').html(res.message)
                $('.short-popup-msg').css("display","block")
                let e = $('.short-popup-msg').find('.popup-msg-progressbar')
                app.fillProgress(e)
                setInterval(() => {
                    window.location.href=BASE_URL;
                }, 2000);
            }else{
                console.log(res)
            }
        },(err)=>{
            console.log(err)
        })
    })
});

app.contactFormSelector = (q=null) => {
    var x = document.getElementById("option-1").value;
    if(q!=null){
        let select = $('#option-1');
        if(q=="new-customer"){
            select.val("New Customer").change();
        }else if(q=="itr-filing"){
            select.val("ITR Filing").change();
        }else if(q=="dashboard"){
            select.val("Dashboard Query").change();
        }
    }else{
        if (x == '') {
            document.getElementById("message-div").style.display = 'none';
            document.getElementById("itr-info-div").style.display = 'none';
        }else if (x == 'New Customer') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write Your Message")
        }else if (x == 'Information regarding ITR') {
            document.getElementById("message-div").style.display = 'none';
            document.getElementById("itr-info-div").style.display = 'flex';
        }else if (x == 'ITR Filing') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write Your Message & Time between we can connect you.")
        }else if (x == 'Referral') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write the details of the Referral Person (Name & Contact No.)")
        }else if (x == 'Dashboard Query') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write the query regarding your dashboard")
        }
    }
}

app.changePlaceholder = (text) => {
    $("textarea[name='Message-Default']").attr("placeholder",text)
}

app.fillProgress = common.fillProgress;








// ajax call 



