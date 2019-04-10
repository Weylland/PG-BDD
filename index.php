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
           $connexion = new PDO("mysql:host=$serveur;dbname=test", $login, $pass); 
           $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           echo 'Connection BDD réussie';
        }
        catch(PDOException $e){
            echo 'Echec de la connection : ' . $e->getMessage();
        }
    ?>
</body>
</html>