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
           $connexion = new PDO("mysql:host=$serveur;dbname=test2;charset=utf8", $login, $pass); 
           $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            /*
            $inner_join = "
                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                INNER JOIN commentaires AS com
                ON ins.id = com.id_inscrit
                WHERE ins.prenom = 'Pierre'
            ";
            */
            /*
            $left_join = "
                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                LEFT JOIN commentaires AS com
                ON ins.id = com.id_inscrit
            ";
            */
            /*
            $right_join = "
                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                RIGHT JOIN commentaires AS com
                ON ins.id = com.id_inscrit
            ";
            */
            /*
            /*FULL OUTER JOIN does not work with mysql*/
            /*
            $full_outer_join = "
                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                FULL OUTER JOIN commentaires AS com
                ON ins.id = com.id_inscrit
            ";
            */
            /* You have to use UNION with Mysql instead of FULL OUTER JOIN */
            $union = "
                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                LEFT JOIN commentaires AS com
                ON ins.id = com.id_inscrit

                UNION ALL

                SELECT ins.prenom, com.commentaire
                FROM inscrits AS ins
                RIGHT JOIN commentaires AS com
                ON ins.id = com.id_inscrit
                WHERE ins.id IS NULL
            ";


            $requete = $connexion->prepare($union);
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