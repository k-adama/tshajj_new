<?php
 session_start(); 
include('public/database/bd.php');
include('public/inc/securite.php');


if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
     
    if (verifie($email) AND verifie($password)) {
        $req = $db->prepare("SELECT * FROM tshajj_agentcomptoire WHERE email = ? and password = ?");
        $req->execute(array($email, $password));
        $userexist = $req->rowcount();
        if ($userexist == 1) {

            $userinfo = $req ->fetch();
           
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['user_type'] = $userinfo['user_type'];

            if( $_SESSION['user_type']== 'agent comptoir'){

              header('location:public/pages/liste_pelerin.php');
            } elseif($_SESSION['user_type']== 'admin' or 'Admin'){
              header('location:public/pages/utilisateur.php');
            }
            
            
            //header('location:public/pages/home.php');
          
        }else {
          $erreur = "votre mot de passe ou email est incorrect";
        }
    }else {
      $erreur="remplissez tous les champs svp";
    }
}