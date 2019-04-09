<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PG-BDD</title>
</head>
<body>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "";
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=test2", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $connexion->prepare("
            INSERT INTO visiteurs(nom, prenom, email)
            VALUES (:nom, :prenom, :email)
        ");

        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':email', $email);

        $nom = "Dupon";
        $prenom = "pierre";
        $email = "dupond@mail.com";

        $requete->execute();

        echo 'Insertion réussie';
    }
    catch(PDOException $e) {
        echo 'Echec : ' .$e->getMessage();
    }
    ?>
</body>
</html>