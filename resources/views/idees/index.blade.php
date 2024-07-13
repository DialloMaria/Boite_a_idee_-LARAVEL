<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #b15633;
            padding: 15px;
        }
        .navbar-brand, .nav-link, .btn-signup, .btn-login {
            color: white !important;
        }
        .navbar-nav {
            text-align: center;
            margin-left: 300px;
            gap: 10px;
        }
        .btn-signup, .btn-login {
            background-color: #ff6137;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }
        .btn-signup:hover, .btn-login:hover {
            background-color: #b15633;
        }
        .banner {
            background: url('https://source.unsplash.com/random/1600x600') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 150px 20px;
            position: relative;
        }
        .banner::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .banner h1, .banner p {
            position: relative;
            z-index: 2;
        }
        .banner h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
        }
        .about {
            padding: 60px 20px;
            background-color: #f8f9fa;
            text-align: center;
        }
        .about h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .about p {
            font-size: 1.2em;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
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
        .card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.5em;
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
        .btn-icon {
            margin-left: 10px;
            color: #b15633;
            transition: color 0.3s;
        }
        .btn-icon:hover {
            color: #ff6137;
        }
        .card-header-custom {
            height: 5px;
            background-color: #b15633;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            bottom: 0;
         
        }
        footer a {
            color: #ff6137;
        }
        .social-icons a {
            color: white;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #ff6137;
        }
        .pagination {
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Boîte à Idées</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Catégories</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Idées</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/ideeAjout">Ajouter une Idée</a>
                    </li> --}}
                </ul>
                <ul class="navbar-nav ms-auto">
                    {{-- @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link btn-signup" href="#">S'inscrire</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link btn-login" href="/login">Se connecter</a>
                        </li>
                    {{-- @endauth --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner">
        <div class="container">
            <h1>Bienvenue sur la Boîte à Idées</h1>
            <p>Partagez vos idées, collaborez et innovez avec nous.</p>
            <a href="#" class="btn btn-signup">Rejoignez-nous</a>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <h2>À propos de nous</h2>
            <p>Nous sommes une plateforme dédiée à la collecte et à la mise en œuvre d'idées novatrices. Notre mission est de vous fournir un espace pour partager vos idées et collaborer avec d'autres personnes pour les réaliser.</p>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mb-4">Liste des Idées</h2>
        <div class="row">
            @foreach($idees as $idee)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header-custom"></div>
                        {{-- <img src="{{ $idee->image }}={{ $idee->id }}" class="card-img-top" alt="{{ $idee->libelle }}"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $idee->libelle }}</h5>
                            <p class="card-text">{{ substr($idee->description, 0, 100) }}...</p>
                            {{-- <p class="card-text"><small class="text-muted">{{ $idee->created_at->format('d M Y') }}</small></p> --}}
                            <a href="/ideedetail/{{$idee->id}}" class="btn btn-custom">Voir plus</a>
                            {{-- <a href="/ideesupprimer/{{ $idee->id }}" class="btn-icon">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="/ideemodifier/{{ $idee->id }}" class="btn-icon">
                                <i class="fas fa-edit"></i>
                            </a> --}}
                        </div
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<footer>
    <div class="container text-center">
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>&copy; 2024 Boîte à Idées. Tous droits réservés. | Réalisé par <a href="#">Mariama</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
