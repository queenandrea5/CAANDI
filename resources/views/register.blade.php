<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour l'image de fond */
        body {
            background: url('{{ asset('/images/PEO1.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85); /* Fond blanc semi-transparent */
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Register</h4>
            <form id="registerForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <div class="mt-3 text-center">
                <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Gestion de l'envoi du formulaire
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche la soumission classique du formulaire

            // Récupérer les données du formulaire
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
            };

            console.log("Données utilisateur : ", formData);

            // Envoyer une requête POST via Fetch
            fetch('/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(formData),
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Invalid data or registration failed.');
                }
            })
            .then(data => {
                console.log("Réponse reçue :", data);

                // Rediriger vers la page de connexion après inscription réussie
                if (data.message === 'User create successfully') {
                    alert('Registration successful! Redirecting to login page.');
                    window.location.href = "{{ route('login') }}"; // Redirection vers la page de connexion
                } else {
                    alert(data.message || 'Registration failed.');
                }
            })
            .catch(error => {
                console.error('Erreur lors de l\'inscription :', error);
                alert('An error occurred during registration.');
            });
        });
    </script>
</body>
</html>

