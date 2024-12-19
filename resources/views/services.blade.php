<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services - Parc Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .services-header {
            text-align: center;
            margin: 50px 0;
        }

        .service-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .service-card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .service-card-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .service-card-text {
            color: #555;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="services-header">
            <h1 class="display-4">Nos Services</h1>
            <p class="text-muted">Découvrez tous les services que nous offrons pour rendre votre visite inoubliable.</p>
        </header>

        <div class="row g-4">
            <!-- Toilettes -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/toilettes.jpg" alt="Toilettes" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Toilettes</h5>
                        <p class="service-card-text">Des installations propres et accessibles pour votre confort.</p>
                    </div>
                </div>
            </div>

            <!-- Point d'eau -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/point-eau.jpg" alt="Point d'eau" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Point d'eau</h5>
                        <p class="service-card-text">Des fontaines disponibles pour se rafraîchir tout au long de votre visite.</p>
                    </div>
                </div>
            </div>

            <!-- Boutique -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/boutique.jpg" alt="Boutique" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Boutique</h5>
                        <p class="service-card-text">Des souvenirs uniques et des produits locaux à découvrir.</p>
                    </div>
                </div>
            </div>

            <!-- Gare -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/gare.jpg" alt="La Gare" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">La Gare</h5>
                        <p class="service-card-text">Un point central pour explorer le parc grâce au train.</p>
                    </div>
                </div>
            </div>

            <!-- Trajet train -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/train.jpg" alt="Trajet Train" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Trajet Train</h5>
                        <p class="service-card-text">Un moyen agréable pour traverser le parc et admirer les animaux.</p>
                    </div>
                </div>
            </div>

            <!-- Lodge -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/lodge.jpg" alt="Lodge" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Lodge</h5>
                        <p class="service-card-text">Profitez d'un hébergement confortable au cœur du parc.</p>
                    </div>
                </div>
            </div>

            <!-- Tente pédagogique -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/tente.jpg" alt="Tente pédagogique" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Tente pédagogique</h5>
                        <p class="service-card-text">Une expérience éducative unique pour les enfants et les familles.</p>
                    </div>
                </div>
            </div>

            <!-- Paillote -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/paillote.jpg" alt="Paillote" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Paillote</h5>
                        <p class="service-card-text">Détendez-vous dans nos paillotes ombragées.</p>
                    </div>
                </div>
            </div>

            <!-- Café Nomade -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/cafénomade.jpg" alt="Café Nomade" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Café Nomade</h5>
                        <p class="service-card-text">Des boissons chaudes et froides pour recharger vos batteries.</p>
                    </div>
                </div>
            </div>

            <!-- Petit Café -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/petit-cafe.jpg" alt="Petit Café" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Petit Café</h5>
                        <p class="service-card-text">Un moment de détente avec nos délicieux cafés.</p>
                    </div>
                </div>
            </div>

            <!-- Plateau des Jeux -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/jeux.jpg" alt="Plateau des Jeux" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Plateau des Jeux</h5>
                        <p class="service-card-text">Des activités ludiques pour petits et grands.</p>
                    </div>
                </div>
            </div>

            <!-- Espace Pique-nique -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/pique-nique.jpg" alt="Espace Pique-nique" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">Espace Pique-nique</h5>
                        <p class="service-card-text">Un cadre naturel pour partager un repas en famille ou entre amis.</p>
                    </div>
                </div>
            </div>
            <!-- point de vue -->
            <div class="col-md-4">
                <div class="card service-card">
                    <img src="/images/services/point.jpg" alt="point de vue" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="service-card-title">point de vue</h5>
                        <p class="service-card-text">espace aménagé pour offrir aux visiteurs une vue privilégiée sur les animaux.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
