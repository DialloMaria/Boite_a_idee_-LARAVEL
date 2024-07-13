<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'Idée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 30px;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 30px;
        }
        .card-title {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }
        .card-text {
            color: #555;
            font-size: 1.1em;
            line-height: 1.6;
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
        .img-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .info {
            margin-bottom: 20px;
        }
        .info span {
            font-weight: bold;
            color: #b15633;
        }
        .comments-section {
            background-color: #f8f9fa;
            padding: 30px;
            margin-top: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .comment {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white;
            display: flex;
            align-items: center;
        }
        .comment .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            background-color: #b15633;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
        }
        .comment p {
            margin-bottom: 5px;
            flex: 1;
        }
        .comment .comment-actions {
            text-align: right;
        }
        .comment .comment-actions a {
            margin-left: 10px;
            color: #b15633;
            transition: color 0.3s;
        }
        .comment .comment-actions a:hover {
            color: #ff6137;
        }
        .btn-like, .btn-dislike {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .btn-like:hover, .btn-dislike:hover {
            transform: scale(1.1);
        }
        .btn-like:focus, .btn-dislike:focus {
            outline: none;
        }
    </style>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <title>Détail de : {{ $idee->libelle}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{ $idee->libelle }}</h1>
            </div>
        </div>
    </div>
    <br><br>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{ $idee->nom }}
                </h3>

                <div class="blog-post">
                    <p class="blog-post-meta">Publié {{ $idee->created_at }} <a href="#">Mariama</a></p>

                    <p> {{ $idee->description }} </p>
                    {{-- Pour super_admin --}}
                    @if( auth()->user()->role == 'super_admin')
                        <p><span><strong>Nom Complet :</strong></span> {{ $idee->nom_complet }}</p>
                        <p><span><strong>Email :</strong></span> {{ $idee->email }}</p>
                        <p><span><strong>Catégorie :</strong></span> {{ $idee->categorie->libelle }}</p>
                        <p><span><strong>Statut :</strong></span> {{ ucfirst($idee->status) }}</p>
                        <form action="{{ route('idee.action', ['id' => $idee->id, 'action' => 'approuvee']) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="border: none;">
                                <box-icon name='like' type='solid' color='#0984e3'></box-icon>
                            </button>
                        </form>
                        
                        <form action="{{ route('idee.action', ['id' => $idee->id, 'action' => 'refusee']) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="border: none;">
                                <box-icon name='dislike' type='solid' color='#d63031'></box-icon>
                            </button>
                        </form>
                    @endif 
                    {{-- Pour admin --}}
                    @if( auth()->user()->role == 'admin')
                    <p><span><strong>Nom Complet :</strong></span> {{ $idee->nom_complet }}</p>
                    <p><span><strong>Email :</strong></span> {{ $idee->email }}</p>
                    <p><span><strong>Catégorie :</strong></span> {{ $idee->categorie->libelle }}</p>
                    <p><span><strong>Statut :</strong></span> {{ ucfirst($idee->status) }}</p>
                    
                @endif 
                    {{-- <hr> --}}
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->
            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Commentaire</h4>
                    <br>
                    @foreach ($commentaires as $commentaire)
                    <div class="comment">
                        <div class="avatar">{{ strtoupper(substr($commentaire->nom_complet, 0, 1)) }}</div>
                        <div>
                            <p><strong>{{ $commentaire->nom_complet }}</strong></p>
                            <p>{{ $commentaire->libelle }}</p>
                        </div>
                            <div class="comment-actions">
                                <a href="/commentaireSupprimer/{{ $commentaire->id }}" class="btn-icon" title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="/commentairemodifier/{{ $commentaire->id }}" class="btn-icon" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>

                    </div>
                    @endforeach
                </div>

                {{-- <footer class="blog-footer">
                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="/idees">Accueil</a>
                        <a class="btn btn-outline-secondary " href="/idees/partager">Partager</a>
                    </nav>
                </footer> --}}

            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->
<hr>
@if( auth()->user()->role == '!super_admin')

    <div class="container">
        <div class="mb-3">
        <h1>Vos commentaire</h1>
        
        
        <form action="/commentaireAjoutTraitement" methode="POST" >
            <input type="hidden" name="idee_id" value="{{ $idee->id }}">

        @csrf
        <div class="mb-3">
            <label for="nom_complet" class="form-label">Votre Nom</label>
            <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" id="nom_complet" placeholder="nom_complet" name="nom_complet" >
            @error('nom_complet')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="libelle" class="form-label">Laissez-nous un message</label>
            <textarea class="form-control @error('libelle') is-invalid @enderror" id="libelle" rows="3" name="libelle"></textarea>
            @error('libelle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      <button class="btn btn-outline-primary" >Envoyer</button>
        </form>
      <br>
      <br>
      <br>
    </div>

    @endif 


</body>

</html>