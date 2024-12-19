<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive du Parc Animalier</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        #map {
            height: 80vh; /* La carte occupe 80% de la hauteur */
        }
        .controls {
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .distance-info {
            background: white;
            padding: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="controls">
        <label for="start">Votre position actuelle :</label>
        <select id="start">
            <option value="">Sélectionnez votre position</option>
        </select>
        <label for="destination">Votre destination :</label>
        <select id="destination">
            <option value="">Sélectionnez votre destination</option>
        </select>
        <button onclick="calculateRoute()">Calculer l'itinéraire</button>
    </div>
    <div id="map"></div>
    <div class="distance-info">
        <p id="distance-text">La distance et le temps seront affichés ici après calcul.</p>
    </div>

    <script>
        // Initialisation de la carte
        const map = L.map('map', {
            crs: L.CRS.Simple,
            minZoom: -2
        });

        // Dimensions de l'image (ajustez selon votre image)
        const imageUrl = "https://www.parcanimalierlabarben.com/wp-content/uploads/2024/09/PLANS-DU-PARC-2024-WEB-FR-1.jpg";
        const imageBounds = [[0, 0], [1000, 1500]]; // Ajustez les dimensions selon l'image
        L.imageOverlay(imageUrl, imageBounds).addTo(map);
        map.fitBounds(imageBounds);

        // Liste des emplacements clés du parc
        const locations = [
            { name: "Toilettes", coords: [200, 300] },
            { name: "Point d'eau", coords: [400, 500] },
            { name: "Boutique", coords: [600, 700] },
            { name: "Trajet train", coords: [800, 900] },
            { name: "Tente pédagogique", coords: [150, 400] },
            { name: "Paillote", coords: [700, 200] },
            { name: "Café nomade", coords: [300, 600] },
            { name: "Petit café", coords: [500, 800] },
            { name: "Plateau des jeux", coords: [350, 950] },
            { name: "Espace pique-nique", coords: [450, 100] },
            { name: "Point de vue", coords: [850, 300] },
            { name: "La Bergerie des reptiles", coords: [100, 200] },
            { name: "Le Vallon des cascades", coords: [200, 800] },
            { name: "Le Belvédère", coords: [300, 700] },
            { name: "Le Plateau", coords: [400, 400] },
            { name: "Les Clairières", coords: [500, 200] },
            { name: "Le Bois des pins", coords: [600, 600] }
        ];

        // Remplissage des sélections
        const startSelect = document.getElementById("start");
        const destinationSelect = document.getElementById("destination");

        locations.forEach((location, index) => {
            const option1 = document.createElement("option");
            option1.value = index;
            option1.textContent = location.name;
            startSelect.appendChild(option1);

            const option2 = document.createElement("option");
            option2.value = index;
            option2.textContent = location.name;
            destinationSelect.appendChild(option2);
        });

        // Ajout des marqueurs pour chaque emplacement
        locations.forEach(location => {
            L.marker(map.unproject(location.coords, map.getMaxZoom()))
                .addTo(map)
                .bindPopup(location.name);
        });

        // Fonction pour calculer la distance et le temps
        function calculateDistanceAndTime(pointA, pointB) {
            const dx = pointB[0] - pointA[0];
            const dy = pointB[1] - pointA[1];
            const distance = Math.sqrt(dx * dx + dy * dy); // Distance en unités de la carte

            // Échelle : ajustez cette valeur si nécessaire (ex : 1 unité = 10 m)
            const scale = 1; // Exemple : 1 unité de carte = 1 mètre
            const distanceInMeters = distance * scale;

            // Temps estimé (vitesse de marche = 5 km/h = 5000 m / 3600 s)
            const walkingSpeed = 5000 / 3600; // Vitesse en mètres par seconde
            const timeInSeconds = distanceInMeters / walkingSpeed;

            // Formatage du temps
            const minutes = Math.floor(timeInSeconds / 60);
            const seconds = Math.round(timeInSeconds % 60);

            // Affichage des résultats
            return {
                distance: distanceInMeters.toFixed(2),
                time: `${minutes} min ${seconds} s`
            };
        }

        // Fonction pour calculer et afficher l'itinéraire
        function calculateRoute() {
            const startIndex = startSelect.value;
            const destinationIndex = destinationSelect.value;

            if (!startIndex || !destinationIndex) {
                alert("Veuillez sélectionner votre position actuelle et votre destination.");
                return;
            }

            const startLocation = locations[startIndex];
            const destinationLocation = locations[destinationIndex];

            const result = calculateDistanceAndTime(
                startLocation.coords,
                destinationLocation.coords
            );

            document.getElementById("distance-text").innerText = `
                Distance : ${result.distance} mètres
                Temps estimé : ${result.time}
            `;

            // Ajouter des marqueurs pour le départ et la destination
            L.marker(map.unproject(startLocation.coords, map.getMaxZoom()))
                .addTo(map)
                .bindPopup(`Départ : ${startLocation.name}`)
                .openPopup();

            L.marker(map.unproject(destinationLocation.coords, map.getMaxZoom()))
                .addTo(map)
                .bindPopup(`Destination : ${destinationLocation.name}`)
                .openPopup();
        }
    </script>
</body>
</html>
