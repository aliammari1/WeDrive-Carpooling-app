<link rel="stylesheet" href="style.css">

<?php
$pdo = new PDO("mysql:host=localhost;dbname=projet;charset=utf8","root","");

$post = isset($_GET['id']) ? $_GET['id'] : null;

include '../config/config.php';

if (isset($_POST['post_comment'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $post = $_GET['id'];

    $sql = "INSERT INTO commentaires (name, message, post_id) VALUES (:name, :message, :post)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'message' => $message, 'post' => $post]);

    if ($stmt->rowCount() > 0) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->errorInfo();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>
<body>

    <div class="wrapper">
    <h2>Ajouter un commentaire</h2>
        <form action="" method="post" class="form">
            <input type="text" class="name" name="name" placeholder="Name">
            <br>
            <textarea name="message" cols="30" rows="10" class="message" placeholder="Message"></textarea>
            <br>
            <button type="submit" class="btn" name="post_comment">Post Comment</button>
        </form>
    </div>

    <div class="content">
        <?php

        $post = isset($_GET['id']) ? $_GET['id'] : null;

        $sql = "SELECT * FROM commentaires where post_id=:post";    
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['post' => $post]);

        if ($stmt->rowCount() > 0) {


              $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

              foreach ($comments as $comment) {
        ?>
        
        <h3><?php echo $comment['name']; ?></h3>
        <p id="message"><?php echo $comment['message']; ?></p>

        <?php } } ?>
    </div>
</body>
</html>
