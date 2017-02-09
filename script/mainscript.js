$(document).ready(function(){
  var offsetName = localStorage.getItem("offsetName");
  if(offsetName != null){
    $('html, body').animate({scrollTop: $(offsetName).offset().top}, 2000)
      localStorage.removeItem("offsetName");
  }
  console.log(offsetName);


  var pageName = getCurentFileName();
  $(".button").click(function(e){
    var button = $(this).text();
    if(button === 'Hem'){
      console.log("Hejsan");
    }
    else if(button === 'Boka'){
      window.location = "./boka-page.html";
      console.log("Hejsan");
    }
    else if(button === 'Tjänster'){
      if(pageName === "boka-page.html"){
        window.location = "./mainpage.html";
        localStorage.setItem('offsetName', '#tjänster');
        return;
      }
      $('html, body').animate({scrollTop: $("#tjänster").offset().top}, 2000)
    }
    else if(button === 'Om oss'){
      if(pageName === "boka-page.html"){
        window.location = "./mainpage.html";
        localStorage.setItem('offsetName', '#om-oss');
        return;
      }
      $('html, body').animate({scrollTop: $("#om-oss").offset().top}, 2000)
    }
    else if(button === 'Kontakta oss'){
      if(pageName === "boka-page.html"){
        window.location = "./mainpage.html";
        localStorage.setItem('offsetName', '#kontakt');
        return;
      }
      $("html, body").animate({ scrollTop: $('#kontakt').offset().top}, 2000)
    }
    else if(button === 'Logga in'){
      $('#login-background').css('visibility', 'hidden');
      //$(this).html("<a>Logga ut</a>");
      $('.login').text("Logga ut");
    }
    else if(button === 'Logga ut'){
      $('#login-background').css('visibility', 'visible');

      $('.login').text("Logga in");
    }
  });
});
function getCurentFileName(){
    var pagePathName= window.location.pathname;
    return pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
}
