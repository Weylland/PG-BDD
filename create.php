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
           $connexion = new PDO("mysql:host=$serveur", $login, $pass); 
           $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $connexion -> exec("CREATE DATABASE test2");

           echo 'BDD créée';
        }
        catch(PDOException $e){
            echo 'Echec de la connection : ' . $e->getMessage();
        }
        
    ?>
</body>
</html>