<!-- 
Author : Leclercq Tom & Brunel Bastien
File : createUser.php
Date : 18/12/2022
© 2022 Leclercq Tom

This file allows to create a new user.
 -->

<?php
include("logDatabase.php");

if (isset($_POST['submit'])) {

    $nom = htmlspecialchars($_POST['name']); // retrieve the name from the input
    $prenom = htmlspecialchars($_POST['firstname']); // retrieve the firstname from the input
    $mail = htmlspecialchars($_POST['mail']); // retrieve the mail from the input
    $mdp = htmlspecialchars($_POST['password']); // retrieve the password from the input
    $mdp2 = htmlspecialchars($_POST['password2']); // retrieve the confirm password from the input

    // If all input are not empty
    if (!empty($_POST['name']) and !empty($_POST['firstname']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['password2'])) {
        // If the email has a good syntax
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // I'm looking to see if this email doesn't exist in the database
            $reqmail = $pdo->prepare("SELECT * FROM persons WHERE address = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
                // If the both password are equivalent
                if($mdp == $mdp2)
                // I encrypt the password
                    {
                        $options = [
                            'cost' => 12,
                        ];

                        $hashpass =  password_hash($mdp, PASSWORD_DEFAULT, $options);
                        // I add all information of this user in the database
                        $insertmbr = $pdo->prepare("INSERT INTO persons(lastname, firstname, address,passwd) VALUES(?,?,?,?)");
                        $insertmbr->execute(array($nom, $prenom,$mail, $hashpass));
                        $recupInfo = $pdo->prepare("SELECT id from persons where address = ?");
                        $recupInfo->execute(array($mail));
                        $recupID = $recupInfo->fetch();
                        
                        // I add a tuple corresponding to the id of the new user in the table "info_complementaires_clients"
                        $insertInfo = $pdo->prepare("INSERT INTO info_complementaires_clients(id) values(?)");
                        $insertInfo->execute(array($recupID['id']));

                    $destinataire = "bastien.brunel23@orange.fr";

                    $expediteur = "tomleclercq2208@gmail.com";
                    $objet = 'Confirmation création du compte'; // Objet du message
                    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                    $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
                    $headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteur
                    $headers .= 'Deliveroo-To: '.$destinataire."\n"; // Destinataire
                       
                    $message = 'Confirme ton adresse mail.';
                    if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
                    {
                        echo "Votre compte a bien été créé ! ";
                        header('Location: /MiniProjet/starter_1/login');
                        exit();
                        // echo "Votre compte a bien été créé ! <a href=\"login\">Me connecter</a>";
                    }
                    else // Non envoyé
                    {
                        echo "Votre compte n'a pas pu être envoyé";
                        // header('Location: register?erreur=5');
                    }
                    // $header = "MIME-Version: 1.0\r\n";
                    // $header .= 'From:"Start1"<tomleclercq2208@gmail.com>' . "\n";
                    // $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                    // $header .= 'Content-Transfer-Encoding: 8bit';
                    // $message = '
                    //   <html>
                    //      <body>
                    //         <div align="center">
                    //             confirme ton compte !
                    //         </div>
                    //      </body>
                    //   </html>
                    //   ';
                    // //<a href="http://127.0.0.1/Tutos%20PHP/%2314%20%28Espace%20membre%29/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmez votre compte !</a>
                    // mail($mail, "Confirmation de compte", $message, $header);
                } else {
                    header('Location: register?erreur=4');
                }
            } else {
                header('Location: register?erreur=3');
            }
        } else {
            header('Location: register?erreur=2');
        }
    } else {
       
        header('Location: register?erreur=1');
    }
}

?>
