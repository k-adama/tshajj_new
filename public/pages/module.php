
<?php
     include('../database/bd.php');
     $req= $db->query('SELECT * FROM tshajj_modules');
     $reqs= $req->fetchAll();
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
  </head>
  <body>
  <?php include('../inc/sidebare.php'); ?> 

  <div class='main-content'>
    
    <div class="container well">

            <div class="jumbotron mt-4">
            <p><a class="btn btn-primary" href="formulaire.php">Ajouter un module</a></p>
            <h1>Liste des Modules</h1>
            <hr class="display-10">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>N° du Module</th>
                    <th>Nom du Module </th>
                    <th>Actions </th>
                 </tr>
                </thead>
                <?php foreach($reqs as $req) : ?>
                <tr>
                    <td><?php echo $req['id_module'] ?></td>
                    <td><?php echo $req['nom_module']?></td>
                    <td><a href='chapitre.php?id_module=<?php echo $req['id_module']?>' name="detail" id="" class="ti-eye" role="" ></a></td>
                </tr>          
                <?php endforeach ?>
            </table>
            
            

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>