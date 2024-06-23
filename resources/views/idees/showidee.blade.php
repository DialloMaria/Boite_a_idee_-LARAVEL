<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'Idée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 30px;
        }
        .card-title {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .card-text {
            color: #555;
            font-size: 1.1em;
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
            margin-bottom: 30px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="img-container">
                    <img src="URL_DE_L_IMAGE" alt="Image de l'idée">
                </div>
                <h5 class="card-title">{{ $idee->libelle }}</h5>
                <p class="card-text">{{ $idee->description }}</p>
                <div class="info">
                    <p><span>Nom Complet :</span> {{ $idee->nom_complet }}</p>
                    <p><span>Email :</span> {{ $idee->email }}</p>
                    <p><span>Catégorie :</span> {{ $idee->categorie->libelle }}</p>
                    <p><span>Date de Création :</span> {{ $idee->created_at->format('d/m/Y') }}</p>
                    <p><span>Statut :</span> 
                        <span class="badge {{ $idee->status == 'approuvee' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($idee->status) }}
                        </span>
                    </p>
                </div>
                {{-- @if(Auth::check() && Auth::user()->isAdmin())
                    <a href="#" class="btn btn-custom">Approuver</a>
                    <a href="#" class="btn btn-custom">Refuser</a>
                @endif --}}
            </div>
        </div>
    </div>
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">Commentaire</h4>
        <br>
        @foreach ($commentaires as $commentaire )
        <p class="mb-0"> <strong>{{$commentaire->nom_complet}}</strong> <br>
            {{$commentaire->libelle}}
        </p>  
        <div style="margin-left: 200px" >
        </div>
         {{-- <div> <p>{{$commentaire->created_at}}</p></div>   --}}
         <a href="/commentaireSupprimer/{{ $commentaire->id }}" class="btn-icon">
            <i class="fas fa-trash-alt"></i>
        </a>
        <a href="/commentairemodifier/{{$commentaire->id}}" class="btn-icon">
            <i class="fas fa-edit"></i>
        </a>
        <hr>
        <br>
        @endforeach
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
