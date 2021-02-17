<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Nils Salger">
    <meta name="keywords" content="Schornsteinfeger, Handwerker, Allrounder, Hilden">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <link rel="stylesheet" href="../CSS/styling.css">
    <style>
        .map {
            height: 400px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
    <title>Anfahrt</title>
</head>

<body>
    <header>
        <h1>Anfahrt</h1>
    </header>

    <nav class="Inhalt">
        <hr />
        <a href="../index.php" style="margin-left: -2.5%;">Home</a>
        <a href="Faehigkeiten.php">Fähigkeiten</a>
        <a href="Preise.php">Preise</a>
        <a href="Beispiele_unserer_Arbeit.php">Beispiele unserer Arbeit</a>
        <a href="Kontakt.php">Kontakt</a>
        <a href="Anfahrt.php">Anfahrt</a>
        <a href="Beschwerden.php">Beschwerden</a>
        <hr />
    </nav>

    <div class="drive">
        <p>Sollten sie keine möglichkeit haben uns Telefonisch oder per Mail zu erreichen, können sie uns auch
            zu unseren Unternehmen kommen, und persönlich mit uns in Kontakt kommen.</p>
        <div id="map" class="map"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
        <script type="text/javascript">
            var map = new ol.Map({
                target: 'map',
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM()
                    })
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat([6.947701, 51.167097]),
                    zoom: 17
                })
            });
            var layer = new ol.layer.Vector({
                source: new ol.source.Vector({
                    features: [
                        new ol.Feature({
                            geometry: new ol.geom.Point(ol.proj.fromLonLat([6.947701, 51.167097]))
                        })
                    ]
                })
            });
            map.addLayer(layer);

            var container = document.getElementById('popup');
            var content = document.getElementById('popup-content');
            var closer = document.getElementById('popup-closer');

            var overlay = new ol.Overlay({
                element: container,
                autoPan: true,
                autoPanAnimation: {
                    duration: 250
                }
            });
            map.addOverlay(overlay);

            closer.onclick = function() {
                overlay.setPosition(undefined);
                closer.blur();
                return false;
            };

            content.innerHTML = 'Schornsteinfeger <br>Berufskolleg Hilden';
            overlay.setPosition(ol.proj.fromLonLat([6.947701, 51.167097]));
        </script>

        <footer class="Inhalt">
            <hr />
            <a href="Impressum.php" style="margin-left: -2.5%;">Impressum</a>
            <a href="Datenschutz.php">Datenschutz</a>
            <hr />
        </footer>
</body>

</html>