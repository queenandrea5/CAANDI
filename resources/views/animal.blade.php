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
            background-size: cover;
            background-position: center;
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
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Effet 3D */
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

            // Fonction pour afficher les animaux
            function displayAnimals(animals) {
                animalList.innerHTML = ''; // Réinitialiser la liste avant d'ajouter des éléments
                errorMessage.style.display = 'none'; // Cacher le message d'erreur avant l'affichage des résultats

                if (animals.length === 0) {
                    errorMessage.style.display = 'block';
                    return;
                }

                animals.forEach(animal => {
                    // Vérifier si l'animal a un nom et une photo valides
                    if (animal.name && animal.photo) {
                        const animalCard = document.createElement('div');
                        animalCard.classList.add('animal-card');

                        const animalPhoto = document.createElement('div');
                        animalPhoto.classList.add('animal-photo');
                        animalPhoto.style.backgroundImage = `url(${animal.photo})`;

                        const animalName = document.createElement('div');
                        animalName.classList.add('animal-name');
                        animalName.textContent = animal.name;

                        animalCard.appendChild(animalPhoto);
                        animalCard.appendChild(animalName);

                        animalList.appendChild(animalCard);
                    } else {
                        // Si l'animal n'a pas de nom ou de photo, on ne l'affiche pas
                        console.warn("Animal sans nom ou photo:", animal);
                    }
                });
            }

            // Fonction pour récupérer les animaux de l'enclos
            function fetchAnimals() {
                fetch(`/api/animals/${enclosureId}`)
                    .then(response => response.json())
                    .then(data => {
                        displayAnimals(data);
                    })
                    .catch(error => {
                        console.error(error);
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
                    // Mettre à jour le message de résultat de recherche
                    searchResultMessage.style.display = 'block';
                    searchQuerySpan.textContent = searchValue;

                    // Si la recherche a une valeur, on cherche l'animal
                    fetch(`/api/animals/search/${searchValue}/${enclosureId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Animal non trouvé dans cet enclos');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // data est un tableau d'animaux, même si un seul animal est trouvé
                            displayAnimals(data); // Passez le tableau entier
                        })
                        .catch(error => {
                            console.error(error);
                            // Réinitialiser la liste et afficher un message d'erreur
                            displayAnimals([]);
                            errorMessage.style.display = 'block';
                        });
                } else {
                    // Si la barre de recherche est vide, afficher tous les animaux
                    searchResultMessage.style.display = 'none';
                    fetchAnimals();
                }
            });
        });
    </script>
</body>
</html>
