<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
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

        .search-results {
            margin-top: 30px;
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

        #error-message {
            display: none;
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Résultats de la recherche</h1>

        <div id="search-results" class="search-results"></div>
        <div id="error-message" class="text-center">Aucun résultat trouvé.</div>
    </div>

    <script>
        // Récupération du terme de recherche dans l'URL
        const urlParams = new URLSearchParams(window.location.search);
        const query = urlParams.get('query');
        
        // Affichage de la recherche dans la barre de recherche
        document.getElementById('search-input').value = query;

        // Requête API pour afficher les résultats de la recherche
        fetch(`/api/search/${query}`)
            .then(response => response.json())
            .then(data => {
                const resultsContainer = document.getElementById('search-results');
                const errorMessage = document.getElementById('error-message');
                
                if (data.length === 0) {
                    errorMessage.style.display = 'block';
                } else {
                    errorMessage.style.display = 'none';
                    data.forEach(item => {
                        const card = document.createElement('div');
                        card.classList.add('animal-card');

                        // Photo de l'animal
                        const photo = document.createElement('div');
                        photo.classList.add('animal-photo');
                        photo.style.backgroundImage = `url(${item.photo})`;
                        card.appendChild(photo);

                        // Nom de l'animal
                        const name = document.createElement('div');
                        name.classList.add('animal-name');
                        name.textContent = item.name;
                        card.appendChild(name);

                        // Lien vers l'enclos
                        const enclosureLink = document.createElement('a');
                        enclosureLink.classList.add('enclosure-link');
                        enclosureLink.href = `/enclos/${item.enclosure.id}`;
                        enclosureLink.innerHTML = `Voir l'enclos <span>&#8594;</span>`;  // Flèche à droite
                        card.appendChild(enclosureLink);

                        resultsContainer.appendChild(card);
                    });
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                errorMessage.style.display = 'block';
            });
    </script>
</body>
</html>
