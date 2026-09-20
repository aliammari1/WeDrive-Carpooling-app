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
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    //requête pour afficher les infos d'un avis (creds from .env, parameterized)
    $con = mysqli_connect(
        getenv('DB_HOST') ?: '127.0.0.1',
        getenv('DB_USER') ?: 'root',
        getenv('DB_PASSWORD') ?: '',
        getenv('DB_NAME') ?: 'wedrive'
    );
    $stmt = mysqli_prepare($con, "SELECT * FROM avis WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));


    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verifier que tous les champs ont été remplis
        if (isset($idreponse)  && isset($vision) && isset($comment) && $notepro) {
            //requête de modification (parameterized to prevent SQL injection)
            $ins = mysqli_prepare($con, "INSERT INTO reponse VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($ins, 'ssss', $idreponse, $vision, $comment, $notepro);
            $req = mysqli_stmt_execute($ins);
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