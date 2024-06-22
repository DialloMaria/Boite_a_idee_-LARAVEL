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
        <form action="/ideeAjoutTraitement" method="POST">
            @csrf
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}">
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nom_complet" class="form-label">Nom Complet</label>
                <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" id="nom_complet" name="nom_complet" value="{{ old('nom_complet') }}">
                @error('nom_complet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select class="form-select @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id">
                    @foreach($categorie as $categories)
                        <option value="{{ $categories->id }}" {{ old('categorie_id') == $categories->id ? 'selected' : '' }}>{{ $categories->libelle }}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-custom">Soumettre</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
