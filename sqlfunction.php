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
           
            // Aggregate functions

            // $foncsqlAvg = "
            //     SELECT AVG(age) FROM inscrits
            // ";

            // $foncsqlCount = "
            //     SELECT COUNT(*) FROM inscrits
            // ";

            // $foncsqlMax = "
            //     SELECT MAX(age) FROM inscrits
            // ";

            // $foncsqlMin = "
            //     SELECT min(age) FROM inscrits
            // ";

            // $foncsqlSum = "
            //     SELECT SUM(age) FROM inscrits
            // ";

            // scalar function sql

            // $foncsqlUcase = "
            //     SELECT UCASE(prenom) FROM inscrits
            // ";

            // $foncsqlLcase = "
            //     SELECT LCASE(prenom) FROM inscrits
            // ";

            // // LENGTH = Octet
            // $foncsqlLength = "
            //     SELECT LENGTH(prenom) FROM inscrits
            // ";

            // $foncsqlRound = "
            //     SELECT ROUND(dons, 1) FROM inscrits
            // ";

            // $foncsqlNow = "
            //     SELECT prenom, NOW() FROM inscrits
            // ";

            // WHERE doesn't work after GROUP BY we must use HAVING
            $foncsqlGroupby = "
                SELECT AVG(dons), age FROM inscrits GROUP BY age HAVING AVG(dons) > 4
            ";
            $foncsqlGroupby2 = "
                SELECT AVG(dons), age FROM inscrits WHERE prenom!='Pierre' GROUP BY age 
            ";

            $requete = $connexion->prepare($foncsqlGroupby);
            $requete->execute();

            $resultat = $requete->fetchAll();
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