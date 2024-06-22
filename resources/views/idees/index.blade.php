<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Idées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .card-text {
            color: #555;
            font-size: 1em;
        }
        .btn-custom {
            background-color: #b15633;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff6137;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Liste des Idées</h2>
        <div class="row">
            @foreach($idees as $idee)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $idee->libelle }}</h5>
                            <p class="card-text">{{ substr($idee->description, 0, 30) }}</p>
                            <p class="card-text">{{ ($idee->created_at) }}</p>
                            <a href="#" class="btn btn-custom">Voir plus</a>
                            <a href="/ideesupprimer/{{ $idee->id }}" class="btn-icon">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="/ideemodifier/{{ $idee->id }}" class="btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
