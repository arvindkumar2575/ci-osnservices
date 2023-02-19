let app = {};

let url = window.location.href;

const dobj = {
    q:['itr-filing','gst-registration','dashboard','accounting','new-customer'],
    map:{
        'itr-filing':'ITR Filing',
        'gst-registration':'GST Registration Query',
        'dashboard':'Dashboard Query',
        'accounting':'Accounting Query',
        'new-customer':'New Customer'
    },
    unmapped:{
        'new-referral':'Referral',
        'itr-information':'Information regarding ITR',
    }
}





// on ready function 
$(document).ready(function() {

    if(url.indexOf("contact-us") > -1) {
        let urlParams = new URLSearchParams(window.location.search);
        let q = urlParams.has("q")?urlParams.get("q"):""
        if(q==""){
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

    $('.product-video-dropdown-menu').on('click',function(){
        $(this).parent().find('ul').toggleClass('open')
    })


    $(document).on('change','select[name=plan_select]',function(e){
        e.preventDefault();
        let plan_val = $(this).val()
        let plan_price = $(this).find(':selected').data('plan-price')
        let plan_discount = $(this).find(':selected').data('plan-discount')
        let plan_duration = $(this).find(':selected').data('plan-duration')
        let elm = $(this).parents('.product-card').find('.product-price')
        // console.log(elm)
        
        if(plan_val != '0'){
            $(elm).html('')
            let dis_price = Math.round(((100-plan_discount)/plan_price)*100)
            let html = `<span>Price: ₹${dis_price}</span>
            <span class="text-decoration-line-through px-2">₹${plan_price}</span>
            <span class="">Duration: ${plan_duration==0?'Lifetime':plan_duration+' Months'}</span>`
            $(elm).html(html)
        }else{
            let err = '<span class="plan-error">Please select plan</span>'
            $(elm).html(err)
        }
    })

    $(document).on('click','button.btn-register',function(e){
        e.preventDefault();
        let course_id = $(this).data('course-id')
        let elm = $(document).find('.product-card-'+course_id)
        let plan = $(elm).find('select[name=plan_select]')
        let plan_val = $(plan).val()
        let plan_price = $(plan).find(':selected').data('plan-price')
        let plan_discount = $(plan).find(':selected').data('plan-discount')
        let plan_duration = $(plan).find(':selected').data('plan-duration')
        // console.log(plan_val)

        if(plan_val != '0'){
            let dis_price = Math.round(((100-plan_discount)/100)*plan_price)
            let data = {
                course_id:parseInt(course_id),
                plan_id:parseInt(plan_val),
                plan_price:plan_price,
                plan_discount:plan_discount,
                plan_duration:plan_duration,
                plan_discount_price:dis_price,
                form_type:'Plan_Register',
            }
            let jsondata = window.btoa(JSON.stringify(data)) 
            window.location.href=BASE_URL+'/register?request='+jsondata;
        }else{
            let err = '<span class="plan-error">Please select plan</span>'
            $(elm).find('.product-price').html(err)
        }

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
        }else if(q=="gst-registration"){
            select.val("GST Registration Query").change();
        }else if(q=="accounting"){
            select.val("Accounting Query").change();
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
            app.changePlaceholder("Write the query regarding your dashboard i.e, some points of dashboard features that you want")
        }else if (x == 'GST Registration Query') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write the query regarding gst registration & provide details of your business")
        }else if (x == 'Accounting Query') {
            document.getElementById("message-div").style.display = 'flex';
            document.getElementById("itr-info-div").style.display = 'none';
            app.changePlaceholder("Write the query regarding accounting work & provide details of your business")
        }
    }
}

app.changePlaceholder = (text) => {
    $("textarea[name='Message-Default']").attr("placeholder",text)
}

app.fillProgress = common.fillProgress;








// ajax call 



