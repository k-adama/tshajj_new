<?php 
  session_start();
  if (isset($_POST["get_data"]))
  {
      // obtenir lid 
      $id = $_POST["id"];
      

      // recuperer les information du pelerin selectionné
      $reqpel = $db->prepare("SELECT * FROM tshajj_pelerin WHERE id_pel = ? ");
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
	$result = $db->query("SELECT * FROM tshajj_pelerin LIMIT $start, $limit");
	
    

	$result1 = $db->query("SELECT count(id_pel) AS id FROM tshajj_pelerin");
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
<table id="table_idhel" class="display" >
    <thead>
    <tr>
	                    <th>NOM</th>
	                    <th>PRENOM</th>
	                    <th>DATE NAISSANCE</th>
	                    <th>CONTACT</th>
	                    <th>VILLE</th>
                        <th>PROFESSION</th>
                        <th>LANGUE</th>
                        <th>CODE QR</th>
                        <th>BADGE</th>
                        <th>ACTIONS</th>
                        
	              	</tr>
    </thead>

    <tbody>
                <?php 
                     while ($customers =$result->fetch()) {?>
                     <tr>
		        			<td><?php echo $customers['nom_pel']; ?></td>
                            <td><?php echo $customers['prenom_pel']; ?></td>
		        		    <td><?php echo $customers['dat_nais_pel']; ?></td>
                            <td><?php echo $customers['cont_pel']; ?></td>
                            <td><?php echo $customers['ville_pel']; ?></td>
                            <td><?php echo $customers['proff_pel']; ?></td>
                            <td><?php echo $customers['lang_parl_pel']; ?></td>
                            <td><?php echo '<center>  <img src="'.$customers['identifiant'].'" width="30px" height="30px" alt="" srcset=""></center>'  ?></td>
                            <td>
                             <a href='../../fpdf/badge_pelerin.php?ids=<?php echo $customers['id_pel'] ?>' class = "btn btn-secondary" id="btn_detail" style=""><span class="ti-export"></span></a>
                            </td>

                            <td>
                          <a href='detail_pelerin.php?id=<?php echo $customers['id_pel'] ?>' name="detail" id="" class="ti-eye" role="button" ></a>    
                            </td>
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


