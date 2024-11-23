<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billetterie - Parc Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        Réservez vos billets
                    </div>
                    <div class="card-body">
                        <form action="{{ route('billetterie.submit') }}" method="POST">
                            @csrf

                            <!-- Coordonnées Client -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom et Prénom</label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Votre nom complet">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Votre email">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Numéro de Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Votre numéro de téléphone">
                            </div>

                            <!-- Offre Mineur ou Majeur -->
                            <div class="mb-3">
                                <label class="form-label">Type d'Offre</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="offer" id="offer_minor" value="mineur" required>
                                        <label class="form-check-label" for="offer_minor">
                                            Offre Mineur (moins de 18 ans)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="offer" id="offer_major" value="majeur">
                                        <label class="form-check-label" for="offer_major">
                                            Offre Majeur (18 ans et plus)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Âge -->
                            <div class="mb-3">
                                <label for="age" class="form-label">Âge</label>
                                <input type="number" class="form-control" id="age" name="age" required placeholder="Votre âge" min="0">
                            </div>

                            <!-- Date et Heure d'arrivée -->
                            <div class="mb-3">
                                <label for="arrival_date" class="form-label">Date d'Arrivée</label>
                                <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
                            </div>

                            <div class="mb-3">
                                <label for="arrival_time" class="form-label">Heure d'Arrivée</label>
                                <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
                            </div>

                            <!-- Date et Heure de Fin -->
                            <div class="mb-3">
                                <label for="departure_date" class="form-label">Date de Fin</label>
                                <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                            </div>

                            <div class="mb-3">
                                <label for="departure_time" class="form-label">Heure de Fin</label>
                                <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Réserver Maintenant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
