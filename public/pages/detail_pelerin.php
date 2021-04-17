<?php
session_start();
if (isset($_GET["id"])) {
	include('../database/bd.php');
	// obtenir lid 
	$id = $_GET["id"];


	// recuperer les information du pelerin selectionné
	$reqpel = $db->prepare("SELECT * FROM tshajj_pelerin WHERE id_pel = ? ");
	$reqpel->execute([$id]);
	//$pelerin = $reqpel->fetch();

	// afficher en JSON format
	// echo json_encode($pelerin);
?>

	<!doctype html>
	<html lang="en">

	<head>
		<title>Title</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>


		<?php require_once('../inc/sidebare.php'); ?>

		<div class='main-content'>
			<div class="container well">

				<div class="container mt-4">
					<div class="">

						<table id="" class="table table-dark">


							<?php
							if ($customers = $reqpel->fetch()) { ?>

<?php echo ' <img src="photoPelerin/' . $customers['photo_pel'] . '" width="100px" height="100px" alt="" srcset="">'  ?><?php echo '<center>  <img src="' . $customers['identifiant'] . '" width="100px" height="100px" alt="" srcset=""></center>'  ?>
								

								<thead>



									<tr>
										<th> NOM </th>
										<td><?php echo $customers['nom_pel']; ?></td>
									</tr>
									<tr>
										<th> PRENOM </th>
										<td><?php echo $customers['prenom_pel']; ?></td>
									</tr>
									<tr>
										<th> DATE DE NAISSANCE</th>
										<td><?php echo $customers['dat_nais_pel']; ?></td>
									</tr>

									<tr>
										<th> PASSEPORT </th>
										<td><?php echo $customers['passport_pel']; ?></td>
									</tr>
									<tr>
										<th> PROFESSION </th>
										<td><?php echo $customers['proff_pel']; ?></td>
									</tr>
									<tr>
										<th> NIVEAU D'ETUDE </th>
										<td><?php echo $customers['niv_etu_pel']; ?></td>
									</tr>
									<tr>
										<th> CONTACT </th>
										<td><?php echo $customers['cont_pel']; ?></td>
									</tr>
									<tr>
										<th> E-MAIL </th>
										<td><?php echo $customers['email_pel']; ?></td>
									</tr>
									<tr>
										<th> LANGUE </th>
										<td><?php echo $customers['lang_parl_pel']; ?></td>
									</tr>
									<tr>
										<th> AFFINITE </th>
										<td><?php echo $customers['affinite_pel']; ?></td>
									</tr>
									<tr>
										<th> VILLE </th>
										<td><?php echo $customers['ville_pel']; ?></td>
									</tr>
									<tr>
										<th> COMMUNE </th>
										<td><?php echo $customers['comm_pel']; ?></td>
									</tr>
									<tr>
										<th> QUARTIER </th>
										<td><?php echo $customers['quart_pel']; ?></td>
									</tr>
									<tr>
										<th> RUE </th>
										<td><?php echo $customers['rue_pel']; ?></td>
									</tr>
									<tr>
										<th> NUMERO DE PORTE </th>
										<td><?php echo $customers['port_pel']; ?></td>
									</tr>
									<tr>
										<th> NOMBRE DE PARTICIPATION </th>
										<td><?php echo $customers['nb_part_pel']; ?></td>
									</tr>
									<tr>
										<th> SITUATION MATRIMONIALE </th>
										<td><?php echo $customers['sit_matri_pel']; ?></td>
									</tr>
									<tr>
										<th> NOM DU CONJOINT(E) </th>
										<td><?php echo $customers['nom_conj_pel']; ?></td>
									</tr>
									<tr>
										<th> CONTACT DU CONJOINT </th>
										<td><?php echo $customers['cont_conj_pel']; ?></td>
									</tr>
									<tr>
										<th> NOMBRE D'ENFANTS </th>
										<td><?php echo $customers['nb_enf_pel']; ?></td>
									</tr>
									<tr>
										<th> NATIONALITE </th>
										<td><?php echo $customers['orig_pel']; ?></td>
									</tr>
									<tr>
										<th> NOM DE LA PERSONNE A CONTACTER EN CAS D'URGENCE </th>
										<td><?php echo $customers['nom_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> PRENOM DE LA PERSONNE A CONTACTER EN CAS D'URGENCE </th>
										<td><?php echo $customers['prenom_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> CONTACT PERSONNE </th>
										<td><?php echo $customers['cont_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> LANGUE PARLEE </th>
										<td><?php echo $customers['lang_parl_urg_pel']; ?></td>
									</tr>
									<th> VILLE </th>
									<td><?php echo $customers['ville_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> COMMUNE </th>
										<td><?php echo $customers['comm_urg_pel']; ?></td>
									</tr>
									<th> LIEN DE PARENTE </th>

									</tr>
									<tr>
										<th> QUARTIER </th>
										<td><?php echo $customers['quart_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> RUE </th>
										<td><?php echo $customers['rue_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> PORTE </th>
										<td><?php echo $customers['porte_urg_pel']; ?></td>
									</tr>
									<tr>
										<th> CERTIFICAT MEDICALE D'APTITUDE </th>
										<td><?php echo $customers['cert_apt_medi_pel']; ?></td>
									</tr>
									<tr>
										<th> CENTRE DE DELIVRANCE </th>
										<td><?php echo $customers['centre_deli_pel']; ?></td>
									</tr>
									<tr>
										<th> NOM DU MEDECIN </th>
										<td><?php echo $customers['med_del_pel']; ?></td>
									</tr>
									<tr>
										<th> GROUPE SANGUIN </th>
										<td><?php echo $customers['gp_sang_pel']; ?></td>
									</tr>
									<tr>
										<th> MALADIE A SIGNALER </th>
										<td><?php echo $customers['mal_sign_pel']; ?></td>
									</tr>
									<tr>
										<th> AUTRE INFORMATION </th>
										<td><?php echo $customers['autr_info_pel']; ?></td>
									</tr>
									<tr>
										<th> ALERGIE </th>
										<td><?php echo $customers['all_pel']; ?></td>
									</tr>
									<tr>
										<th> PLATS PREFERES</th>
										<td><?php echo $customers['plats_pref_pel']; ?></td>
									</tr>
									<tr>
										<th> NOMBRE DE PLATS PAR JOUR </th>
										<td><?php echo $customers['nb_plats_jr_pel']; ?></td>
									</tr>
									<tr>
										<th> TOLERANCE A LA CLIMATISATION </th>
										<td><?php echo $customers['clim_pel']; ?></td>
									</tr>

									<tr>
										<th> CERTIFICAT MEDICAL D'APTITUDE DU HAJJ</th>
									</tr>

									<tr>
										<th>RECU DU PAIEMENT DU PRIX DU HAJJ</th>
									</tr>

									<tr>
										<th> RECU DE REGLEMENT DES FRAIS COMPLEMENTAIRES</th>
									</tr>

									<tr>
										<th> PASSEPORT </th>
									</tr>

									<tr>
										<th> PHOTO CARTE D'IDENTITE </th>
									</tr>

									<tr>
										<th> PHOTO DE CARNET DE VACCINATION </th>
									</tr>

									<tr>
										<th> PHOTO DU CARNET DE SANTE </th>
									</tr>

									<tr>
										<th> PHOTO DU CONTRAT </th>
									</tr>

									<tr>
										<th> DATE D'ENREGISTREMENT </th>
									</tr>





								</thead>


							<?php } ?>

					</div>
				</div>
				</table>
			</div>
		</div>
		</div>

	<?php
	// stopper la requette
	exit();
}
	?>






	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	</html>