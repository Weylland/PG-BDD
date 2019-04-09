<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PG-BDD-create</title>
</head>
<body>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "";
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=test2", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $suppr = "
            ALTER TABLE visiteurs DROP age;
        ";

        $requete = $connexion->prepare($suppr);
        $requete->execute();
        echo "Informations mises à jour";
    }
    catch(PDOExeption $e) {
        echo 'Erreur : ' . $e;
    }
    ?>
</body>
</html>