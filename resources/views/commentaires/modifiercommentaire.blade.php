<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    {{-- <title>Détail de : {{ $Commentaire->nom}}</title> --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<hr>
    <div class="container">
        <div class="mb-3">
        <h1>Modifier votre commentaire</h1> 
        
        <form action="{{ route('commentairemodifierTraitement')}}" method="POST" >
            @csrf
            @method('post')


            <input type="hidden" name="id" value="{{ $commentaire->id }}">

        <label for="nom_complet" class="form-label">Votre Nom</label>
        <input type="nom_complet" class="form-control" id="nom_complet" placeholder="nom_complet" name="nom_complet"  value="{{ $commentaire->nom_complet}}">
      </div>
      <div class="mb-3">
        <label for="libelle" class="form-label">Laissez nous un message</label>
        <textarea class="form-control" id="libelle" rows="3" name="libelle">{{ $commentaire->libelle}}</textarea>
      </div>
      <button class="btn btn-outline-primary" >Modifier</button>
        </form>
      <br>
      <br>
      <br>
    </div>



</body>

</html>