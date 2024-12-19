<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: url('{{ asset('/images/PEO1.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }
        .profile-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-icon {
            font-size: 5rem;
            color: #6c757d;
        }
        .user-info {
            font-size: 1.2rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="profile-card text-center shadow-lg">
            <div>
                <i class="fas fa-user-circle profile-icon"></i>
            </div>
            <h3 class="mt-3" id="userFullName">Nom Prénom</h3>
            <p class="text-muted" id="userEmail">email@example.com</p>
            <div class="user-info mt-4">
                <p><strong>Date de Naissance :</strong> <span id="userDob">01/01/2000</span></p>
                <p><strong>Sexe :</strong> <span id="userGender">Masculin</span></p>
            </div>
            <button class="btn btn-primary mt-3" onclick="logout()">Se déconnecter</button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Récupération des données utilisateur depuis le localStorage
            const formData = JSON.parse(localStorage.getItem('formData'));

            if (formData) {
                // Affiche les données utilisateur dans les éléments HTML
                document.getElementById('userFullName').textContent = `${formData.firstName} ${formData.lastName}`;
                document.getElementById('userEmail').textContent = formData.email;
                document.getElementById('userDob').textContent = formData.dob;
                document.getElementById('userGender').textContent = formData.gender === "M" ? "Masculin" : "Féminin";
            } else {
                alert('Aucune donnée utilisateur trouvée. Veuillez vous connecter.');
                window.location.href = '/login'; // Redirige vers la page de connexion si aucune donnée n'est trouvée
            }
        });

        // Fonction de déconnexion
        function logout() {
            localStorage.removeItem('formData'); // Supprime les données utilisateur du localStorage
            alert('Vous avez été déconnecté.');
            window.location.href = '/login'; // Redirige vers la page de connexion
        }
    </script>
</body>
</html>

