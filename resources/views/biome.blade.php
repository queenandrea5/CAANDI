<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biomes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }

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
            cursor: pointer;
        }

        .biome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .biome-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .biome-container {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media (max-width: 576px) {
            .biome-card {
                height: 120px;
                font-size: 16px;
            }
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar a {
            color: white !important;
        }

        .navbar .form-inline input {
            margin-right: 10px;
        }

        .navbar .form-inline input[type="search"] {
            width: 700px;
        }

        /* Allonger la barre de recherche */
        .search-bar {
            width: 100%; /* Allonge la barre à 100% */
            max-width: 800px; /* Limite la largeur à 800px */
        }

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }

        .search-result-item {
            padding: 10px;
            cursor: pointer;
        }

        .search-result-item:hover {
            background-color: #f8f9fa;
        }

        .search-result {
            display: flex;
            justify-content: space-between;
        }

        .arrow {
            margin: 0 10px;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <!-- Menu horizontal -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Biomes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/animaux">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/enclos">Enclos</a>
                    </li>
                </ul>
                <!-- Barre de recherche allongée -->
                <form class="d-flex ms-auto" role="search" id="searchForm">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Rechercher un enclos, animal ou biome" aria-label="Search" id="searchQuery">
                    <ul class="dropdown-menu" id="searchResults" aria-labelledby="searchQuery">
                        <!-- Les résultats de la recherche seront injectés ici via JavaScript -->
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Listes des Biomes</h1>
        <div class="biome-container" id="biome-list">
            <!-- Les biomes seront injectés ici via JavaScript -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const natureImages = [
            'https://th.bing.com/th/id/OIP.FAqLtQqnls5UDVX1_Wt2XgHaEo?rs=1&pid=ImgDetMain', 
            'https://www.10wallpaper.com/wallpaper/1600x1200/1209/waterfalls-Nature_Landscape_Wallpapers_1600x1200.jpg',
            'https://www.downloadclipart.net/large/earth-nature-png-photo.png',
            'https://cdn.shopify.com/s/files/1/0600/5430/6988/files/maple-tree-in-autumn-EK00568_480x480.jpg?v=1638911121',
            'https://th.bing.com/th/id/R.09fa0dd1d30a933824a27b541e7fe9fb?rik=FnPLX7%2fbCaCbFw&riu=http%3a%2f%2ffr.best-wallpaper.net%2fwallpaper%2f1680x1050%2f1308%2fNature-landscape-mountains-river-trees-rocks_1680x1050.jpg&ehk=AR4sx9r4Vwb8H7fNfHtyfJY3i6S2NgzhkD2h8o0sZSE%3d&risl=&pid=ImgRaw&r=0'
        ];

        let currentImageIndex = 0;

        function changeBackgroundImage() {
            document.body.style.backgroundImage = `url(${natureImages[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % natureImages.length;
        }

        setInterval(changeBackgroundImage, 3000);
        changeBackgroundImage();

        async function getBiomes() {
            try {
                const response = await fetch('/api/biomes');
                const biomes = await response.json();

                const biomeList = document.getElementById('biome-list');
                biomes.forEach(biome => {
                    const biomeCard = document.createElement('div');
                    biomeCard.classList.add('biome-card');
                    biomeCard.style.backgroundColor = biome.color;
                    biomeCard.innerHTML = `
                        <span>${biome.name}</span>
                    `;
                    biomeCard.addEventListener('click', () => {
                        window.location.href = `/enclos/${biome.id}`;
                    });
                    biomeList.appendChild(biomeCard);
                });
            } catch (error) {
                console.error('Error fetching biomes:', error);
            }
        }

        // Fonction de recherche dynamique
        document.getElementById('searchQuery').addEventListener('input', async function(event) {
            const query = event.target.value;

            if (query.length < 3) {
                document.getElementById('searchResults').innerHTML = ''; // Clear search results if query is too short
                return;
            }

            try {
                const response = await fetch(`/api/search?name=${query}`);
                const result = await response.json();

                const searchResultsContainer = document.getElementById('searchResults');
                searchResultsContainer.innerHTML = ''; // Clear previous results

                if (result.length === 0) {
                    searchResultsContainer.innerHTML = '<li class="dropdown-item">Aucun résultat trouvé.</li>';
                    return;
                }

                result.forEach(item => {
                    const resultItem = document.createElement('li');
                    resultItem.classList.add('search-result-item');
                    resultItem.innerHTML = `
                        <div class="search-result">
                            <span>${item.name}</span>
                            <span class="arrow">→</span>
                            <span>${item.enclosure}</span>
                        </div>
                    `;
                    searchResultsContainer.appendChild(resultItem);
                });
            } catch (error) {
                console.error('Error fetching search results:', error);
            }
        });

        document.addEventListener('DOMContentLoaded', getBiomes);
    </script>
</body>
</html>
