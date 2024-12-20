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
        height: 300px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        font-size: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: 15px;
        text-decoration: none;
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

    .status-icon {
        font-size: 30px;
        margin-top: 10px;
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

                    <!-- Icône d'état de l'enclos (générée aléatoirement) -->
                    <div class="status-icon" id="status-icon-{{ $loop->index }}">
                        <!-- Placeholder pour l'icône -->
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enclosureStatuses = ['open', 'closed'];

            const enclosures = document.querySelectorAll('.enclosure-card');
            enclosures.forEach((enclosure, index) => {
                const status = enclosureStatuses[Math.floor(Math.random() * enclosureStatuses.length)];
                const statusIconElement = document.getElementById('status-icon-' + index);
                
                if (status === 'open') {
                    statusIconElement.innerHTML = '✔';
                    statusIconElement.classList.add('text-success');
                } else {
                    statusIconElement.innerHTML = '❌';
                    statusIconElement.classList.add('text-danger');
                }
            });
        });
    </script>
</body>
</html>
