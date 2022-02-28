<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index1.css"
  </head>
  <body>
  <div class="color">
        <div class="text-center">
                <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
        <form action="/ma-page-de-traitement" method="post">
          <div>
              <label for="name">Un genre</label>
              <select name="genre" id="pet-select">
    <option value="">--Veuillez chosir un genre de film --</option>
    <option value="action">action</option>
    <option value="aventure">aventure</option>
    <option value="comédie">comédie</option>
</select>
          </div>
          <div>
              <label for="mail">Un réalisateur</label>
              <select name="pets" id="pet-select">
                  <option value="">--Veuillez chosir un réalisateur de film --</option>
                  <option value="Spielberg">Spielberg</option>
                  <option value="Lucas">Lucas</option>
                  <option value="Kubric">Kubric</option>
              </select>
          </div>
          <div>
              <label for="msg">Film</label>
              <textarea id="msg" name="user_message"></textarea>
        </div>
      </form>       
                <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
                <a href="landing.php" class="btn btn-danger btn-lg">valider</a>
        </div>
  </div>
  </body>
</html>
