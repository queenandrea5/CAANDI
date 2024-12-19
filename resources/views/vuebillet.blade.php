<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Billet</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('/images/PEO1.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <h4 class="text-center mb-4">Détails du Billet</h4>
            <div id="ticketDetails">
                <!-- Contenu dynamique -->
                <p><strong>Nom:</strong> <span id="ticketName"></span></p>
                <p><strong>Âge:</strong> <span id="ticketAge"></span></p>
                <p><strong>Jour d'Arrivée:</strong> <span id="arrivalDate"></span></p>
                <p><strong>Heure d'Arrivée:</strong> <span id="arrivalTime"></span></p>
                <p><strong>Date de Départ:</strong> <span id="departureDate"></span></p>
                <p><strong>Heure de Départ:</strong> <span id="departureTime"></span></p>
                <p><strong>Prix:</strong> <span id="ticketPrice"></span></p>
            </div>
            <div class="text-center">
                <button class="btn btn-secondary" onclick="goBack()">Retour</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Récupérer les données du billet depuis le localStorage
            const ticketData = JSON.parse(localStorage.getItem('ticketData'));

            // Vérifier si les données existent
            if (ticketData) {
                // Afficher les données dans la page
                document.getElementById('ticketName').textContent = ticketData.name;
                document.getElementById('ticketAge').textContent = ticketData.age;
                document.getElementById('arrivalDate').textContent = ticketData.arrival_date;
                document.getElementById('arrivalTime').textContent = ticketData.arrival_time;
                document.getElementById('departureDate').textContent = ticketData.departure_date;
                document.getElementById('departureTime').textContent = ticketData.departure_time;
                document.getElementById('ticketPrice').textContent = `${ticketData.price.toFixed(2)} €`;
            } else {
                // Si les données ne sont pas disponibles, afficher un message d'erreur
                document.getElementById('ticketDetails').innerHTML = '<p>Les informations du billet ne sont pas disponibles.</p>';
            }
        });

        // Fonction pour revenir à la page d'achat
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
