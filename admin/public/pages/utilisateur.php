<?php 
  session_start();
  if (isset($_POST["get_data"]))
  {
      // obtenir lid 
      $id = $_POST["id"];
      

      // recuperer les information du pelerin selectionné
      $reqpel = $db->prepare("SELECT * FROM tshajj_agentcomptoire WHERE id = ? ");
      $reqpel->execute(array($id));
      $pelerin = $reqpel->fetch();
    
      // afficher en JSON format
      echo json_encode($pelerin);

      // stopper la requette
      exit();
  }

  if (isset($_SESSION['id']) ) { 
    include('../database/bd.php');
    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 500;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $db->query("SELECT * FROM tshajj_agentcomptoire LIMIT $start, $limit");
	
    

	$result1 = $db->query("SELECT count(id) AS id FROM tshajj_agentcomptoire");
	$custCount = $result1->fetch();
	$total = $custCount[0];
    $pages = ceil( $total / $limit );
    
	

	$Previous = $page - 1;
	$Next = $page + 1; 
  }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TS HAJJ</title>

   </head>

<body>
<?php require_once('../inc/sidebare.php'); ?>
<div>
<div class='main-content'>
<div class="container well">
<form action="">
<center>
<button> <a href="ajout_utilisateur.php" style="color:green"> Ajouter un utilisateur +</a></button>
</center>

<br></br>
<table id="table_idhel" class="display" >
    <thead>
    <tr>
	                    <th>NOM ET PRENOMS</th>
	                    <th>E-MAIL</th>
	                    <th>MOT DE PASSE</th>
	                    <th>TYPE UTILISATEUR</th>
                        <th>CONTACTS</th>
                        
	              	</tr>
    </thead>

    <tbody>
                <?php 
                     while ($customers =$result->fetch()) {?>
                     <tr>
		        			<td><?php echo $customers['fullname']; ?></td>
		        		    <td><?php echo $customers['email']; ?></td>
                            <td><?php echo $customers['password']; ?></td>
                            <td><?php echo $customers['user_type']; ?></td>
                            <td><?php echo $customers['contact']; ?></td>
		        		</tr>
                      <?php } ?>
	        	</tbody>
               </div>
    
</table>

</div>


 


<script type="text/javascript">
$(document).ready( function () {
    $('#table_idhel').DataTable();
} );

</script>


</script>
</form>
</div>
</div>

</body>
</html>


