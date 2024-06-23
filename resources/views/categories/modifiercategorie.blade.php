<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Attrayant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(to right, #ff6137, #71b7e6); */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333333;
        }
        .form-label {
            font-weight: bold;
            color: #555555;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #71b7e6;
            box-shadow: 0 0 10px rgba(113, 183, 230, 0.25);
        }
        .btn-primary {
            width: 100%;
            border-radius: 10px;
            background: linear-gradient(135deg, #71b7e6, #252120);
            border: none;
            padding: 10px;
            font-size: 1rem;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #252120, #71b7e6);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Modifier une Categorie</h2>
        <form action="/categoriemodifierTraitement" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $categorie->id }}">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle', $categorie->libelle) }}" >
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
