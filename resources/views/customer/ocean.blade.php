<link rel="stylesheet" href="resources\css\style.css">
@extends('customer.navbar')

@section('title', 'Home')

@section('content')
<style>
    .navbar {
        position: relative;
        z-index: 1;
    }

    .card-container {
        margin-top: 40px;
    }

    .card {
        position: relative;
        z-index: 0;
    }

    .card-img{
        height: 180px;
    }

    .card-button{
        width: 100px;
    }

    .map{
        background-color: #0a3d62;
        color: white;
        padding: 20px;
        border-radius: 10px;
        max-width: 1000px;
        margin: auto;
    }

    .btn-custom {
        background-color: #00a8ff;
        color: white;
    }

    #map{
        height: 500px;
    }

    #results .dropdown-item {
        cursor: pointer;
        padding: 5px;
    }

    #result .dropdown-item:hover {
        background-color: #f0f0f0;
    }

    .highlighted {
        background-color: #f0f0f0;
    }

</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch/dist/geosearch.css">

<div class="map card-container mt-5 mb-5">
    <h4 class="text-left">DeepIntoOcean</h4>
    <br>
    <h1 class="text-center">Plastic Tracker</h1>
    <p class="text-center" style="text-align: justify">Enter the name of the city, region, or country and
        discover the distribution of plastic waste in the ocean. Monitor how plastic
        pollution affects different areas and track the environmental impact of waste
        in marine environments.</p>
    <form>
        <div class="form-group">
            <label for="location">Location</label>
            <div class="search-box" id ='search'>
                <input type="text" class="form-control searchInput" id="searchInput", placeholder="Discover the map">
                <div class="dropdown-menu" id="results"></div>
            </div>
        </div>
        <button type="button" class="btn btn-custom btn-block" id="findButton">Find</button>
    </form>
    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch/dist/bundle.min.js"></script>
<script src="https://unpkg.com/papaparse@5.3.0/papaparse.min.js"></script>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([0, 0], 2);

    // Tambahkan layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    function addStyledPoints(data) {
        data.forEach(row => {
            if (row.X && row.Y) {
                const lat = parseFloat(row.Y);
                const lng = parseFloat(row.X);
                const mpw = parseFloat(row.mpw);

                if (!isNaN(lat) && !isNaN(lng) && !isNaN(mpw)) {
                    const size = Math.sqrt(mpw) / 2000 + 5; // Adjust divisor for scaling
                    const color = '#0EA7A5';
                    const opacity = 0.6;

                    // Create a custom circle marker
                    const circleMarker = L.circleMarker([lat, lng], {
                        radius: size,
                        color: color,
                        fillColor: color,
                        fillOpacity: opacity,
                        weight: 1
                    });

                    // Add popup for additional details
                    circleMarker.bindPopup(`
                        <strong>Location</strong>: (${lat.toFixed(4)}, ${lng.toFixed(4)})<br>
                        <strong>MPW</strong>: ${mpw}<br>
                        <strong>Area</strong>: ${(row.area && row.area.split('.')[0]) || 'N/A'}
                    `);

                    circleMarker.addTo(map);
                } else {
                    console.warn('Invalid data row:', row);
                }
            } else {
                console.warn('Missing X/Y in row:', row);
            }
        });
    }

    // Load CSV file
    Papa.parse('Data/PlasticRiverInputs.csv', {
        download: true,
        header: true,
        delimiter: ',',
        complete: function(results) {
            console.log('CSV parsed successfully:', results.data);
            addStyledPoints(results.data);
        },
        error: function(error) {
            console.error('Error parsing CSV file:', error);
        }
    });

    const provider = new window.GeoSearch.OpenStreetMapProvider();
    let currentMarker = null;
    let selectedResult = null;
    let results = [];
    let highlightedIndex = -1;

    function performSearch(query){
        provider.search({query}).then(results => {
            const lowercaseQuery = query.toLowerCase();
            results = results.filter(result => result.label.toLowerCase().includes(lowercaseQuery));
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';
            results.forEach((result, index)=> {
                const item = document.createElement('div');
                item.className = 'dropdown-item';
                // item.innerHTML = "${result.label}";
                item.innerHTML = "" + result.label;
                item.dataset.index = index;
                item.addEventListener('click', () => {
                    document.getElementById('searchInput').value = result.label
                    selectedResult = result;
                    resultsContainer.innerHTML = '';
                });
                resultsContainer.appendChild(item);
            });
            resultsContainer.style.display = results.length > 0 ? 'block' : 'none';
        });
    }

    function showLocation(result){
        let zoomLevel = result.bounds ? (result.bounds ? 5 : 10) : 15;
        zoomLevel = Math.min(zoomLevel + 5, 20);

        map.setView([result.y, result.x], zoomLevel);
        if (currentMarker) {
            map.removeLayer(currentMarker);
        }
        currentMarker = L.marker([result.y, result.x]).addTo(map).bindPopup(result.label).openPopup();
    }

    document.getElementById('searchInput').addEventListener('input', function(e) {
        const query = e.target.value;
        if (query.length > 0) {
            performSearch(query);
        } else {
            document.getElementById('results').style.display = 'none';
        }
    });

    document.getElementById('findButton').addEventListener('click', function() {
        if (selectedResult){
            showLocation(selectedResult);
        }
    });

    document.getElementById('searchInput').addEventListener('keydown', function(e) {
        const resultsContainer = document.getElementById('results');
        const items =resultsContainer.getElementsByClassName('dropdown-item')
        if (e.key === 'ArrowDown'){
            e.preventDefault();
            highlightedIndex = (highlightedIndex + 1) % items.length;
            updateHighlightedItem(items);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            highlightedIndex = (highlightedIndex - 1 + items.length) % items.length;
            updateHighlightedItem(items);
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (highlightedIndex >= 0 && highlightedIndex < items.length) {
                items[highlightedIndex].click();
                showLocation(selectedResult);
            }
        }
    });


    document.addEventListener('click', function(event) {
        const searchInput = document.getElementById('searchInput');
        const dropdownMenu = document.getElementById('results');
        if(!searchInput.contains(event.target) && !dropdownMenu.contains(event.target)){
            dropdownMenu.style.display = 'none';
        }
    });

    function updateHighlightedItem(items) {
        Array.from(items).forEach((item, index) => {
            if (index === highlightedIndex) {
                item.classList.add('highlighted');
            } else {
                item.classList.remove('highlighted');
            }
        });
    };

    window.onload =function()
    {
        document.getElementById('searchInput').value = '';
        document.getElementById('results').innerHTML = '';
    }

</script>
@endsection
