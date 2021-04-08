
<?php session_start(); ?>

<?php 
    if (isset($_SESSION['id']) ) {
    include('../database/bd.php');
    $req_user = $db->prepare("SELECT * FROM tshajj_agentcomptoire WHERE id = ? ");
    $req_user->execute(array($_SESSION['id']));
    $user = $req_user ->fetch();
   //recuperer tous les pelerins
   $req_pelerin = $db->query('SELECT *  from tshajj_pelerin ORDER BY date_register DESC LIMIT 8 ');
  
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
 
 ?>
 <?php ini_set('display_errors', 'off'); ?>
<?php require_once('../inc/sidebare.php') ; ?>

          <section class="recent">
              <div class="activite-grid">

                <div class="card-activite" style="background-color:#fff">
                  
                   <div class="container" style="width:100%; margin:auto">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title" style="font-family:poppins; font-size:15px; text-transform:uppercase;color:grey;">Recente Ajout</h3>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                        <table id="user_data" class="table table-bordered table-striped">
                        
                        
                        </div>
                </div>
                <div class="profil">

                </div>

              </div>
                
          </section>
    </main>
</div>
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
    
   <div class = "modal-dialog">
      <div class = "modal-content">
          
         <div class = "modal-header">
            <h6 class = "modal-title" style="font-family:poppins">
                 Informations du pelerin               
            </h6>
 
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               ×
            </button>
         </div>
          
         <div id = "modal-body" style="font-size:12px; font-family:poppins; padding:10px" >
            <div id="qrcode"></div>
            <hr>
            <section class="row">
                
            </section>
            
         </div>
          
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal" style="font-family:poppins;font-size:12px">
               ok
            </button>
         </div>
          

      </div><!-- /.modal-content -->
      


<script>
    function loadData(id) {
        $.ajax({
            url: "home.php",
            method: "POST",
            data: {get_data: 1, id: id},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                var html = "";
               
                 html +=' <img src="'+response.identifiant+'" alt="" srcset="">';
                 html += "<div class='row'style='font-size:12px; font-family:poppins;'>";
                    html += "<div class='col-md-6'>";
                    html += "<small style='font-weight:800;'>Identification </small>";
                    html += "<hr style='margin-top:-2px; '>";
                    html += "<span><span>Nom et Prenom</span>:<span>" + response.nom_pel +" " + response.prenom_pel + "</span></span><br>";
                    html +="<span><span>Date de naissance</span>:<span>" + response.dat_nais_pel + "</span></span><br>";
                    html +="<span><span>Passport</span>:<span> " + response.passport_pel + "</span></span><br>";
                    html +="<span><span>Profession</span>:<span> " + response.proff_pel + "</span></span><br>";
                    html +="<span><span>Niveau </span>:<span> " + response.niv_etu_pel + "</span></span><br>";
                    html +="<span><span>Email </span>:<span> " + response.email_pel + "</span></span><br>";
                    html +="<span><span>langue parler </span>:<span> " + response.lang_parl_pel + "</span></span><br>";
                    html +="<span><span>Affinité </span>:<span> " + response.affinite_pel + "</span></span><br>";
                    html +="<span><span>Ville d'habitation: </span>:<span> " + response.ville_pel + "</span></span><br>";
                     html +="<span><span>Commune </span>:<span> " + response.comm_pel + "</span></span><br>";
                    html +="<span><span>Quatier </span>:<span> " + response.quart_pel + "</span></span><br>";
                    html +="<span><span>Rue </span>:<span> " + response.rue_pel + "</span></span><br>";
                        html +="<span><span>Porte </span>:<span> " + response.port_pel + "</span></span><br>";
                         html += "<span><span>Situation Matrimoniale</span>:<span>" + response.sit_matri_pel + "</span></span><br>";
                    html +="<span><span>Non du conjoint</span>:<span>" + response.nom_conj_pel + "</span></span><br>";
                    html +="<span><span>Nombre D'enfant</span>:<span> " + response.nb_enf_pel + "</span></span><br>";
                    html +="<span><span>Origine</span>:<span> " + response.orig_pel + "</span></span><br>";
                    html +="</div>"

                    html += "<div class='col-md-6'>";
                    html += "<small style='font-weight:800;'>Personne a contacter en cas d'urgence</small>";
                     html += "<hr style='margin-top:-2px;'>";
                    html +="<span><span>Nom et penom </span>:<span>" + response.nom_urg_pel +" " + response.prenom_urg_pel + " </span></span><br>";
                    html +="<span><span>Cont </span>:<span>" + response.cont_urg_pel +" </span></span><br>";
                    html +="<span><span>langue </span>:<span>" + response.lang_parl_urg_pel +" </span></span><br>";
                    html +="<span><span>Ville </span>:<span>" + response.ville_urg_pel +" </span></span><br>";
                    html +="<span><span>Commune </span>:<span>" + response.comm_urg_pel +" </span></span><br>";
                    html +="<span><span>Quatier </span>:<span>" + response.quart_urg_pel +" </span></span><br>";
                    html +="<span><span>Rue </span>:<span>" + response.rue_urg_pel +" </span></span><br>";
                    html +="<span><span>Porte </span>:<span>" + response.porte_urg_pel +" </span></span><br>";
                    html +="</div>";
                  
                html += "</div>";
                  html +="<div class='row'>";
                  html +="<div class='col-md-6' style='margin-top:10px;>";
                        html += "<small  style='font-weight:800;'>Information medicale</small>";
                        html += "<hr style='margin-top:-2px; '>";
                            html +="<span><span>Certificat d'aptitude medicale </span>:<span>" + response.cert_apt_medi_pel +" </span></span><br>";
                            html +="<span><span>Centre de delivrance </span>:<span>" + response.centre_deli_pel +" </span></span><br>";
                            html +="<span><span>Nom du medecin delivreur </span>:<span>" + response.med_del_pel +" </span></span><br>";
                            html +="<span><span>Groupe sanguin </span>:<span>" + response.gp_sang_pel +" </span></span><br>";
                            html +="<span><span>Maladie Signalé </span>:<span>" + response.mal_sign_pel +" </span></span><br>";
                            html +="<span><span>Autre information </span>:<span>" + response.autr_info_pel +" </span></span><br>";
                        html +="</div>";

                        html +="<div class='col-md-6' style='margin-top:10px;>";
                        html += "<small  style='font-weight:800;'>Restauration et Hebergement</small>";
                        html += "<hr style='margin-top:-2px; '>";
                            html +="<span><span>Allergie </span>:<span>" + response.all_pel +" </span></span><br>";
                            html +="<span><span>Plat préféré </span>:<span>" + response.centre_deli_pel +" </span></span><br>";
                            html +="<span><span>Nombre de plats </span>:<span>" + response.nb_plats_jr_pel +" </span></span><br>";
                            html +="<span><span>Groupe sanguin </span>:<span>" + response.gp_sang_pel +" </span></span><br>";
                            html +="<span><span>Climatiseur </span>:<span>" + response.clim_pel +" </span></span><br>";
                            html +="<span><span>Affinité </span>:<span>" + response.affi1_pel +" </span></span><br>";
                        html +="</div>";
                        
                    html +="</div>";
                // And now assign this HTML layout in pop-up body
               
                $("#modal-body").html(html);
            
                // And finally you can this function to show the pop-up/dialog
                $("#myModal").modal();
            }
        });
    }
    
</script>

<?php require_once('../inc/footer.php'); ?>

<?php   
 }else{
        header('location:../../index.php');
    }

?>


