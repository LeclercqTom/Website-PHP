<!-- 
Author : Leclercq Tom & Brunel Bastien
File : createUser.php
Date : 18/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows to create a new user.
 -->

<?php
include("logDatabase.php");

// --------- For MailDev -----------
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// ---------------------------------

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
                if ($mdp == $mdp2)
                // I encrypt the password
                {
                    if (strlen($mdp) >= 8) {
                        $options = [
                            'cost' => 12,
                        ];

                        $hashpass =  password_hash($mdp, PASSWORD_DEFAULT, $options);
                        // I add all information of this user in the database
                        $insertmbr = $pdo->prepare("INSERT INTO persons(lastname, firstname, address,passwd) VALUES(?,?,?,?)");
                        $insertmbr->execute(array($nom, $prenom, $mail, $hashpass));
                        $recupInfo = $pdo->prepare("SELECT id from persons where address = ?");
                        $recupInfo->execute(array($mail));
                        $recupID = $recupInfo->fetch();

                        // I add a tuple corresponding to the id of the new user in the table "info_complementaires_clients"
                        $insertInfo = $pdo->prepare("INSERT INTO info_complementaires_clients(id) values(?)");
                        $insertInfo->execute(array($recupID['id']));

                        // ------------------------------------------------------------------------------------------------------
                        // If mailDev does not working
                        // header("Location: login");
                        // ------------------------------------------------------------------------------------------------------



                        //---------------------------------------------- MailDev ----------------------------------------------------

                        $destinataire = $mail;

                        $PHPmail = new PHPMailer(true);

                        try {
                            //Server settings

                            $PHPmail->isSMTP();                                            //Send using SMTP
                            $PHPmail->Host = 'localhost';                     //Set the SMTP server to send through

                            $PHPmail->Port = 1025;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                            $PHPmail->setFrom('validation-inscription@iut.com', 'Tom');
                            $PHPmail->addAddress("$mail", "$nom, $prenom");     //Add a recipient



                            //Attachments
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                            //Content
                            $PHPmail->isHTML(true);                                  //Set email format to HTML
                            $PHPmail->Subject = 'Validation de votre mail';
                            $PHPmail->Body    = "<div>Bonjour,<br>
                                                  <br>
                                                  Afin de valider votre inscription, merci de bien vouloir cliquer sur  : 
                                                  <a href=http://localhost:8000/MiniProjet/starter_1/confirmation?user=" . $mail . ">ce lien</a></div>";



                            $PHPmail->send();
                            header('Location: /MiniProjet/starter_1/login');
                            // header("Location: verify.php");
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$PHPmail->ErrorInfo}";
                            header('Location: /MiniProjet/starter_1/register');
                        }

                        // ----------------------------------------------------------------------------------------------------------------------

                    } else {
                        header('Location: register?erreur=5');
                    }
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