<?php 
//include('config.php');
include('./PHPMailer_5.2.4/class.phpmailer.php');
session_start();

include('public/database/bd.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query_login = $db->prepare("SELECT * FROM tshajj_agentcomptoire WHERE email = ? AND password = ?");
    $query_login -> execute([$email,$password]);

    $num_rows = $query_login -> rowCount();

    if ($num_rows > 0) {
        if ($row = $query_login->fetch()) {

            $_SESSION['id'] = $row['user_id'];
            $_SESSION['user_type'] = $row['user_type'];
            $user_type = $_SESSION['user_type'];
            
            header('Location: ./'.$user_type);
                
        } 
    } 
    else {
        header('Location: ./index.php?login=failed');
    }
}

if (isset($_POST['register'])) {

    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $email = $_POST['email'];
    $password = md5($_POST['confirm_password']);
    $profile_pic = $_FILES['profile_pic']['name'];
    $user_type = $_POST['user_type'];
    $date_register = gmdate('d/m/Y H:i:s');

    $target = "images/profile_pics/".basename($profile_pic);

    $query_login = $db->prepare("SELECT * FROM tshajj_agentcomptoire WHERE email = ? ");
    $query_login -> execute([$email]);

    $num_rows = $query_login -> rowCount();

    if ($num_rows > 0) {
        header('Location: ./index.php?user_exists=true');

    } else {
        if ($user_type == "lecteur") {
            $query_register = $conn->prepare("INSERT INTO users (nom, prenoms, email, password,profile_pic,user_type, date_register) VALUES (?,?,?,?,?,?,?);");
            $query_register->execute([$nom,$prenoms,$email,$password,$profile_pic,$user_type,$date_register]);   
    
        } else if ($user_type == "ecrivain") {
            $query_register = $conn->prepare("INSERT INTO users (nom, prenoms, email, password,profile_pic,user_type, active, date_register) VALUES (?,?,?,?,?,?,?,?);");
            $query_register->execute([$nom,$prenoms,$email,$password,$profile_pic,$user_type,"non",$date_register]);   
    
        } else {
            header('Location: ./login.php?register=failed');
        }
        // TODO si c'est un ecrivain mettre active = non

    }
    
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    if ($query_register) {
        header('Location: ./login.php');
    } else {
        header('Location: ./login.php?register=failed');
    }

}

