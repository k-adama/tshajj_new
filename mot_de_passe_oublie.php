<?php include('public/inc/header.php');
    
     
 ?>

<?php include('public/traitement/traite_MDP_oublie.php') ?>
<div class='container-fluid'>
    <div class="recuperation">
        <img src="image/logo.jpg" alt="logo">
        <h2 class="">Récupération de mot de passe</h2>
        <form action="verif.php" method='POST'>
	
				<div class="">
					<div class="login-form"><!--login form-->
		
						<?php 
						if (isset($_GET['correspondance']) && $_GET['correspondance'] == "failed") {
						?>
						<div id="error_message" style="color : red"> Cette adresse mail n'est liée à aucun compte </div><br>
						<?php 
						}

						?>

						<form action="verif.php" method="POST">

                        <div class="group">

                       <input type="Email" placeholder="Votre email" name='email'><i class='fa fa-user'></i>
            
                            </div>
        
							<button type="submit" name="forgotten_password" class="btn btn-default">Envoyez moi le lien</button><br>
							<?php 
						if (isset($_GET['email_sent']) && $_GET['email_sent'] == "true") {
						?>
						<div id="message" style="color : green">Veuillez consulter votre messagerie, nous vous avons envoyé un mail de récupération de mot de passe. </div><br>
						<?php 
						}

						?>
						<?php 
						if (isset($_GET['email_error']) && $_GET['email_error'] == "true") {
						?>
						<div id="message" style="color : red">Une erreur est survenue, veuillez réessayer plus tard </div><br>
						<?php 
						}

						?>
                            <span>
								<a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour à la page de connexion</a>
							</span>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	  
            <input type="submit" class="btn btn-success" name="valider" value="valider">
            
        </form>
     
    </div>
</div>


<?php require_once('public/inc/footer.php'); ?>