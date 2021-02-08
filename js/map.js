
$( document ).ready(function() {
    let $map = document.querySelector('#map')




class LeafletMap {
  constructor () {
    this.map = null
    this.bounds = []
    this.icones 
  }

  async load (element) {
    return new Promise((resolve, reject) => {
      $script(['https://unpkg.com/leaflet@1.6.0/dist/leaflet.js'], () => {
        this.map = L.map(element, {scrollWheelZoom: false})
        L.tileLayer('//api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets',
          accessToken: 'pk.eyJ1IjoibWVyY2FudG8iLCJhIjoiY2sxdzQ5a3ViMDhndzNmbXB6YXN5eDRxbCJ9.WX3HX5wFEoGxTZTgD2ctIA'

        }).addTo(this.map)

        var itIcone = L.icon({
      iconUrl : "./images/pizza.png",
      iconSize:     [60, 60], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [10, -90] // point from which the popup should open relative to the iconAnchor
    });

    var asiatIcone = L.icon({
      iconUrl : "./images/asiat.png",
      iconSize:     [60, 60], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [10, -90] // point from which the popup should open relative to the iconAnchor
    });

    var fastIcone = L.icon({
      iconUrl : "./images/test.png",
      iconSize:     [60, 60], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [10, -90] // point from which the popup should open relative to the iconAnchor
    });

    var locaIcone = L.icon({
      iconUrl : "./images/loca.png",
      iconSize:     [60, 60], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [10, -90] // point from which the popup should open relative to the iconAnchor
    });

    var defaultIcone = L.icon({
      iconUrl : "./images/icons8-marqueur-96.png.png",
      iconSize:     [60, 60], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [10, -90] // point from which the popup should open relative to the iconAnchor
    });


    this.icones = { "italien" : itIcone,
    "asiatique" : asiatIcone,
    "fastfood" : fastIcone,
    "localisation" : locaIcone,
    "default" : defaultIcone

    };
        resolve()
      })
    })
  }



  addMarker (lat, lng, text ,title , type) {
    let point = [lat, lng]
    this.bounds.push(point)
    //console.log(this.icones);
    var icone;
    switch (type) {
      case 'asiatique' :
        icone= this.icones["asiatique"];
        break;
      case 'fastfood' : 
        icone = this.icones["fastfood"];
        break;
      case 'localisation' : 
        icone = this.icones["localisation"];
        break;
      case 'italien' :
        icone = this.icones["italien"];
        break;
      default:
        icone = this.icones["default"];

    }
    return new LeafletMarker(point, text, this.map, title , type , icone)
  }

  center () {
    this.map.fitBounds(this.bounds)
  }

  locate(){
    var rep ="error";
    //this.map.locate({setView: true, maxZoom: 18});
    this.map.locate({setView: true}) /* This will return map so you can do chaining */
        .on('locationfound', function(e){
             rep=e.latlng;
            //mark.openPopup();

        })
       .on('locationerror', function(e){
            console.log(e);
            //alert("Location access denied.");
        });
       return rep;
  }



}


class LeafletMarker {
  constructor (point, text, map , title , type , icone) {
    this.text = text

    this.mark = L.marker(point, {
        elevation: 260.0,
        title: title,
        icon: icone
      })
      .addTo(map)
      .bindPopup(text)
  }

  openPopup () {
    this.mark.openPopup();
  }



}

const initMap = async function () {
  let map = new LeafletMap()
  await map.load($map)
  Array.from(document.querySelectorAll('.js-marker')).forEach((item) => {
    var marker = map.addMarker(item.dataset.lat, item.dataset.lng, item.innerHTML, item.dataset.title, item.dataset.type)
    item.addEventListener('click', function() {
      marker.openPopup()
    })

  })
  map.center()


  /*$('#locate-position').on('click', function(){
    console.log("click");
  });*/



}

if ($map !== null) {
  initMap()
}

});