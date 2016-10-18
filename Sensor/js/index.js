$(document).ready(function() {
  var lat = document.getElementById("lat").value;
  var lon = document.getElementById("lon").value;
  var search = ''+lat +','+lon+'';
  loadWeather(search + ''); //@params location, woeid
});

function loadWeather(location, woeid) {
  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: 'c',
    success: function(weather) {
      if (weather.currently == "Mostly Sunny"){
        document.getElementById("tempoAgora").innerHTML = "Predominantemente ensolarado";
      }
      else if (weather.currently == "Mostly Cloudy"){
        document.getElementById("tempoAgora").innerHTML = "Predominantemente nublado";
      }
      else if (weather.currently == "Showers"){
        document.getElementById("tempoAgora").innerHTML = "Chuvoso";
      }else if (weather.currently == "Partly Cloudy"){
        document.getElementById("tempoAgora").innerHTML = "Parcialmente Nublado";
      }

      else{
        document.getElementById("tempoAgora").innerHTML = weather.currently;
      }

      document.getElementById("temperatura").innerHTML = weather.temp + " º"+weather.units.temp;
      document.getElementById("cidade").innerHTML = weather.city;
    }
  });
}
