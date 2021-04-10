<?php include('public/inc/header.php');
    
     
 ?>
<?php include('public/traitement/traite_connexion.php'); ?>

<div class='container-fluid'>
    <div class="login">
        <img src="image/Background_1_-removebg-preview.png" alt="logo">
        <h2 class="">Connexion</h2>
        <form action="" method='POST'>
            <div class="group">
                <input type="Email" placeholder="Votre email" name='email'><i class='fa fa-user'></i>
            </div>
            <div class="group">
                <input type="password" placeholder="Mot de passe" name='password'><i class="fa fa-lock"></i>
            </div>
            <input type="submit" class="btn btn-success" name="submit" value="connexion">
            <p class="fs">Vous avez oublié votre <a href="mot_de_passe_oublie.php">Mot de passe</a>?</p>
            
        </form>
        <?php

        if (isset($erreur) && !empty($erreur)) {

        echo "<div id='msg' class='error' style='color: white;  width: 80%;margin:10px auto;text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 13px;'> $erreur</div>";
        }
      ?>
     
    </div>
</div>

<?php require_once('public/inc/footer.php'); ?>