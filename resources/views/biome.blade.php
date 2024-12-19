<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biomes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Container de la page avec les images de fond */
        body {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }

        /* Carte de chaque biome */
        .biome-card {
            width: 100%;
            height: 150px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            font-size: 18px;
            margin-bottom: 20px;
        }

        .biome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        /* Grille de biomes */
        .biome-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* 3 colonnes pour chaque ligne */
            gap: 20px;
            margin-top: 40px;
        }

        /* Responsive : une colonne sur petits écrans */
        @media (max-width: 768px) {
            .biome-container {
                grid-template-columns: repeat(1, 1fr);  /* Une colonne sur petits écrans */
            }
        }

        /* Ajustements pour les petites tailles d'écran */
        @media (max-width: 576px) {
            .biome-card {
                height: 120px;
                font-size: 16px;
            }
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listes des Biomes</h1>
        <div class="biome-container" id="biome-list">
            <!-- Les biomes seront injectés ici via JavaScript -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tableau d'images de la nature pour le fond
        const natureImages = [
            'https://th.bing.com/th/id/OIP.FAqLtQqnls5UDVX1_Wt2XgHaEo?rs=1&pid=ImgDetMain', 
            'https://www.10wallpaper.com/wallpaper/1600x1200/1209/waterfalls-Nature_Landscape_Wallpapers_1600x1200.jpg',
             'https://www.downloadclipart.net/large/earth-nature-png-photo.png',
            'https://cdn.shopify.com/s/files/1/0600/5430/6988/files/maple-tree-in-autumn-EK00568_480x480.jpg?v=1638911121',
            'https://th.bing.com/th/id/R.09fa0dd1d30a933824a27b541e7fe9fb?rik=FnPLX7%2fbCaCbFw&riu=http%3a%2f%2ffr.best-wallpaper.net%2fwallpaper%2f1680x1050%2f1308%2fNature-landscape-mountains-river-trees-rocks_1680x1050.jpg&ehk=AR4sx9r4Vwb8H7fNfHtyfJY3i6S2NgzhkD2h8o0sZSE%3d&risl=&pid=ImgRaw&r=0'
        ];

        let currentImageIndex = 0;

        // Fonction pour changer l'image de fond toutes les 3 secondes
        function changeBackgroundImage() {
            document.body.style.backgroundImage = `url(${natureImages[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % natureImages.length; // Retourner au début du tableau quand on atteint la fin
        }

        // Changer l'image de fond toutes les 3 secondes
        setInterval(changeBackgroundImage, 3000);
        changeBackgroundImage();  // Appeler immédiatement pour charger la première image

        // Fonction pour récupérer et afficher les biomes
        async function getBiomes() {
            try {
                // Appel de l'API pour récupérer les biomes
                const response = await fetch('/api/biomes');
                const biomes = await response.json();

                // Récupérer la div de la liste des biomes
                const biomeList = document.getElementById('biome-list');

                // Pour chaque biome, ajouter une carte dans la page
                biomes.forEach(biome => {
                    const biomeCard = document.createElement('div');
                    biomeCard.classList.add('biome-card');
                    biomeCard.style.backgroundColor = biome.color;
                    biomeCard.innerHTML = `
                        <span>${biome.name}</span>
                    `;
                    biomeList.appendChild(biomeCard);
                });
            } catch (error) {
                console.error('Error fetching biomes:', error);
            }
        }

        // Appeler la fonction au chargement de la page
        document.addEventListener('DOMContentLoaded', getBiomes);
    </script>
</body>
</html>
