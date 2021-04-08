<?php

 include('../database/bd.php');
 include('../inc/securite.php');
 include('../../phpqrcode/qrlib.php');

$nom=$prenom=$date_naissance=$passport=$profession=$niveau_etude=$contact=$email=$langue_parle=$affinite_langue=$ville=$commune=$quatier=$rue_geo=$porte_geo=$nbr_participation=
$situation_matri=$nom_conjoint=$contact_conjoint=$nbr_enfant=$origine=$nom_per_urgence=$prenom_per_urgence=$langue_per_urgence=$contact_per_urgence=$ville_urgence=$commune_urgence=
$quartier_urgence=$rue_urgence=$porte_urgence=$certificat_AM_numero=$centre_delivr=$grp_sangin=$mal_signale=$autre_info=$alergie=$plat=$nbr_plat=$clim=$afinite_resto=$medecin=$photo=$image=$paiement=$recu=$passeport=$CNI=$vaccination=$carnet=$contrat="";

$nom_err=$prenom_err=$date_err=$passposrt_err= $profession_err=$niveau_err=$contact_err=$email_err=$langue_parler_err=$ville_err=$quatier_err=$situa_matri_err=$nbr_enfant_err=$origine_err=
$nom_per_urgence_err= $prenom_per_urgence_err=$contact_per_urgence_err=$ville_urgence_err=$quartier_urgence_err= $certificat_AM_numero_err= $centre_delivr_err=$grp_sangin_err="";

