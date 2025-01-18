var strings = [
  "UNİKAL GƏLİR....",
  "....",
  "....",
  "....",
  "A.Eynşteyn dediyi kimi",
  "Birinci oyunun qaydaların öyrən",
  "Daha sonra hamıdan yaxşı oynamağı",
  ".............",
  "Hacker olmaq, pizza sifariş etmək kimidir;",
  " doğru kombinasiyanı tapanda, ",
  "dünya səninlə olur!",
  "............",
  "Hackerlar üçün 'söz' çox dəyərlidir;",
  " bir sözlə sistemi qıra bilərsən!",
  ".............",
  "Hackerlar musiqiçi kimidirlər",
  " kodlar arası notları tutaraq simfoniyalar yaradırlar.",
  "..............",
  "Hacker olmaq, internetdə it oğurlamaq kimidir,",
  " hər zaman görünməz olursan.",
  "...............",
  "Hacker olmaq, gözlənilməz zərbələr atmaq kimidir;",
  "kiminsə koduna girəndə, oyun başlar!",
  "...............",
  "Hackerların gözündə 0 və 1,",
  "birinci məhəbbət kimi parlayır.",
  "...............",
  "Hackerlar üçün 'giriş' parolu,",
  "həyatın ən sirli bilmecəsidir;",
  "doğru sözü tapanda, qapılar açılır!",
  "................",
  "GÖRDÜN UNİKAL GƏLİR",
  "BİR ADDIM GERİ ÇƏKİL!!!",
  "GÖRDÜN YENƏ GƏLİR",
  "Özünü Şəbəkədən ayır:)",
  "-_- -_- -_-",
  "I) :) :)",
];

var preloader = document.getElementById('preloader');
var delay = 1000;
var count = 0;
var repeat = 0;

function addLog() {
  var row = createLog('kali@unikal$:', count);
  preloader.appendChild(row);
  
  goScrollToBottom();
  
  count++;
  
  if (repeat == 0) {
    if (count > 3) {
      delay = 600;
    }
    
    if (count > 6) {
      delay = 400;
    }
    
    if (count > 8) {
      delay = 200;
    }
    
    if (count > 10) {
      delay = 100;
    }
  } else {
    if (count > 3) {
      delay = 50;
    }
  }
  
  if (count < strings.length) {
    setTimeout(function() {
      return addLog();
    }, delay);
  } else {
    setTimeout(function() {
      delay = 1000;
      return createLog("kali@unikal$:");
    }, 1000);
  }
}

function createLog(type, index) {
  var row = document.createElement('div');
  
  var spanStatus = document.createElement('span');
  spanStatus.className = type;
  spanStatus.innerHTML = type.toUpperCase();
  
  var message = (index != null) 
              ? strings[index] 
              : 'kernel: Initializing...';

  if(index == null) 
  {
    var preloader = $('#preloader');
    jQuery(preloader).fadeOut("slow");
    jQuery("#main").fadeIn("slow");
  }
  
  var spanMessage = document.createElement('span');
  spanMessage.innerHTML = message;
  
  row.appendChild(spanStatus);
  row.appendChild(spanMessage);
  
  return row;
}

function goScrollToBottom() {
  $(document).scrollTop($(document).height()); 
}

function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// below method reference https://stackoverflow.com/questions/5639346/what-is-the-shortest-function-for-reading-a-cookie-by-name-in-javascript/25490531#25490531
function getCookie(a) {
  var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
  return b ? b.pop() : '';
}

function checkCookie() {
  var user=getCookie("visited"); 
  if (user == 1) {   
    setCookie("visited", 1, 30); //this will update the cookie      
    jQuery("#main").fadeIn("slow"); 
  } else {  
    addLog();      
    setCookie("visited", 1, 30);   

  }
}

checkCookie();


