document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.querySelector("#registerForm");

    // Ajout d'un événement pour intercepter la soumission du formulaire
    registerForm.addEventListener("submit", (event) => {
        event.preventDefault();  // Empêcher l'envoi traditionnel du formulaire

        // Récupérer les valeurs des champs
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const passwordConfirmation = document.getElementById("password_confirmation").value;

        // Validation : Vérification si les mots de passe correspondent
        if (password !== passwordConfirmation) {
            alert("Les mots de passe ne correspondent pas !");
            return;
        }

        // Création d'un objet avec les données du formulaire
        const formData = {
            name: name,
            email: email,
            password: password,
            password_confirmation: passwordConfirmation
        };

        // Affichage dans la console pour tester
        console.log("Données du formulaire : ", formData);

        fetch('/api/register', {  // Utilisez l'URL de l'API
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token pour Laravel
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json()) // Réponse du serveur
        .then(data => {
            // Si le serveur renvoie un succès
            if (data.success) {
                alert("Inscription réussie !");
                window.location.href = "/profile"; // Redirection vers le profil de l'utilisateur
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch(error => {
            console.error("Erreur lors de l'envoi des données :", error);
        });
    });
});
