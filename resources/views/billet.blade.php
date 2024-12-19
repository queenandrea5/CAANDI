<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billetterie</title>
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
            <h4 class="text-center mb-4">Billetterie</h4>
            <form id="ticketForm">
                <!-- Nom -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required>
                </div>
                <!-- Âge -->
                <div class="mb-3">
                    <label for="age" class="form-label">Âge</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Entrez votre âge" required>
                </div>
                <!-- Jour d'arrivée -->
                <div class="mb-3">
                    <label for="arrival_date" class="form-label">Jour d'Arrivée</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date">
                </div>
                <!-- Heure d'arrivée -->
                <div class="mb-3">
                    <label for="arrival_time" class="form-label">Heure d'Arrivée</label>
                    <input type="time" class="form-control" id="arrival_time" name="arrival_time" >
                </div>
                <!-- Date de départ -->
                <div class="mb-3">
                    <label for="departure_date" class="form-label">Date de Départ</label>
                    <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                </div>
                <!-- Heure de départ -->
                <div class="mb-3">
                    <label for="departure_time" class="form-label">Heure de Départ</label>
                    <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                </div>
                <!-- Prix -->
                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Prix calculé" readonly>
                </div>
                <button type="submit" class="btn btn-primary w-100">Acheter</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function calculatePrice(age) {
            let price = 0;

            if (age < 12) {
                price = 10.00; 
            } else if (age >= 12 && age < 60) {
                price = 20.00; 
            } else {
                price = 15.00; 
            }
            return price;
        }
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('ticketForm');
        const nameInput = document.getElementById('name');
        const ageInput = document.getElementById('age');
        const priceInput = document.getElementById('price');
        const arrivalDateInput = document.getElementById('arrival_date');
        const arrivalTimeInput = document.getElementById('arrival_time');
        const departureDateInput = document.getElementById('departure_date');
        const departureTimeInput = document.getElementById('departure_time');

        // Calculer le prix en fonction de l'âge
        ageInput.addEventListener('input', function () {
            const age = parseInt(ageInput.value, 10); 
            let price = 0;

            // Calcul du prix selon l'âge
            if (!isNaN(age)) {
              price = calculatePrice(age);
            }
           
            priceInput.value = `${price.toFixed(2)} €`; 
            console.log("Prix calculé: " + price.toFixed(2) + " €");
        });
       
        // Soumettre le formulaire via Fetch
        form.addEventListener('submit', function (e) {
            e.preventDefault(); 

            // Récupération des valeurs
            const name = nameInput.value;
            const age = parseInt(ageInput.value, 10);
            const arrivalDate = arrivalDateInput.value;
            const arrivalTime = arrivalTimeInput.value;
            const departureDate = departureDateInput.value;
            const departureTime = departureTimeInput.value;
            const price = calculatePrice(age);

            // Validation des données (s'assurer que tout est rempli correctement)
            if (!name || isNaN(age) || !departureDate || !departureTime || !price) {
                alert('Veuillez remplir tous les champs correctement.');
                return;
            }

            // Créer un objet avec les données du ticket
            const ticketData = {
                name,
                age,
                arrival_date: arrivalDate,
                arrival_time: arrivalTime,
                departure_date: departureDate,
                departure_time: departureTime,
                price: price
            };
            console.log("prix: ", + ticketData.price);

                localStorage.setItem('ticketData', JSON.stringify(ticketData));


                // Envoyer la requête POST
                fetch('/api/tickets/purchase', { 
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        name,
                        age,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.ticket) {
                        window.location.href = '/vuebillet';
                    } else {
                        alert('Erreur : ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de l\'achat.');
                });
            });
        });
    </script>
</body>
</html>
