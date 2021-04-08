<?php

session_start();
include('public/database/bd.php');
include('public/inc/securite.php');
 
 if(isset($_POST['valider'],$_POST['email'])) {
    if(!empty($_POST['email'])) {
       $email = htmlspecialchars($_POST['email']);
       if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $mailexist = $db->prepare('SELECT id FROM tshajj_agentcomptoire WHERE email = ?');
          $mailexist->execute(array($email));
          $mailexist_count = $mailexist->rowCount();
          if($mailexist_count == 1) {
            $fullname = $mailexist->fetch();
             
             $_SESSION['email'] = $email;
             $recup_code = "";
             for($i=0;$i < 5; $i++ ) {
                $recup_code .= mt_rand(0,5);
             }
             $_SESSION['recup_code'] = $recup_code;
             $mail_recup_exist = $db->prepare('SELECT id FROM recuperation WHERE email = ?');
            $mail_recup_exist->execute(array($email));
            $mail_recup_exist = $mail_recup_exist->rowCount();

            if($mail_recup_exist==1 ){
               $recup_insert = $db->prepare('UPDATE recuperation SET code = ? WHERE email = ?');
               $recup_insert->execute(array($recup_code,$email));

            } else{
               $recup_insert = $db->prepare ('INSERT INTO recuperation(email,code) VALUES (? , ?)');
               $recup_insert->execute(array($email,$recup_code));
            }

            $header="MIME-Version: 1.0\r\n";
         $header.='From:"[VOUS]"<votremail@mail.com>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Votresite</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b></b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="#">Votre site</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         
         ';

         mail($email, "Récupération de mot de passe - Votresite", $message, $header);
         header("Location:mot_de_passe_oublie.php?section=code");
             
         } 
          else{
           echo "Adresse e-mail n'existe pas";
          }
        }
        else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   
    }
    if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
      if(!empty($_POST['verif_code'])) {
         $verif_code = htmlspecialchars($_POST['verif_code']);
         $verif_req = $db->prepare('SELECT id FROM recuperation WHERE email = ? AND code = ?');
         $verif_req->execute(array($_SESSION['email'],$verif_code));
         $verif_req = $verif_req->rowCount();
         if($verif_req == 1) {
            $del_req = $db->prepare( 'DELETE FROM recuperation WHERE email = ?');
            $del_req->execute(array($_SESSION['email']));
            header('Location:mot_de_passe_oublie.php?section=changemdp');
         } else {
            $error = "Code invalide";
         }
      } else {
         $error = "Veuillez entrer votre code de confirmation";
      }
   }


}

?>