if (isset($_POST['nouveau_livre'])) {

    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $editeur = $_POST['editeur'];
    $genre = $_POST['genre'];
    $categorie = $_POST['categorie'];
    $prix = $_POST['prix'];
    $annee_parution = $_POST['annee_parution'];
    $fichier = $_FILES['fichier']['name'];
    $photo_couv = $_FILES['photo_couv']['name'];
    
    $id_ecrivain = $_SESSION['id'];
    $date_post = gmdate("d/m/Y H:i:s");


    $target = "images/livres/fichiers/".basename($fichier);
    $target1 = "images/livres/couvertures/".basename($photo_couv);
    
    if (isset( $_POST['telechargeable']) &&  $_POST['telechargeable'] == "oui") {

    $query_nouveau_livre = $conn->prepare("INSERT INTO livre (intitule, description, editeur, genre,categorie,photo_couv,fichier, annee_parution,prix,telechargeable, date_post,approuve,id_ecrivain) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
    $query_nouveau_livre->execute([$intitule,$description,$editeur,$genre,$categorie,$photo_couv,$fichier,$annee_parution,$prix,1,$date_post,0,$id_ecrivain]);   

    } else {
        $query_nouveau_livre = $conn->prepare("INSERT INTO livre (intitule, description, editeur, genre,photo_couv,fichier, annee_parution,prix,telechargeable, date_post,approuve,id_ecrivain) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
        $query_nouveau_livre->execute([$intitule,$description,$editeur,$genre,$photo_couv,$fichier,$annee_parution,$prix,0,$date_post,0,$id_ecrivain]);   

        }
        if (move_uploaded_file($_FILES['photo_couv']['tmp_name'], $target1) && move_uploaded_file($_FILES['fichier']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        if ($query_nouveau_livre) {
            header('Location: ./ecrivain/mes_livres.php');
        } else {
            header('Location: ./ecrivain/nouveau_livre.php?creation=failed');
    }

}


if (isset($_POST['nouvelle_categorie'])) {
    $designation = $_POST['designation'];
    $query_new_catgory = $conn->prepare("INSERT INTO `categorie` (`designation`) VALUES (?);");
       $query_new_catgory->execute([$designation]);

       if ($query_new_catgory) {
           header('Location: ./admin/categories.php');
       } else {
           header('Location: ./admin/nouvelle_categorie.php?creation=failed');
       } 
}

if (isset($_POST['supprimer_categorie'])) {
    $query_delete = $conn->prepare("DELETE FROM `categorie` WHERE `id_categorie`= ?");
    $query_delete -> execute([$_POST['id_categorie']]);

    if ($query_delete) {
        header('Location: ./admin/categories.php');
    } else {
        header('Location: ./admin/categories.php?deletion=failed');
    } 
}

if (isset($_POST['nouveau_genre'])) {
    $designation = $_POST['designation'];
    $query_new_catgory = $conn->prepare("INSERT INTO `genre` (`designation`) VALUES (?);");
       $query_new_catgory->execute([$designation]);

       if ($query_new_catgory) {
           header('Location: ./admin/genres.php');
       } else {
           header('Location: ./admin/nouveau_genre.php?creation=failed');
       } 
}

if (isset($_POST['supprimer_genre'])) {
    $query_delete = $conn->prepare("DELETE FROM `genre` WHERE `id_genre`= ?");
    $query_delete -> execute([$_POST['id_genre']]);

    if ($query_delete) {
        header('Location: ./admin/genres.php');
    } else {
        header('Location: ./admin/genres.php?deletion=failed');
    } 
}


if (isset($_POST['forgotten_password'])) {

    $email = $_POST['email'];

    $query_forgotten_password = $db->prepare('SELECT * FROM tshajj_agentcomptoire WHERE email = ?');
    $query_forgotten_password->execute([$email]);

    $num_rows = $query_forgotten_password->rowCount();

    if ($num_rows > 0) {
        if ($row = $query_forgotten_password->fetch()) {

            // Code de l'envoi de mail
            
             $expFormat = mktime(
                date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
            );


            $expDate = date("Y-m-d H:i:s",$expFormat);
            // echo $expDate;
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;

            // Insert Temp Table

            $query_register = $db->prepare("INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES (?,?,?);");
            $query_register->execute([$email,$key,$expDate]);
            
            
            $output='<p>Hello,</p>';
            $output.='<p>Cliquez sur le lien suivant pour réinitialiser votre mot de passe.</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p><a href="https://afrolittera.com/home1/reset_password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
            https://afrolittera.com/home1/reset_password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>Assurez-vous de copier l\'intégralité du lien dans votre navigateur. Le lien expirera après 1 jour pour des raisons de sécurité.</p>';
            $output.='<p>Si vous n\'avez pas demandé cet e-mail de mot de passe oublié, aucune action n\'est nécessaire, votre mot de passe ne sera pas réinitialisé. Cependant, vous voudrez peut-être vous connecter à votre compte et modifier votre mot de passe de sécurité car quelqu\'un l\'a peut-être deviné.
            </p>';   	
            $output.='<p>Merci,</p>';
            $output.='<p>L\'équipe TasnimVoyages</p>';

            $body = $output; 

            $subject = "Récupération de mot de passe - TasnimVoyages";
            
            $email_to = $email;
            $fromserver = "info@tasnimvoyages.com"; 

            require("PHPMailer/PHPMailerAutoload.php");

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            $mail->Host = 'mail42.lwspanel.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "info@tasnimvoyages.com"; // Enter your email here
            $mail->Password = "uD8-FuY8QP";
            $mail->setFrom('info@tasnimvoyages.com', 'TS HAJJ');
            $mail->addReplyTo('info@tasnimvoyages.com', 'TS HAJJ');
            $mail->AddAddress($email_to);
            $mail->Subject = $subject;
            $mail->IsHTML(true);
            // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
            $mail->Body = $body;
            //$mail->addAttachment('test.txt');


             if(!$mail->Send()){
                header('Location: .mot_de_passe_oublie.php?email_error=true');
                echo "Mailer Error: " . $mail->ErrorInfo;
             }
             else{
                    header('Location: ./mot_de_passe_oublie.php?email_sent=true');
                    
             }
        } 
    } 
    else {
        header('Location: ./mot_de_passe_oublie.php?correspondance=failed');
    }
}


if(isset($_POST["reset_password"])){


    $password = md5($_POST["confirm_password"]);
    $email = $_POST["email"];
    
    
    $query_update = $db->prepare("UPDATE `tshajj_agentcomptoire` SET `password`= ? WHERE `email`= ?");
    $query_update -> execute([$password,$email]);
    
    $query_delete = $db->prepare("DELETE FROM `password_reset_temp` WHERE `email`= ?");
    $query_delete -> execute([$email]);
    
    if ($query_update) {
        header('Location: ./index.php');
    } else {
        header('Location: ./reset_password.php?reset_password=failed');
    } 
}



         

    
     



























?>