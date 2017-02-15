$(document).ready(function() {

	
	$( "#registerform" ).dialog({ autoOpen: false, modal: true});
		$( "#register" ).click(function() {
  			$( "#registerform" ).dialog( "open" );
		});

});

 function initMap() {
        var centralen = {lat: 57.708876, lng: 11.973498999999947};
        var korsvagen = {lat: 57.6965417, lng: 11.986207199999967};
        var brunnsparken = {lat: 57.70676690000001, lng: 11.969477900000015};
        var ostra_hamngatan = {lat: 57.70734340000001, lng: 11.967847900000038};
        var gotaplatsen = {lat: 57.69706859999999, lng: 11.97935229999996};
        var svingeln = {lat: 57.71218189999999, lng: 11.990629500000068};
        var kungsportsplatsen = {lat: 57.70394419999999, lng: 11.970055099999968};
        var vasastan = {lat:57.6951428, lng: 11.9682636};
        var gronsakstorget =  {lat: 57.70223859999999, lng: 11.965698599999996};

         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: centralen
        });

     
         var contentStringKorsvegen = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Korsvägen</h1>'+
            '<label>Område:</label> Korsvägen'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 130' +
            '<br>'+ 
            '<label>Räckvidd:</label> 1000000' +
            '<br>'+
            '<label>Pris:</label>' +
            '<br>' +
            '</div>'+
            '</div>';

             var contentStringBrunnsparken = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Brunnsparken</h1>'+
            '<label>Område:</label> Brunnsparken'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 100' +
            '<br>'+ 
            '<label>Räckvidd:</label> 700000' +
            '<br>'+
            '<label>Pris:</label> 20000' +
            '<br>' +
            '</div>'+
            '</div>';

            var contentStringVasastan = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Vasastan</h1>'+
            '<label>Område:</label> Vasastan'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 80' +
            '<br>'+ 
            '<label>Räckvidd:</label> 350000' +
            '<br>'+
            '<label>Pris:</label> 80000' +
            '<br>' +
            '</div>'+
            '</div>';

             var contentStringGotaplatsen = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Gotaplatsen</h1>'+
            '<label>Område:</label> Götaplatsen'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 100' +
            '<br>'+ 
            '<label>Räckvidd:</label> 53000' +
            '<br>'+
            '<label>Pris:</label> 900000' +
            '<br>' +
            '</div>'+
            '</div>';

            var contentStringOstra = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Östra Hamngatan</h1>'+
            '<label>Område:</label> Östra Hamngatan'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 80' +
            '<br>'+ 
            '<label>Räckvidd:</label> 70000' +
            '<br>'+
            '<label>Pris:</label> 40000' +
            '<br>' +
            '</div>'+
            '</div>';


            var contentStringSvingeln = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Svingeln</h1>'+
            '<label>Område:</label> Svingeln'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 100' +
            '<br>'+ 
            '<label>Räckvidd:</label> 30000' +
            '<br>'+
            '<label>Pris:</label> 30000' +
            '<br>' +
            '</div>'+
            '</div>';

            var contentStringGronsak = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Grönskastorget</h1>'+
            '<label>Område:</label> Grönskastorget'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 100' +
            '<br>'+ 
            '<label>Räckvidd:</label> 450000' +
            '<br>'+
            '<label>Pris:</label> 50000' +
            '<br>' +
            '</div>'+
            '</div>';

            var contentStringKung = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Kungsportsplatsen</h1>'+
            '<label>Område:</label> Kungsportsplatsen'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 120' +
            '<br>'+ 
            '<label>Räckvidd:</label> 4700000' +
            '<br>'+
            '<label>Pris:</label> 150000' +
            '<br>' +
            '</div>'+
            '</div>';

            var contentStringCentralen = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Centralstationen</h1>'+
            '<label>Område:</label> Centralstationen'+
            '<br>'+
            '<label>Typ:</label> Mobile/Display' +
            '<br>' +
            '<label>Storlek:</label> 100' +
            '<br>'+ 
            '<label>Räckvidd:</label> 1500000' +
            '<br>'+
            '<label>Pris:</label> 80000' +
            '<br>' +
            '</div>'+
            '</div>';


        var infowindow1 = new google.maps.InfoWindow({
          content: contentStringKorsvegen,
        });


        var infowindow2 = new google.maps.InfoWindow({
          content: contentStringBrunnsparken,
        });


        var infowindow3 = new google.maps.InfoWindow({
          content: contentStringOstra,
        });


        var infowindow4 = new google.maps.InfoWindow({
          content: contentStringGotaplatsen
        });

         var infowindow5 = new google.maps.InfoWindow({
          content: contentStringSvingeln
        });

         var infowindow6 = new google.maps.InfoWindow({
          content: contentStringKung
        });

        var infowindow7 = new google.maps.InfoWindow({
          content: contentStringVasastan
        });

        var infowindow8 = new google.maps.InfoWindow({
          content: contentStringGronsak
        });

        var infowindow9 = new google.maps.InfoWindow({
          content: contentStringCentralen
        });


        var windowList = [infowindow1,infowindow2,infowindow3,infowindow4,infowindow5,infowindow6,infowindow7,infowindow8,infowindow9];

        var marker1 = new google.maps.Marker({
          position: korsvagen,
          map: map
        });

        marker1.addListener('click', function() {
          for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow1){
              infowindow1.open(map, marker1);  
            }
            else {
                windowList[i].close();
            }
          }  
        });

        var marker2 = new google.maps.Marker({
          position: brunnsparken,
          map: map
        });
        marker2.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow2){
              infowindow2.open(map, marker2);  
            }
            else {
                windowList[i].close();
            }
          }
        });


         var marker3 = new google.maps.Marker({
          position: ostra_hamngatan,
          map: map
        });
        marker3.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow3){
              infowindow3.open(map, marker3);  
            }
            else {
                windowList[i].close();
            }
          }
        });

        var marker4 = new google.maps.Marker({
          position: gotaplatsen,
          map: map
        });
        marker4.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow4){
              infowindow4.open(map, marker4);  
            }
            else {
                windowList[i].close();
            }
          }
        });

         var marker5 = new google.maps.Marker({
          position: svingeln,
          map: map
        });
        marker5.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow5){
              infowindow5.open(map, marker5);  
            }
            else {
                windowList[i].close();
            }
          }
        });


         var marker6 = new google.maps.Marker({
          position: kungsportsplatsen,
          map: map
        });
        marker6.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow6){
              infowindow6.open(map, marker6);  
            }
            else {
                windowList[i].close();
            }
          }
        });

        var marker7 = new google.maps.Marker({
          position: vasastan,
          map: map
        });
        marker7.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow7){
              infowindow7.open(map, marker7);  
            }
            else {
                windowList[i].close();
            }
          }
        });

        var marker8 = new google.maps.Marker({
          position: gronsakstorget,
          map: map
        });
        marker8.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow8){
              infowindow8.open(map, marker8);  
            }
            else {
                windowList[i].close();
            }
          }
        });

        var marker9 = new google.maps.Marker({
          position: centralen,
          map: map
        });
        marker9.addListener('click', function() {
           for(i=0; i <= windowList.length; i++){
            if(windowList[i] === infowindow9){
              infowindow9.open(map, marker9);  
            }
            else {
                windowList[i].close();
            }
          }
        });

      }






