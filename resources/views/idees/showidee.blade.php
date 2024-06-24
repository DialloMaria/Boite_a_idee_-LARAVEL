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
        }
        .comment p {
            margin-bottom: 5px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="img-container">
                    <img src="URL_DE_L_IMAGE" alt="Image de l'idée">
                </div>
                <h2 class="card-title">{{ $idee->libelle }}</h2>
                <p class="card-text">{{ $idee->description }}</p>
                <div class="info">
                    <p><span>Nom Complet :</span> {{ $idee->nom_complet }}</p>
                    <p><span>Email :</span> {{ $idee->email }}</p>
                    <p><span>Catégorie :</span> {{ $idee->categorie->libelle }}</p>
                    <p><span>Date de Création :</span> {{ $idee->created_at->format('d/m/Y') }}</p>
                    <p><span>Statut :</span> {{ ucfirst($idee->status) }}</p>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="d-flex justify-content-end">
                        <a href="/modifierStatus/{{ $idee->id }}" class="btn btn-sm btn-primary">Modifier le statut</a>
                    </div>
                    @endif
                </div>
            </div>
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
        </div>

        <div class="comments-section">
            <h3>Commentaires</h3>
            @foreach ($commentaires as $commentaire)
            <div class="comment">
                <p><strong>{{ $commentaire->nom_complet }}</strong></p>
                <p>{{ $commentaire->libelle }}</p>
                <div class="comment-actions">
                    <a href="/commentaireSupprimer/{{ $commentaire->id }}" class="btn-icon">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                    <a href="/commentairemodifier/{{ $commentaire->id }}" class="btn-icon">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
            @endforeach

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
        </div>
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
