<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeDrive</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    //connexion à la base de donnée
    require_once '../config/config.php';
    //on récupère le id dans le lien
    $id = $_GET['id'];
    //requête pour afficher les infos d'un employé
    $con = mysqli_connect("localhost", "root", "", "projet");
    $req = mysqli_query($con, "SELECT * FROM avis WHERE id = $id");
    $row = mysqli_fetch_assoc($req);


    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verifier que tous les champs ont été remplis
        if (isset($idreponse)  && isset($vision) && isset($comment) && $notepro) {
            //requête de modification
            $con = mysqli_connect("localhost", "root", "", "projet");
            $req = mysqli_query($con, "INSERT INTO reponse VALUES('$idreponse', '$vision','$comment','$notepro')");
            if ($req) { //si la requête a été effectuée avec succès , on fait une redirection
                header("location: listreponse.php");
            } else { //si non
                $message = "Employé non modifié";
            }
        } else {
            //si non
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>

    <div class="form">
        <a href="listClient.php" class="back_btn"><img src="images/back.png"> Retour</a>

        <h2>Modifier l'avis : <?= $row['vision'] ?> </h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>id</label>
            <input type="text" name="idreponse" value="<?= $row['idreponse'] ?>">
            <label>commentaire</label>
            <input type="text" name="id" value="<?= $row['id'] ?>">
            <label>type</label>
            <input type="text" name="vision" value="<?= $row['vision'] ?>">
            <label>note</label>
            <input type="addresse" name="comment" value="<?= $row['comment'] ?>">
            <label>dob</label>
            <input type="date" name="notepro" value="<?= $row['notepro'] ?>">

            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>