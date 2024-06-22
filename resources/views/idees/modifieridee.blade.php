<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Idée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
        }
        .form-control:focus {
            border-color: #ff6137;
            box-shadow: 0 0 0 0.2rem rgba(255, 97, 55, 0.25);
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
        <h2 class="text-center">Créer une Idée</h2>
        <form action="{{ route('ideemodifierTraitement')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $idee->id }}">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $idee->libelle }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $idee->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="nom_complet" class="form-label">Nom Complet</label>
                <input type="text" class="form-control" id="nom_complet" name="nom_complet" value="{{ $idee->nom_complet }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $idee->email }}" required>
            </div>
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select class="form-select" id="categorie_id" name="categorie_id" required>
                    @foreach($categorie as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-custom">Soumettre</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
