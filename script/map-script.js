$(document).ready(function() {

	
	$( "#registerform" ).dialog({ autoOpen: false, modal: true});
		$( "#register" ).click(function() {
  			$( "#registerform" ).dialog( "open" );
		});

	$( "#centralen-form" ).dialog({ autoOpen: false, modal: true});
		$( "#val" ).click(function() {
  			$( "#centralen-form" ).dialog( "open" );
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

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: centralen
        });

         var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Korsvägen</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
           	'<button type="button">Boka</button>'
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker1 = new google.maps.Marker({
          position: korsvagen,
          map: map,
        });
        marker1.addListener('click', function() {
          infowindow.open(map, marker1);
        });

        var marker2 = new google.maps.Marker({
          position: brunnsparken,
          map: map
        });

         var marker3 = new google.maps.Marker({
          position: ostra_hamngatan,
          map: map
        });

        var marker4 = new google.maps.Marker({
          position: gotaplatsen,
          map: map
        });

         var marker5 = new google.maps.Marker({
          position: svingeln,
          map: map
        });


         var marker6 = new google.maps.Marker({
          position: kungsportsplatsen,
          map: map
        });

         var marker7 = new google.maps.Marker({
          position: vasastan,
          map: map
        });

      }






