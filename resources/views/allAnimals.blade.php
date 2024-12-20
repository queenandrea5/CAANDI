<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous nos animaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/a4/f8/0c/a4f80cf30e2108edd890366c782e1344.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .animal-card {
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin: 15px;
            text-align: center;
        }
        .animal-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .animal-photo {
            height: 150px;
            width: 100%;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        }
        #loading-message {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tous nos animaux</h1>
        <div id="loading-message">En cours de traitement...</div>
        <div class="row" id="animals-list">
            <!-- Les animaux seront affichés ici -->
        </div>
    </div>
    
</body>
</html>
