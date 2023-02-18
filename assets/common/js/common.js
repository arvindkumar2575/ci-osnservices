let common = {}
let cookie = {}
let validation ={}


common.fillProgress = (e) => {
    let i = 0;
    var width = 1;
    var id = setInterval(frame, 20);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        $(e).width(width + "%");
      }
    }
}

common.ajaxCall = (url,type,data,onSucces,onError,onComplete)=>{
  let r = {}
  r.url = url
  r.type = type
  r.dataType = "json"
  r.header = {'x_key':'osn-ajaxcallkey'}
  r.data = data
  r.success = onSucces
  r.error = onError
  r.complete = onComplete

  $.ajax(r)
}

common.popup_error = (message)=>{
  let espace = $('.short-popup-msg')
  let error = message
  espace.find('.popup-title').html(error)
  espace.show()
  setTimeout(() => {
      espace.hide()
      espace.find('.popup-title').html('')
  }, 2000);
}





cookie.setCookie = (cName, cValue, expDays)=> {
  let date = new Date();
  date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
  const expires = "expires=" + date.toUTCString();
  document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}




// validation 
validation.email = (email)=>{
  var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(email==null || email==undefined || email==''){
      return 'Required email address!';
  }else if(email.match(emailRegex)){
      return true;
  }else{
      return 'Required valid email!';
  }
}
validation.password = (password)=>{
  if(password==null || password==undefined || password==''){
      return 'Required password';
  }else if(password.length>8 && password.length<20){
      return true;
  }else{
      return 'Password must be of length 8 to 20.';
  }
}


common.searchNameEmail = (val)=>{
  let url = BASE_URL + '/api/search-name-email'
  data={q:val}
  common.ajaxCall(url, "GET", data, (res) => {

    if (res.status) {
        if(res.data.length>0){
            ls = '';
            res.data.forEach(e => {
                ls+=`<li class="ss-list" data-id="`+e.id+`"><span class="user_name">`+e.username+`</span><span>(`+e.first_name+` `+e.last_name+`)</span></li>`
            });
            let elm = `<ul class="search-ul-list">`+ls+`</ul>`
            $('.filter-form .search-list').html(elm)
            $('.filter-form .search-list').show();
        }else{
            $('.filter-form .search-list').hide();
            $('.filter-form .search-list').html('')
        }
    } else {
        console.log(res)
    }
  }, (err) => {
      console.log(err)
  })
}