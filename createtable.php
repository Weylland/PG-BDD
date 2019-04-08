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
           $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $codesql = "CREATE TABLE Visiteurs(
               id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
               nom VARCHAR(255),
               prenom VARCHAR(255),
               email VARCHAR(255)
           )";
           $connexion->exec($codesql);
           echo 'Table "Visiteurs" créée';
        }
        catch(PDOException $e){
            echo 'Echec de la connection : ' . $e->getMessage();
        }
    ?>
</body>
</html>