<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
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
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #ff6137;
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-header h2 {
            margin-bottom: 10px;
        }
        .form-header p {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h2>Inscription</h2>
            <p>Rejoignez notre communauté et commencez votre aventure!</p>
        </div>
        <form action="{{ route('register.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom d'utilisateur</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nom" >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe" >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" >
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-custom">S'inscrire</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
