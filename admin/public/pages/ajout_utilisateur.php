
  <?php
          
          session_start();
       
       if(isset($_POST['submit'])){
          include('../database/bd.php'); 
          $fullname= $_POST['fullname'];
          $email= $_POST['email'];
          $password= $_POST['password'];
          $user_type= $_POST['user_type'];
          $contact= $_POST['contact'];
          $req = $db->prepare('INSERT INTO tshajj_agentcomptoire SET fullname=:fullname, email=:email, password=:password, user_type=:user_type, contact=:contact');
          $req->execute(compact('fullname','email','password','user_type','contact'));
          header('location: utilisateur.php');
  
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

            <h1>Ajouter un nouvel utilisateur</h1>
            
            <form class="" method="POST" action="">
              <div class="form-group">
                <label for="fullname" class="col-auto col-form-label col-form-label-sm">Nom et Prénoms</label>
                <div class="col">
                  <input type="text" name="fullname" class="form-control form-control-sm" id="fullname" value="">
                </div>

              </div>
              <div class="form-group">
                <label for="email" class="col-auto col-form-label-sm">Votre E-mail</label>
                <div class="col">
                  <input type="email" class="form-control form-control-sm" id="email" name="email" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-auto col-form-label col-form-label-sm">Mot de passe</label>
                <div class="col">
                  <input type="password" class="form-control form-control-sm" id="password"  name="password" value="">
                  
                </div>
                <div class="form-group">
                <label for="user_type" class="col-auto col-form-label col-form-label-sm">Domaine</label>
                <div class="col">
                  <input type="user_type" class="form-control form-control-sm" id="user_type"  name="user_type" value=""> 
                </div>
                <div class="form-group">
                <label for="contact" class="col-auto col-form-label col-form-label-sm">Contacts</label>
                <div class="col">
                  <input type="number" class="form-control form-control-sm" id="password"  name="contact" value="">
                  
                </div>
                <br></br>
                <button type="submit" name="submit" style="color:blue"> Ajouter</a> </button>
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