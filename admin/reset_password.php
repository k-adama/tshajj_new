<?php
include('config.php');
include('header.php');


if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])  && ($_GET["action"]=="reset") && !isset($_POST["action"])){

  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");

  $query_reset = $conn->prepare("SELECT * FROM `password_reset_temp` WHERE `key`= ? and `email`= ? ");
    $query_reset -> execute([$key,$email]);
 
  $num_rows = $query_reset -> rowCount();

    if ($num_rows > 0) {

        if ($row = $query_reset->fetch()) {

  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
  <br />
  <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Veuillez saisir un nouveau mot de passe </h2>
						<?php 
						if (isset($_GET['reset_password']) && $_GET['reset_password'] == "failed") {
						?>
						<div id="message" style="color : red">Une erreur est survenue, veuillez réessayer plus tard </div><br>
						<?php 
						}

						?>

						<form action="verif.php" method="post">
                        <input type="password" name="password" id="password" placeholder="Mot de passe"/>
							<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe"/>
                            <input type="hidden" name="action" value="update" />
                            <input type="hidden" name="email" value="<?php echo $email;?>"/>
                            <p id="same_password" style="color : red"></p>
							<button type="submit" id="reset" name="reset_password" class="btn btn-default">Réinitialiser mon mot de passe</button><br>
							
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
				
				</div>
				<div class="col-sm-4">
					
				</div>
			</div>
		</div>
	</section><!--/form-->
 
<?php
}else{
echo "<h2>Lien expiré</h2>
<p>Le lien a expiré. Vous essayez d'utiliser le lien expiré qui
comme valable seulement 24 heures (1 jours après la demande).<br /><br /></p>";
            }
        } // If row fetch

        } // If row count > 0
         else {
           
  
  echo '<h2>Lien invalide</h2>
<p>Le lien est invalide / expiré. Soit vous n\'avez pas copié le bon lien
à partir de l\'e-mail, ou vous avez déjà utilisé la clé auquel cas elle est
désactivé.</p>
<p><a href="https://www.afrolittera.com/home1/forgot_password.php">
Cliquez ici</a> pour réinitialiser votre mot de passe.</p>';
 
  
      }

} // isset email key validate end
 
?>


<?php
    include('footer.php')
?>
	
<script>

$('#password, #confirm_password').on('keyup', function () {

  if ($('#password').val() == $('#confirm_password').val()) {

	document.getElementById("same_password").innerHTML = "";
	
	document.getElementById("reset").removeAttribute("disabled");

  } else {
	  
	document.getElementById("same_password").innerHTML = "Les mots de passe ne correspondent pas";
	document.getElementById("reset").disabled = "true";

  }

});

</script>