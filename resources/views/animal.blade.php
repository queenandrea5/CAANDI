<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux de l'enclos : {{ $enclosureName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.00e59fd2b137b50ca1b9c938c9384257?rik=1NC4HaTmyK59CQ&pid=ImgRaw&r=0');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .animal-card {
            width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .animal-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .animal-photo {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .animal-name {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }

        .animal-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .search-container {
            margin: 20px auto;
            text-align: center;
        }

        .search-input {
            width: 50%;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        #error-message {
            display: none;
            text-align: center;
            color: red;
            font-size: 36px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        #search-result-message {
            display: none;
            text-align: center;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Animaux de l'enclos : {{ $enclosureName }}</h1>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" id="search-input" class="search-input" placeholder="Rechercher un animal par son nom...">
        </div>

        <!-- Message de résultat de la recherche -->
        <div id="search-result-message">
            Recherche pour : <span id="search-query"></span>
        </div>

        <div class="animal-container" id="animal-list">
            <!-- Les cartes des animaux seront injectées ici via JavaScript -->
        </div>

        <div id="error-message" class="text-center text-danger mt-4">
            Aucun animal trouvé.
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const enclosureId = "{{ $enclosureId }}"; // Récupération de l'ID de l'enclos
        const animalList = document.getElementById('animal-list');
        const errorMessage = document.getElementById('error-message');
        const searchInput = document.getElementById('search-input');
        const searchResultMessage = document.getElementById('search-result-message');
        const searchQuerySpan = document.getElementById('search-query');

        // Liste des images par défaut
        const defaultImages = [
            "/images/404.png",
            "/images/dog-404.png",
            "/images/erreur-76870840.webp",
            "/images/animal4.jpg",
            "/images/错误-58384882.jpg",
            "/images/R.jpg"
        ];

        // Fonction pour obtenir une image par défaut aléatoire
        function getRandomDefaultImage() {
            const randomIndex = Math.floor(Math.random() * defaultImages.length);
            return defaultImages[randomIndex];
        }

        // Fonction pour afficher les animaux
        function displayAnimals(animals) {
            animalList.innerHTML = ''; // Réinitialiser la liste avant d'ajouter des éléments
            errorMessage.style.display = 'none'; // Cacher le message d'erreur avant l'affichage des résultats

            if (animals.length === 0) {
                errorMessage.style.display = 'block';
                return;
            }

            console.log("Affichage des animaux:", animals); // Log pour afficher les animaux récupérés

            animals.forEach(animal => {
                console.log("Animal récupéré :", animal); // Log des informations de chaque animal

                // Définir l'URL de la photo ou choisir une image par défaut aléatoire
                let photoUrl = animal.photo ? animal.photo : getRandomDefaultImage();

                console.log("Photo de l'animal : ", photoUrl); // Log pour vérifier l'URL de la photo

                // Vérifier si l'animal a un nom valide
                if (animal.name) {
                    const animalCard = document.createElement('div');
                    animalCard.classList.add('animal-card');

                    // Utilisation de <img> pour afficher l'image de l'animal
                    const animalPhoto = document.createElement('img');
                    animalPhoto.classList.add('animal-photo');
                    animalPhoto.src = photoUrl;

                    // Gestionnaire d'erreurs pour les images
                    animalPhoto.onerror = function() {
                        this.src = getRandomDefaultImage();
                    };

                    const animalName = document.createElement('div');
                    animalName.classList.add('animal-name');
                    animalName.textContent = animal.name;

                    animalCard.appendChild(animalPhoto);
                    animalCard.appendChild(animalName);

                    animalList.appendChild(animalCard);
                } else {
                    // Log des animaux sans nom
                    console.warn("Animal sans nom :", animal);
                }
            });
        }

        // Fonction pour récupérer les animaux de l'enclos
        function fetchAnimals() {
            console.log(`Fetching animals for enclosure ID: ${enclosureId}`); // Log de l'ID de l'enclos

            fetch(`/api/animals/${enclosureId}`)
                .then(response => {
                    console.log("Réponse brute de l'API :", response); // Log de la réponse brute
                    return response.json();
                })
                .then(data => {
                    console.log("Données des animaux récupérées :", data); // Log des données JSON
                    displayAnimals(data);
                })
                .catch(error => {
                    console.error("Erreur lors de la récupération des animaux :", error);
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = 'Erreur lors de la récupération des données.';
                });
        }

        // Appel initial pour afficher tous les animaux de l'enclos
        fetchAnimals();

        // Écouteur de l'événement de recherche
        searchInput.addEventListener('input', function () {
            const searchValue = searchInput.value.trim();
            if (searchValue) {
                console.log(`Recherche d'animaux pour le terme : "${searchValue}" dans l'enclos ${enclosureId}`); // Log de la recherche

                // Mettre à jour le message de résultat de recherche
                searchResultMessage.style.display = 'block';
                searchQuerySpan.textContent = searchValue;

                fetch(`/api/animals/search/${searchValue}/${enclosureId}`)
                    .then(response => {
                        console.log("Réponse brute de la recherche :", response); // Log de la réponse brute
                        if (!response.ok) {
                            throw new Error('Animal non trouvé dans cet enclos');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Résultats de la recherche :", data); // Log des résultats de la recherche
                        displayAnimals(data);
                    })
                    .catch(error => {
                        console.error("Erreur lors de la recherche :", error);
                        displayAnimals([]); // Réinitialiser la liste
                        errorMessage.style.display = 'block';
                    });
            } else {
                console.log("Barre de recherche vide, rechargement des animaux.");
                searchResultMessage.style.display = 'none';
                fetchAnimals();
            }
        });
    });
    </script>
</body>
</html>
