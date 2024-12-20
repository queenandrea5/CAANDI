<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enclos du Biome - {{ $biome->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url('https://www.univers-simu.com/wp-content/uploads/2021/01/enclos-chevaux-fs19-01.jpg');
        background-size: cover;
        background-position: center;
        transition: background-image 1s ease-in-out;
    }

    .enclosure-card {
        width: 300px;
        height: 300px;  /* Hauteur fixe de l'enclos */
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center; /* Centrer le contenu de l'enclos */
        color: #fff;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        font-size: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: 15px;
        text-decoration: none;
        position: relative; /* Positionner l'indicateur d'état par rapport à la carte */
    }

    .enclosure-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .enclosure-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .status-indicator {
        width: 50px; /* Augmenter la taille du cercle */
        height: 50px;
        border-radius: 50%;
        background-color: transparent;
        transition: background-color 0.3s ease;
        margin-top: -3px;  /* Décaler un peu l'indicateur vers le bas */
    }

    .status-indicator.open {
        background-color: #28a745; /* Vert pour ouvert */
    }

    .status-indicator.closed {
        background-color: #dc3545; /* Rouge pour fermé */
    }

    .status-indicator-placeholder {
        width: 50px; /* Garder la taille du cercle dans le container */
        height: 50px;
        margin-top: auto; /* Positionner l'indicateur en bas de l'enclos */
    }

    /* Maintenir le nom centré */
    .enclosure-card h5 {
        flex-grow: 1; /* Permet au titre de rester centré */
        margin: 0;
        display: flex;
        align-items: center;
    }

    /* Éviter que l'indicateur dépasse la carte */
    .enclosure-card .status-indicator-placeholder {
        margin-top: auto;
    }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Enclos du Biome : {{ $biome->name }}</h1>
        <div class="enclosure-container" id="enclosure-list">
            @foreach($biome->enclosures as $enclosure)
                <a href="{{ route('animals', ['enclosureId' => $enclosure->id, 'enclosureName' => $enclosure->meal]) }}" class="enclosure-card" style="background-color: {{ $biome->color }};">
                    <!-- Affichage centré du nom de l'enclos -->
                    <h5>{{ $enclosure->meal }}</h5>

                    <!-- Indicateur d'état de l'enclos (généré aléatoirement avec une div) -->
                    <div class="status-indicator-placeholder">
                        <div class="status-indicator" id="status-indicator-{{ $loop->index }}"></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enclosureStatuses = ['open', 'closed'];  // Status possible: 'open' ou 'closed'

            // Sélectionner tous les enclos
            const enclosures = document.querySelectorAll('.enclosure-card');
            enclosures.forEach((enclosure, index) => {
                const status = enclosureStatuses[Math.floor(Math.random() * enclosureStatuses.length)]; // Choisir aléatoirement l'état
                const statusIndicatorElement = document.getElementById('status-indicator-' + index);
                
                // Appliquer la classe correspondant à l'état
                if (status === 'open') {
                    statusIndicatorElement.classList.add('open'); // Fond vert
                } else {
                    statusIndicatorElement.classList.add('closed'); // Fond rouge
                }
            });
        });
    </script>
</body>
</html>
