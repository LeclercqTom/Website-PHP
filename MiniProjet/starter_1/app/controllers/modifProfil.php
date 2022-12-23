<!-- 
Author : Leclercq Tom & Brunel Bastien
File : modifProfil.php
Date : 21/12/2022
© 2022 Leclercq Tom

This file allows to retrieve all informations of the current session for the profil view.
-->
<?php
session_start();

include("logDatabase.php");
// If there is a connected user
if (isset($_POST['submit'])) {
   // I get all his information
   $requser = $pdo->prepare("SELECT * FROM persons WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   // I get all his complementaries information
   $reqInfo = $pdo->prepare("SELECT * FROM info_complementaires_clients WHERE id = ?");
   $reqInfo->execute(array($_SESSION['id']));
   $infoUser = $reqInfo->fetch();

   // NAME
   if (isset($_POST['lastName']) and !empty($_POST['lastName'])) {
      $lastName = htmlspecialchars($_POST['lastName']);
      $insertLastName = $pdo->prepare("UPDATE persons SET lastname = ? WHERE id = ?");
      $insertLastName->execute(array($lastName, $_SESSION['id']));
      // FIRSTNAME
      if (isset($_POST['firstName'])and !empty($_POST['firstName'])) {
         $firstName = htmlspecialchars($_POST['firstName']);
         $insertFirstName = $pdo->prepare("UPDATE persons SET firstname = ? WHERE id = ?");
         $insertFirstName->execute(array($firstName, $_SESSION['id']));
         // EMAIL
         if (isset($_POST['newEmail']) and !empty($_POST['newEmail'])) {
            $newEmail = htmlspecialchars($_POST['newEmail']);
            $insertEmail = $pdo->prepare("UPDATE persons SET address = ? WHERE id = ?");
            $insertEmail->execute(array($newEmail, $_SESSION['id']));
            // WORK
            if (isset($_POST['newWork'])) {
               $newWork = htmlspecialchars($_POST['newWork']);
               $insertWork = $pdo->prepare("UPDATE info_complementaires_clients SET profession = ? WHERE id = ?");
               $insertWork->execute(array($newWork, $_SESSION['id']));
               // ADDRESS
               if (isset($_POST['adresse'])) {
                  $adresse = htmlspecialchars($_POST['adresse']);
                  $insertAdresse = $pdo->prepare("UPDATE info_complementaires_clients SET adresse = ? WHERE id = ?");
                  $insertAdresse->execute(array($adresse, $_SESSION['id']));
                  // PHONE
                  if (isset($_POST['phone'])) {
                     $phone = htmlspecialchars($_POST['phone']);
                     $insertPhone = $pdo->prepare('UPDATE info_complementaires_clients SET "numeroTelephone" = ? WHERE id = ?');
                     $insertPhone->execute(array($phone, $_SESSION['id']));
                     // PHONEF
                     if (isset($_POST['phoneF'])) {
                        $phoneF = htmlspecialchars($_POST['phoneF']);
                        $insertPhoneF = $pdo->prepare('UPDATE info_complementaires_clients SET "numeroFixe" = ? WHERE id = ?');
                        $insertPhoneF->execute(array($phoneF, $_SESSION['id']));
                        // WEBSITE
                        if (isset($_POST['website'])) {
                           $website = htmlspecialchars($_POST['website']);
                           $insertWebsite = $pdo->prepare('UPDATE info_complementaires_clients SET "nomSiteWeb" = ? WHERE id = ?');
                           $insertWebsite->execute(array($website, $_SESSION['id']));
                           // GITHUB
                           if (isset($_POST['github'])) {
                              $github = htmlspecialchars($_POST['github']);
                              $insertGithub = $pdo->prepare('UPDATE info_complementaires_clients SET "Github" = ? WHERE id = ?');
                              $insertGithub->execute(array($github, $_SESSION['id']));
                              // TWITTER
                              if (isset($_POST['twitter'])) {
                                 $twitter = htmlspecialchars($_POST['twitter']);
                                 $insertTwitter = $pdo->prepare('UPDATE info_complementaires_clients SET "Twitter" = ? WHERE id = ?');
                                 $insertTwitter->execute(array($twitter, $_SESSION['id']));
                                 // INSTAGRAM
                                 if (isset($_POST['instagram'])) {
                                    $instagram = htmlspecialchars($_POST['instagram']);
                                    $insertInstagram = $pdo->prepare('UPDATE info_complementaires_clients SET "Instagram" = ? WHERE id = ?');
                                    $insertInstagram->execute(array($instagram, $_SESSION['id']));
                                    // FACEBOOK
                                    if (isset($_POST['facebook'])) {
                                       $facebook = htmlspecialchars($_POST['facebook']);
                                       $insertFacebook = $pdo->prepare('UPDATE info_complementaires_clients SET "Facebook" = ? WHERE id = ?');
                                       $insertFacebook->execute(array($facebook, $_SESSION['id']));
                                       // PASSWORD
                                       if (isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2'])) {
                                          $mdp1 = $_POST['newmdp1'];
                                          $mdp2 = $_POST['newmdp2'];
                                          if ($mdp1 == $mdp2) {
                                             $options = [
                                                'cost' => 12,
                                             ];
                                             $hashpass =  password_hash($mdp1, PASSWORD_DEFAULT, $options);
                                             $insertmdp = $pdo->prepare("UPDATE persons SET passwd = ? WHERE id = ?");
                                             $insertmdp->execute(array($hashpass, $_SESSION['id']));
                                             header('Location: profil?id=' . $_SESSION['id']);
                                          } else {
                                             $message = "Vos password ne correspondent pas.";
                                          }
                                       }
                                    }
                                 }
                              }
                           }
                        }
                     }
                  }
               }
            }
         }
         else{
            header('Location: editProfil?erreur=3');
         }
      }
      else{
         header('Location: editProfil?erreur=2');
      }
   }
   else{
      header('Location: editProfil?erreur=1');
   }
}
header('Location: profil?id=' . $_SESSION['id']);
?>