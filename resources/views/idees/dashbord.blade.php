<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur - Boîte à Idées</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #b15633;
            --secondary-color: #ff6137;
            --bg-color: #f8f9fa;
            --text-color: #555;
            --light-text-color: #f8f9fa;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--bg-color);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding-top: 20px;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: var(--light-text-color);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: var(--secondary-color);
            border-bottom-right-radius: 40px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
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
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-text {
            color: var(--text-color);
            font-size: 1em;
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            border-radius: 20px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: var(--secondary-color);
        }

        footer {
            background-color: #343a40;
            color: var(--light-text-color);
            text-align: center;
            padding: 10px 0;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: var(--secondary-color);
        }

        .social-icons a {
            color: var(--light-text-color);
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--secondary-color);
        }

        .navbar-nav .nav-item .nav-link {
            color: var(--primary-color);
            transition: color 0.3s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>BOITE A IDEE</h3>
        <ul>
            <li><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="/ListeIdee"><i class="fas fa-lightbulb"></i> Idées</a></li>
            <li><a href="#notifications"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="#comments"><i class="fas fa-comments"></i> Commentaires</a></li>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarProfile">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{-- <i class="fas fa-user"></i>  --}}
                              {{ auth()->user()->name }}
                              
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Paramètres</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Dashboard Cards -->
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-lightbulb"></i>
                            <h4 class="card-title">Total Idées</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">120</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            <h4 class="card-title">Utilisateurs</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">45</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-comments"></i>
                            <h4 class="card-title">Commentaires</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">350</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Ideas Section -->
        {{-- <div id="ideas" class="container">
            <h1>Gérer les Idées</h1>
            <div class="row">
                <!-- Boucle pour afficher les idées à gérer -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header-custom"></div>
                        <div class="card-body">
                            <h5 class="card-title">Titre de l'idée</h5>
                            <p class="card-text">Description de l'idée...</p>
                            <a href="#" class="btn btn-custom">Voir plus</a>
                        </div>
                    </div>
                </div>
                <!-- Fin de la boucle -->
            </div>
        </div> --}}

        <!-- Notifications Section -->
        {{-- <div id="notifications" class="container">
            <h1>Notifications</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Notifications récentes</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <!-- Boucle pour afficher les notifications -->
                                <li class="list-group-item">Votre idée a reçu un nouveau commentaire.</li>
                                <!-- Fin de la boucle -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Comments Section -->
        {{-- <div id="comments" class="container">
            <h1>Commentaires</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Derniers Commentaires</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <!-- Boucle pour afficher les commentaires -->
                                <li class="list-group-item">
                                    <strong>Utilisateur 1:</strong> Super idée!
                                    <span class="text-muted float-end">Il y a 5 minutes</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Utilisateur 2:</strong> Je pense que ça pourrait être amélioré en...
                                    <span class="text-muted float-end">Il y a 10 minutes</span>
                                </li>
                                <!-- Fin de la boucle -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Footer -->
    {{-- <footer>
        <div class="container text-center">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p>&copy; 2024 Boîte à Idées. Tous droits réservés. | Réalisé par <a href="#">Mariama</a></p>
        </div>
    </footer> --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
