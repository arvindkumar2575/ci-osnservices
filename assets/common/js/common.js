let common = {}
let cookie = {}


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





cookie.setCookie = (cName, cValue, expDays)=> {
  let date = new Date();
  date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
  const expires = "expires=" + date.toUTCString();
  document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}