<!-- 
Author : Leclercq Tom & Brunel Bastien
File : connectUser.php
Date : 18/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows to connect a user to his profile.
 -->

<?php
include("logDatabase.php");

session_start();
// If the user clicked on the button (isset($_POST['submit']) = True)
if(isset($_POST['submit']))
{
    $erreur = "";
    $emailconnect = htmlspecialchars($_POST['mail']); // Retrieve the mail from the input
    $pwconnect = $_POST['password']; // Retrieve the password from the input
    // If the both input are not empty
    if(!empty($emailconnect) AND !empty($pwconnect))
    {
        $requser = $pdo->prepare("SELECT * FROM persons WHERE address = ?");
        $requser-> execute(array($emailconnect));
        $userexist = $requser->rowCount();
        // If user exit in the database
        if($userexist == 1)
        {
            // I retrieve user information
            $userinfo = $requser->fetch();
            // If it's the good password
            if(password_verify($pwconnect, $userinfo['passwd']))
            {
                // join information to the session
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['nom'] = $userinfo['lastname'];
                $_SESSION['prenom'] = $userinfo['firstname'];
                $_SESSION['nomComplet'] = $userinfo['lastname'] . " ". $userinfo['firstname'];
                header('Location: /MiniProjet/starter_1/');
            }
            else
            {
                header('Location: login?erreur=1');
               
            }
        }
        else
        {
            header('Location: login?erreur=2');
            
            
        }
    }
    else
    {
        header('Location: login?erreur=3');
       
    }

}

?>