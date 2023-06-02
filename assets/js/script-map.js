'use strict';
/*
 * Google Map
 */

let mapIsLoaded = false;
// Load map if visible when the page is loaded
window.addEventListener("load", function() {
    mapLazyLoad();
});
// Load map if window is resized
window.addEventListener("scroll", function() {
    mapLazyLoad();
});
// Reload map if window is resized
window.addEventListener("resize", function() {
    mapLazyLoad();
});

// Load map when visible 
const mapLazyLoad = () => {
    let mapPosition = document.getElementById('map').getBoundingClientRect().top;
    let scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    if (mapPosition <= scrollPosition - 300 && !mapIsLoaded) {
        mapIsLoaded = true;
        setTimeout(function(){
            initMap();
        }, 100);
    }
};

// Get map data
let mapData = [];
const timestamp = new Date().getTime();
(function ($) {

    $.getJSON({url: globals.mapDataTypesFile, cache: false}, function(data) {

        // Get data type 'name' and 'file' from 'map-data-types.json'
        $.each(data, function(key, val) {
            let dataType = {
                name: val.name,
                slug: val.slug,
                file: globals.mapDataFilePath + 'map-data-' + val.slug + '.json?v=' + timestamp,
                icon: globals.assetsPath + 'icons/tma-marker.svg',
                data: [],
                active: true
            };

            // Get each data type JSON file content and store it in dataType['data']
            $.getJSON({url: dataType.file, cache: false}, function(data) {
                $.each(data, function(key, val) {                    
                    dataType['data'].push(val);
                });
            });

            // Add data type to map main data
            mapData.push(dataType);

        });
    });

})(jQuery);

function initMap() {

    setTimeout(function() {

        let mapZoom = 10;
        if (window.innerWidth <= 767) mapZoom = 9;

        const mapTypeStyles = [
            {
                featureType: "all",
                elementType: "labels.text.fill",
                stylers: [
                    {
                        color: "#446D2B",
                    },
                ]         
            },
            {
                featureType: "poi",
                elementType: "labels",
                stylers: [
                    {
                        visibility: "off"
                    },
                ]         
            }, 
        ];

        const mapOptions = {
            center: {
                lat: 46.51950,
                lng: -72.6888536              
            },
            zoom: mapZoom,
            mapTypeId: "roadmap",
            mapTypeControl: false,
            styles: mapTypeStyles,
            backgroundColor: '#fff'            
        };
        
        const googleMap = new google.maps.Map(document.getElementById("gmap"), mapOptions);

        let markerOptions,
            marker,
            infoWindow,
            infoWindowContent;
            
        for (let key in mapData) {

            let locations = mapData[key];          
            if (!locations.active) continue;
            
            for (let location of locations.data) {
               
                markerOptions = {
                    position: new google.maps.LatLng(location.lat, location.lng),
                    optimized: false
                };
                marker = new google.maps.Marker(markerOptions);
                marker.setMap(googleMap);                
                marker.setIcon(locations.icon);
        
                infoWindow = new google.maps.InfoWindow();
        
                (function(marker, location) {
                    google.maps.event.addListener(marker, "click", function(e) {
                        infoWindowContent = "<div class='marker' style='width:150px;min-height:100px'>";
                        infoWindowContent += "<h4 class='marker__title'>" + location.title + "</h4>";
                        infoWindowContent += "<a class='marker__address' href='" + location.gmap_url + "' target='_blank'>" + location.address + "</a>";
                        //infoWindowContent += "<a class='marker__phone' href='tel:+1" + location.phone.replace(/\-|\s/g, "") + "'>" + location.phone + "</a>";
                        //infoWindowContent += "<a class='marker__email' href='mailto:" + location.email + "'>" + locals.email_label + "</a>";
                        infoWindowContent += "<a class='marker__website' href='" + location.website + "' target='_blank'>" + locals.more_info + "</a>";
                        infoWindowContent += "</div>";
                        infoWindow.setContent(infoWindowContent);
                        infoWindow.open(googleMap, marker);
                    });
                })(marker, location);

            }

        }

    }, 100);

}

// Google Map Filters
const filterMapLocations = (category, status) => {
    for (let i = 0; i < mapData.length; i++) {
        if (mapData[i].slug === category) {
            mapData[i].active = status;
        }
    }
};
const filters = document.querySelectorAll('.map-filter');
for (let i = 0; i < filters.length; i++) {
    filters[i].addEventListener('click', function() {
        let category = filters[i].dataset.category;
        let checkbox = filters[i].querySelector('.map-filter__checkbox');
        let isChecked = !checkbox.classList.contains('unchecked');
        if (isChecked) {
            // Uncheck
            checkbox.classList.add('unchecked');
            filterMapLocations(category, false);
        } else {
            // Check
            checkbox.classList.remove('unchecked');
            filterMapLocations(category, true);            
        }
        // Reset map with filtered locations
        initMap();
    });
    
}