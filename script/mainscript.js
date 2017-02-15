$(document).ready(function(){
  var offsetName = localStorage.getItem("offsetName");
  if(offsetName != null){
    $('html, body').animate({scrollTop: $(offsetName).offset().top}, 2000)
      localStorage.removeItem("offsetName");
  }


  var pageName = getCurentFileName();
  console.log(pageName);

  $(".button").click(function(e){
    var button = $(this).text();
    if(button === 'Hem'){
      window.location = "./index.html";
    }
    else if(button === 'Boka'){
      window.location = "./boka-page.html";
    }
    else if(button === 'Tjänster'){
      if(pageName !== "index.html"){
        localStorage.setItem('offsetName', '#tjänster');
        window.location = "./index.html";
        return;
      }
      $('html, body').animate({scrollTop: $("#tjänster").offset().top}, 2000)
    }
    else if(button === 'Om oss'){
      if(pageName !== "index.html"){
        localStorage.setItem('offsetName', '#om-oss');
        window.location = "./index.html";
        return;
      }
      $('html, body').animate({scrollTop: $("#om-oss").offset().top}, 2000)
    }
    else if(button === 'Kontakta oss'){
      if(pageName !== "index.html"){
        localStorage.setItem('offsetName', '#kontakt');
        window.location = "./index.html";
        return;
      }
      $("html, body").animate({ scrollTop: $('#kontakt').offset().top}, 2000)
    }
    /*else if(button === 'Logga in'){
      $('#login-background').css('visibility', 'hidden');
      //$(this).html("<a>Logga ut</a>");
      $('.login').text("Logga ut");
    }
    else if(button === 'Logga ut'){
      $('#login-background').css('visibility', 'visible');

      $('.login').text("Logga in");
    }*/
  });
  $("#boka").click(function(e){
      window.location = "./bokningsformulär.html";
  });
});

function getCurentFileName(){
    var pagePathName= window.location.pathname;
    return pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
}
