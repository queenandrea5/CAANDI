<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5; /* Couleur de fond douce */
        }

        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
        }

        .profile-header h2 {
            margin-top: 15px;
            font-size: 1.8rem;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
            color: #555;
        }

        .profile-info p {
            font-size: 1.1rem;
            color: #333;
        }

        .btn-edit-profile {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <!-- En-tête du profil -->
            <div class="profile-header">
                <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil">
                <!-- <h2>{{ $user->first_name }} {{ $user->last_name }}</h2> -->
                <!-- <p class="text-muted">{{ $user->email }}</p> -->
            </div>

            <!-- Informations du profil -->
            <div class="profile-info">
                <label>Nom :</label>
                <!-- <p>{{ $user->last_name }}</p> -->
            </div>
            <div class="profile-info">
                <label>Prénom :</label>
                <!-- <p>{{ $user->first_name }}</p> -->
            </div>
            <div class="profile-info">
                <label>Email :</label>
                <!-- <p>{{ $user->email }}</p> -->
            </div>
            <div class="profile-info">
                <label>Âge :</label>
                <!-- <p>{{ $user->age }}</p> -->
            </div>
            <div class="profile-info">
                <label>Date de Naissance :</label>
                <!-- <p>{{ $user->birth_date }}</p> -->
            </div>
            <div class="profile-info">
                <label>Adresse :</label>
                <!-- <p>{{ $user->address }}</p> -->
            </div>

            <!-- Bouton Modifier le profil -->
            <div class="btn-edit-profile">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier le Profil</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
