<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('/images/PEO1.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Login</h4>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="mt-3 text-center">
                <small><a href="#" class="text-decoration-none">Forgot your password?</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gestion de l'envoi du formulaire
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche la soumission classique du formulaire

            // Récupérer les données du formulaire
            const formData = {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                dob: document.getElementById('dob').value,
                gender: document.getElementById('gender').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
            };

            console.log("Données utilisateur : ", formData);

            // Stocker les données dans le localStorage
            localStorage.setItem('formData', JSON.stringify(formData));
            // Envoyer une requête POST via Fetch
            fetch('/api/login', {
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
                    throw new Error('Invalid credentials or login failed.');
                }
            })
            .then(data => {
                console.log("Réponse reçue :", data);

                // Stocker les données utilisateur dans le Local Storage
                localStorage.setItem('formData', JSON.stringify(formData));

                // Rediriger vers la page d'accueil après une connexion réussie
                if (data.message === 'User login sucessfully') {
                    alert('Login successful! Redirecting to homepage.');
                    window.location.href = "{{ route('welcome') }}"; //  page d'accueil
                } else {
                    alert(data.message || 'Login failed.');
                }
            })
            .catch(error => {
                console.error('Erreur lors de la connexion :', error);
                alert('An error occurred during login.');
            });
        });
    </script>
</body>
</html>