if (isset($_POST['submit'])) {

    //var_dump($_POST['conjoint_cont']);
    if(empty($_POST['nom'])){
        $nom_err = "Ce champs est obligatoire";
    }else{
        $nom= secure($_POST['nom']);
    }

    if(empty($_POST['prenom'])){
        $prenom_err = "Ce champs est obligatoire";
    }else{
        $prenom= secure($_POST['prenom']);
    }
    if(empty($_POST['date_naissance'])){
        $date_err = "la date de naissance est obligatoire";
    }else{
        $date_naissance= secure($_POST['date_naissance']);
    }
    if(empty($_POST['passport'])){
        $passpsrt_err = "Ce champs est obligatoire";
    }else{
        $passport= secure($_POST['passport']);
    }
    if(empty($_POST['profession'])){
        $profession_err = "Ce champs est obligatoire";
    }else{
        $profession=secure($_POST['profession']);
    }

    if(empty($_POST['niveau_etude'])){
        $niveau_err = "Ce champs est obligatoire";
    }else{
        $niveau_etude=secure($_POST['niveau_etude']);
    }

    if(empty($_POST['contact'])){
        $contact_err = "Ce champs est obligatoire";
    }else{
        $contact=secure($_POST['contact']);
    }
    if(empty($_POST['email'])){
        $email_err = "Ce champs est obligatoire";
    }else{
        $email=secure($_POST['email']);
    }
    if(empty($_POST['langue_parler'])){
        $langue_parler_err = "Ce champs est obligatoire";
    }else{
        $langue_parle=secure($_POST['langue_parler']);
    }


    if(empty($_POST['ville'])){
        $ville_err = "Ce champs est obligatoire";
    }else{
        $ville=secure($_POST['ville']);
    }
    if($_POST['commune']){
        $commune =secure($_POST['commune']);
    }

    if(empty($_POST['quartier'])){
        $quatier_err = "Ce champs est obligatoire";
    }else{
        $quartier=$_POST['quartier'];
    }
    if ($_POST['rue_geo']) {
        $rue_geo=secure($_POST['rue_geo']);
    }
    if ($_POST['porte_geo']) {
        $porte_geo=secure($_POST['porte_geo']);
    }

    if ($_POST['nbr_participation']) {
        $nbr_participation=secure($_POST['nbr_participation']);
    }

    if(empty($_POST['situation_matri'])){
         $situa_matri_err= "Ce champs est obligatoire";
    }else{
        $situation_matri=$_POST['situation_matri'];
    }

    if ($_POST['nom_conjoint']) {
        $nom_conjoint=secure($_POST['nom_conjoint']);
    }
    if ($_POST['conjoint_cont']) {
        $contact_conjoint=secure($_POST['conjoint_cont']);
    }

    if(empty($_POST['nbr_enfant'])){
        $nbr_enfant_err= "Ce champs est obligatoire";

      }else{
        $nbr_enfant=secure($_POST['nbr_enfant']);
    }

   if(empty($_POST['origine'])){
     $origine_err= "Ce champs est obligatoire";
   }else{
    $origine=secure($_POST['origine']);
  }

  if(empty($_POST['nom_per_urgence'])){
    $nom_per_urgence_err = "Ce champs est obligatoire";
  }else{
    $nom_per_urgence = secure($_POST['nom_per_urgence']);
 }

 if(empty($_POST['prenom_per_urgence'])){
    $prenom_per_urgence_err = "Ce champs est obligatoire";
  }else{
    $prenom_per_urgence = secure($_POST['prenom_per_urgence']);
 }

 if($_POST['langue_per_urgence']){
    $langue_per_urgence=secure($_POST['langue_per_urgence']);
}

if(empty($_POST['contact_per_urgence'])){
    $contact_per_urgence_err = "Ce champs est obligatoire";
  }else{
    $contact_per_urgence =secure($_POST['contact_per_urgence']);
 }

 if(empty($_POST['ville_urgence'])){
    $ville_urgence_err = " Ce champs est obligatoire";
  }else{
    $ville_urgence= $_POST['ville_urgence'];
 }

 if($_POST['commune_urgence']){
    $commune_urgence=secure($_POST['commune_urgence']);
}

if(empty($_POST['quartier_urgence'])){
    $quartier_urgence_err = "Ce champs est obligatoire";
}else{
    $quartier_urgence=secure($_POST['quartier_urgence']);
}
if ($_POST['rue_urgence']) {
    $rue_urgence=secure($_POST['rue_urgence']);
}
if ($_POST['porte_urgence']) {
    $porte_urgence=secure($_POST['porte_urgence']);
}
if(empty($_POST['certificat_AM_numero'])){
    $certificat_AM_numero_err = "Ce champs est obligatoire";
}else{
    $certificat_AM_numero=secure($_POST['certificat_AM_numero']);
}

if(empty($_POST['centre_delivr'])){
    $centre_delivr_err = "Ce champs est obligatoire";
}else{
    $centre_delivr=secure($_POST['centre_delivr']);
}

if(empty($_POST['centre_delivr'])){
    $centre_delivr_err = "Ce champs est obligatoire";
}else{
    $centre_delivr=secure($_POST['centre_delivr']);
}


if(empty($_POST['grp_sangin'])){
    $grp_sangin_err = "Ce champs est obligatoire";
}else{
    $grp_sangin=secure($_POST['grp_sangin']);
}


if ($_POST['mal_signale']) {
    $mal_signale=secure($_POST['mal_signale']);
}

if ($_POST['autre_info']) {
    $autre_info=secure($_POST['autre_info']);
}

if ($_POST['alergie']) {
    $alergie=secure($_POST['alergie']);
}


if ($_POST['plat']) {
    $plat=secure($_POST['plat']);
}

if ($_POST['nbr_plat']) {
    $nbr_plat=secure($_POST['nbr_plat']);
}
if ($_POST['clim']) {
    $clim=secure($_POST['clim']);
}
if ($_POST['afinite_resto']) {
    $afinite_resto=secure($_POST['afinite_resto']);
}

if($_POST['medecin']){
    $medecin = secure($_POST['medecin']);
}

if(empty($_POST['photo'])){
    $photo_err = "Ce champs est obligatoire";
}else{
    $photo=secure($_POST['photo']);
}
if(empty($_POST['image'])){
    $image_err = "Ce champs est obligatoire";
}else{
    $image=secure($_POST['image']);
}
if(empty($_POST['paiement'])){
    $paiement_err = "Ce champs est obligatoire";
}else{
    $paiement=secure($_POST['paiement']);
}

if(empty($_POST['recu'])){
    $recu_err = "Ce champs est obligatoire";
}else{
    $recu=secure($_POST['recu']);
}
if(empty($_POST['passeport'])){
    $passeport_err = "Ce champs est obligatoire";
}else{
    $passeport=secure($_POST['passeport']);
}
if(empty($_POST['CNI'])){
    $CNI_err = "Ce champs est obligatoire";
}else{
    $CNI=secure($_POST['CNI']);
}
if(empty($_POST['vaccination'])){
    $vaccination_err = "Ce champs est obligatoire";
}else{
    $vaccination=secure($_POST['vaccination']);}

    if(empty($_POST['carnet'])){
        $carnet_err = "Ce champs est obligatoire";
    }else{
        $carnet=secure($_POST['carnet']);}

        if(empty($_POST['contrat'])){
            $contrat_err = "Ce champs est obligatoire";
        }else{
            $contrat=secure($_POST['contrat']);
        }


 //Vérification des erreurs de saisie avant l'insertion dans la base de données

if(empty($nom_err) &&
empty($prenom_err) &&
empty($contact_err) &&
empty($email_err) &&
empty($langue_parler_err) &&
empty($date_err) &&
empty($passport_err) &&
empty($profession_err)&&
empty($niveau_err) &&
empty($ville_err) &&
empty($quatier_err) &&
empty($situa_matri_err)&&
empty($origine_err)){


    //generer le qrcode
    $path='../../image/';
    $file = $path.uniqid().".png";

    //text to output
    $text=$nom;
    $text.=$contact;
    $text.=$date_naissance;
    QRcode::png($text,$file,'L',4,2);
    //$photo_contrat = $_FILES['contrat']['name'];

$codebare=$file;
$date_register = date('d-m-y h:i:s');

//  $image = $_FILES['image']['name'];
//  $paiement = $_FILES['paiement']['name'];
//  $recu = $_FILES['recu']['name'];
//  $passeport = $_FILES['passeport']['name'];
//  $CNI = $_FILES['CNI']['name'];
//  $vaccination = $_FILES['vaccination']['name'];
//  $carnet = $_FILES['carnet']['name'];
//  $contrat = $_FILES['contrat']['name'];
 //$nb = count($_FILES);

// for($i=0; $i<$nb;$i++){

//   if( move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photoPelerin/" . $_FILES["photo"]["name"][$i])
//   && move_uploaded_file($_FILES["image"]["tmp_name"], "../../photoPelerin/" . $_FILES["image"]["name"][$i])
//   && move_uploaded_file($_FILES["paiement"]["tmp_name"], "../../photoPelerin/" . $_FILES["paiement"]["name"][$i])
//   && move_uploaded_file($_FILES["recu"]["tmp_name"], "../../photoPelerin/" . $_FILES["recu"]["name"][$i])
//   && move_uploaded_file($_FILES["passeport"]["tmp_name"], "../../photoPelerin/" . $_FILES["passeport"]["name"][$i])
//   && move_uploaded_file($_FILES["carnet"]["tmp_name"], "../../photoPelerin/" . $_FILES["carnet"]["name"][$i])
//   && move_uploaded_file($_FILES["CNI"]["tmp_name"], "../../photoPelerin/" . $_FILES["CNI"]["name"][$i])
//   && move_uploaded_file($_FILES["vaccination"]["tmp_name"], "../../photoPelerin/" . $_FILES["vaccination"]["name"][$i])
//   && move_uploaded_file($_FILES["contrat"]["tmp_name"], "../../photoPelerin/" . $_FILES["contrat"]["name"][$i])){
     //file_exists("../../photoPelerin/" . $_FILES["photo"]["name"])
 //&& file_exists("../../photoPelerin/" . $_FILES["image"]["name"])){
     //echo $_FILES["photo"]["name"] . " existe déjà.";
     //echo $_FILES["image"]["name"] . " existe déjà.";//else{
    // move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photoPelerin/" . $_FILES["photo"]["name"]);
     //move_uploaded_file($_FILES["image"]["tmp_name"], "../../photoPelerin/" . $_FILES["image"]["name"]);

    //  $dossier = '../../photoPelerin/';
    //  foreach ($_FILES["photo"]["error"] as $key => $error) {
    //      if ($error == UPLOAD_ERR_OK) {
    //          $tmp_name = $_FILES["photo"]["tmp_name"][$key];
    //          // basename() peut empêcher les attaques de système de fichiers;
    //          // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    //          $name = basename($_FILES["photo"]["name"][$key]);
    //          move_uploaded_file($tmp_name, "$dossier/$name");
         //}
     //}

    
     $dossier = '../../photoPelerin/';
     $nb = count($_FILES);
     //for($i=0; $i<$nb;$i++)
      
        $photo = $_FILES['photo']['name'];
    $image = $_FILES['image']['name'][$i];
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photoPelerin/" . $_FILES["photo"]["name"]) 
      && move_uploaded_file($_FILES["image"]["tmp_name"][$i], "../../photoPelerin/" . $_FILES["image"]["name"])){
       

$req=$db->prepare("INSERT INTO tshajj_pelerin(identifiant,nom_pel,prenom_pel,dat_nais_pel,passport_pel,proff_pel,niv_etu_pel,
cont_pel,email_pel,lang_parl_pel,ville_pel,comm_pel,quart_pel,rue_pel,port_pel,nb_part_pel,
sit_matri_pel,nom_conj_pel,cont_conj_pel,nb_enf_pel,orig_pel,nom_urg_pel,prenom_urg_pel,cont_urg_pel,lang_parl_urg_pel,
ville_urg_pel,comm_urg_pel,quart_urg_pel,rue_urg_pel,porte_urg_pel,cert_apt_medi_pel,centre_deli_pel,med_del_pel,gp_sang_pel,
mal_sign_pel,autr_info_pel,all_pel,plats_pref_pel,nb_plats_jr_pel,clim_pel,affi1_pel,photo_pel,photo_cert_apt,photo_recu_paie,photo_recu_regl,photo_passport,photo_cni,photo_carn_vacc,photo_carn_sant,photo_contrat,date_register)

VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$req->execute(array($codebare,$nom,$prenom,$date_naissance,$passport,$profession,$niveau_etude,$contact,$email,$langue_parle,$ville,$commune,$quartier,$rue_geo,$porte_geo,
$nbr_participation,$situation_matri,$nom_conjoint,$contact_conjoint,$nbr_enfant,$origine,$nom_per_urgence,$prenom_per_urgence,$contact_per_urgence,$langue_per_urgence,$ville_urgence,$commune_urgence,$quartier_urgence,$rue_urgence,$porte_urgence,$certificat_AM_numero,
$centre_delivr,$medecin,$grp_sangin,$mal_signale,$autre_info,$alergie,$plat,$nbr_plat,$clim,$afinite_resto,$photo,$image,$paiement,$recu,$passeport,$CNI,$vaccination,$carnet,$contrat,$date_register) ) ;
header('location:home.php');
}
}
 
}
?>



