$(document).ready(function(){var a=new GMaps({el:"#demo-marker-map",lat:37.336095,lng:-121.8885431});a.addMarker({lat:37.336095,lng:-121.8885431,title:"Location",click:function(a){$.jasmineNoty({type:"info",icon:"fa fa-info",message:"You clicked in the marker",container:"floating",timer:3500})},mouseover:function(a){console.log&&console.log(a)},infoWindow:{content:"<div>HTML Content</div>"}});var c=(GMaps.createPanorama({el:"#demo-panorama-map",lat:37.336095,lng:-121.8885431}),new GMaps({div:"#demo-overlays-map",lat:37.336095,lng:-121.8885431}));c.drawOverlay({lat:c.getCenter().lat(),lng:c.getCenter().lng(),content:'<div class="popover top" style="display:block; width:200px"><div class="arrow"></div><div class="popover-content"><strong>You are here</strong><p>1 Washington Sq, San Jose, CA 95192, United States</p></div></div>',verticalAlign:"top",horizontalAlign:"center"});var d=new GMaps({div:"#demo-type-map",lat:37.336095,lng:-121.8885431,mapTypeControlOptions:{mapTypeIds:["hybrid","roadmap","satellite","terrain","osm","cloudmade"]}});d.addMapType("osm",{getTileUrl:function(a,b){return"http://tile.openstreetmap.org/"+b+"/"+a.x+"/"+a.y+".png"},tileSize:new google.maps.Size(256,256),name:"OpenStreetMap",maxZoom:18}),d.addMapType("cloudmade",{getTileUrl:function(a,b){return"http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/"+b+"/"+a.x+"/"+a.y+".png"},tileSize:new google.maps.Size(256,256),name:"CloudMade",maxZoom:18}),d.setMapTypeId("osm");var e=new GMaps({div:"#demo-geocoding-map",lat:-12.043333,lng:-77.028333});$("#demo-geocoding-form").submit(function(a){a.preventDefault(),GMaps.geocode({address:$("#demo-geocoding-address").val().trim(),callback:function(a,b){if("OK"==b){var c=a[0].geometry.location;e.setCenter(c.lat(),c.lng()),e.addMarker({lat:c.lat(),lng:c.lng()})}}})})});