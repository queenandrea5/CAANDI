<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous nos enclos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.7fdc63745448ef10d8c23c4f4d5c8ae7?rik=bgldQXYe1TlgTQ&pid=ImgRaw&r=0');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .enclosure-card {
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin: 15px;
            text-align: center;
        }
        .enclosure-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
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
        <h1>Tous nos enclos</h1>
        <div id="loading-message">En cours de traitement...</div>
        <div class="row" id="enclosures-list">
            <!-- Les enclos seront affichés ici -->
        </div>
    </div>
    
</body>
</html>
