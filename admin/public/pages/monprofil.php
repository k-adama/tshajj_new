<?php include('../inc/header.php'); ?>

<?php

session_start();

 if (isset($_SESSION['id'])) {
   include('../database/bd.php');
   //$fullname = $_SESSION['fullname'];
   
  //Selection des coordonnées de l'administrateur connecté à la plateforme
   $req = $db->query('SELECT * FROM tshajj_agentcomptoire WHERE id ='.$_SESSION['id']);
  $req->execute(compact('id'));
   $connectes = $req->fetch();

   //Récupération des identifiants à partir de la session
   $_SESSION['fullname'] = $connectes['fullname']; 
   $_SESSION['email'] = $connectes['email'];
   $_SESSION['password'] = $connectes['password'];

   // Préparation à la modofication des données

   if (isset($_POST['submit'])) {
    include('../database/bd.php');
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
      $req = $db->prepare('UPDATE tshajj_agentcomptoire SET fullname=:fullname, email=:email, password=:password WHERE id='.$_SESSION['id']);
      $req->execute(compact('fullname','email','password'));
      
      //$message='Vos données ont bien été modifié';
      
        echo '<script>
        alert("Vos données ont bien été modifiées");
        </script>';
        
        header('location:liste_pelerin.php');

      //var_dump($req);
  }
  
  

?>



  <!doctype html>
  <html lang="en">

  <head>
    <title>TS HAJJ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .jumbotron {
        width: 940px;
        margin-right: auto;
        margin-left: auto;

      }
    </style>

  </head>

  <body>

    <?php require_once('../inc/sidebare.php'); ?>


    <div class='main-content'>
      <div class="container well">

        <div class="container mt-4">
          <div class="jumbotron">

            <h1>Mon profil</h1>
            
            <form class="" method="POST" action="">
              <div class="form-group">
                <label for="fullname" class="col-auto col-form-label col-form-label-sm">Nom et Prénoms</label>
                <div class="col">
                  <input type="text" name="fullname" class="form-control form-control-sm" id="fullname" value="<?php echo $_SESSION['fullname'] ?>">
                </div>

              </div>
              <div class="form-group">
                <label for="email" class="col-auto col-form-label-sm">Votre E-mail</label>
                <div class="col">
                  <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $_SESSION['email'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-auto col-form-label col-form-label-sm">Mot de passe</label>
                <div class="col">
                  <input type="password" class="form-control form-control-sm" id="password"  name="password" value="<?php echo $_SESSION['password'] ?>">
                  
                </div>
                <br></br>
                <button type="submit" name="submit" style="color:green" onclick="return confirm('Voulez-vous vraiment modifier?')">Mettre à jour</a> </button>
              </div>
            </form>
             
          </div>
        </div>
      </div>
    </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>

<?php } ?>
