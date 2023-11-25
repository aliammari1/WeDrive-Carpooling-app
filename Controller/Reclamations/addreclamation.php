<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once __DIR__ . '\..\View\vendor\autoload.php';
require_once realpath(dirname(__FILE__)) . "/../../Model/Reclamations/reclamations.php";
require_once realpath(dirname(__FILE__)) . "/../../Model/Reclamations/reclamation.php";

function mailing()
{


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hind.khayti@esprit.tn';                     //SMTP username
        $mail->Password   = 'bcbvhfkhwgyxaphp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('hind.khayti@esprit.tn', 'Mailer');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress('khayatihind20@gmail.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['nom'];
        $mail->Body    = $_POST['description'];
        $mail->AltBody = $_POST['description'];

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $piecesJointes = $_FILES['pieces_jointes']['size'] !== 0 ? file_get_contents($_FILES['pieces_jointes']['tmp_name']) : '';
        $date = isset($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : '';
        $sendMail = isset($_POST['sendMail']) && $_POST['sendMail'] === 'on' ? $_POST['sendMail'] : null;
        $id_rec = null;
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
        if (isset($sendMail)) {
            mailing();
        }
        $reclamation = new Reclamation($id_rec, $date, $nom, $description, $piecesJointes);
        $reclamations = new Reclamations();
        $reclamations->addReclamation($reclamation);
        header('Location: http://localhost/View/pages/back/consulterRecGest.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
