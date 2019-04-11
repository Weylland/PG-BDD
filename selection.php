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

            $sql1 = "
                SELECT prenom FROM inscrits WHERE age<60 ORDER BY age LIMIT 0,2
            ";

            $requete = $connexion->prepare($sql1);
            $requete->execute();

            $resultat = $requete->fetchall();

            echo '<pre>';
            print_r($resultat);
            echo '</pre>';
        }
        catch(PDOException $e){
            echo 'Echec de la connection : ' . $e->getMessage();
        }
        
    ?>
</body>
</html>