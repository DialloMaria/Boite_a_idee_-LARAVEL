<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #b15633;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            margin: 5px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff6137;
        }
        .btn-icon {
            color: #b15633;
            font-size: 1.2em;
            margin: 0 5px;
        }
        .btn-icon:hover {
            color: #ff6137;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Liste des Catégories</h2>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Libellé</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorie as $categories)
                    <tr>
                        <td>{{ $categories->libelle }}</td>
                        <td class="text-center">
                            <a href="/categoriemodifier/{{ $categories->id }}" class="btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/categorieSupprimer/{{ $categories->id }}" class="btn-icon">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
