<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parc Zoo - Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour la vidéo de fond */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* En-tête */
        .header {
            background-color: #f5f5f5; /* Fond gris clair */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre discrète */
            position: relative;
            z-index: 10;
        }

        .header .logo img {
            max-height: 60px;
        }

        .header nav {
            margin-left: auto;
        }

        .header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .header nav ul li {
            margin: 0 15px;
        }

        .header nav ul li a {
            text-decoration: none;
            color: #333; /* Couleur sombre */
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .header nav ul li a:hover {
            color: #007bff; /* Couleur bleue au survol */
        }

        /* Contenu principal */
        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
            top: 30%;
            transform: translateY(-30%);
        }

        .content h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        .content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Vidéo de fond -->
    <video class="video-background" autoplay muted loop>
        <source src="videos/Publicité Web 2023 - Format 16_9.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- En-tête -->
    <header class="header d-flex align-items-center py-3 px-4">
        <!-- Navigation -->
        <nav>
            <ul class="d-flex align-items-center m-0">
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="pageenclo.html">Biomes</a></li>
                <li><a href="{{ route('services') }}">Nos Services</a></li>
                <li><a href="{{ route('billetterie.submit') }}">Billetterie</a></li>
            </ul>
        </nav>
        <!-- Logo -->
        <div class="logo ms-auto">
            <img src="images/PEOLOGO.png" alt="Logo du site">
        </div>
    </header>

    <!-- Contenu principal -->
    <div class="content">
        <h1>Bienvenue au Parc Zoo</h1>
        <p>Explorez nos merveilles animales et plongez dans des habitats fascinants.</p>
        <a href="{{ route('billetterie.submit') }}" class="btn btn-custom">Réserver Maintenant</a>
    </div>

    <!-- Bootstrap JS -->
    <script>
        const video = document.querySelector('.video-background');
        video.addEventListener('loadedmetadata', () => {
            video.currentTime = 0;
            video.loop = true;

            // Limiter la durée de la boucle à 15 secondes
            video.addEventListener('timeupdate', () => {
                if (video.currentTime >= 15) {
                    video.currentTime = 0; // Repartir à 0 pour créer une boucle de 15 secondes
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
