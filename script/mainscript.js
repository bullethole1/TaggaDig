$(document).ready(function(){
  var offsetName = localStorage.getItem("someVarName");
  /*if(offsetName != null){
    $('html, body').animate({
                        scrollTop: $("#om-oss").offset().top
                    }, 2000)
  offsetName = null;
  }*/
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
      }
      $('html, body').animate({
                          scrollTop: $("#tjänster").offset().top
                      }, 2000)
    }
    else if(button === 'Om oss'){
      if(pageName === "boka-page.html"){
        window.location = "./mainpage.html";
        localStorage.setItem('offsetName', '#om-oss');
      }
      $('html, body').animate({
                          scrollTop: $("#om-oss").offset().top
                      }, 2000)
    }
    else if(button === 'Kontakta oss'){
      if(pageName === "boka-page.html"){
        window.location = "./mainpage.html";
      }
      $("html, body").animate({ scrollTop: $(document).height() }, 2000);
      return false;
    }
    else if(button === 'Logga in'){
      //$(this).html("<a>Logga ut</a>");
      $('.login').text("Logga ut");
    }
    else if(button === 'Logga ut'){
      $('.login').text("Logga in");
    }
  });
});
function getCurentFileName(){
    var pagePathName= window.location.pathname;
    return pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
}
