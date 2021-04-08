<?php 
  session_start();
  
  
?>

<?php
        

     
     if(isset($_POST['Envoyer'])){

        include('../database/bd.php'); 
        $nom_chapitre= $_POST['nom_chapitre'];
        $req = $db->prepare('INSERT INTO tshajj_chapitres SET nom_chapitre=:nom_chapitre');
        $req->execute(compact( 'nom_chapitre'));
        header('location: chapitre.php');

     }
?>
  <?php include('../inc/sidebare.php'); ?>
<!doctype html>
<html lang="fr">
  <head>
    <title>TsHajj</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class='main-content'>
   <p class='logo'>
       <img src="../../image/Background_1_-removebg-preview.png" alt="logo">
   </p>
   <div class="container mt-4">
              <div class="jumbotron  ">
                  <h3 class="display-7">Formulaire d'ajout de Chapitre</h3>
                  <hr class="mt-6">
                <form action="" method="POST">
                    <div class="form-group w-50">
                        <label for="">Nom</label>
                        <input class="form-control" type="text" name="nom_chapitre" >
                        <input type="submit" value="Enregistrer" class="btn btn-primary " name="Envoyer">
                    </div>
                </form>
              </div>

          </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
