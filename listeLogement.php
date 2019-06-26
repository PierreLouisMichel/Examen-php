<?php require 'database.php';
//RECUPERATION DES DONNEES
$request = 'SELECT * FROM logement';
$response = $bdd->query($request);
$posts = $response->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Liste Logements</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <a href="ajoutLogement.php">Ajout Logement</a>
                <table class="table">
                    <tr> <!--Titre des colonnes -->
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Adresse Vendeur</th>
                        <th>Ville Vendeur</th>
                        <th>Code Postal</th>
                        <th>Surface
                        <th>Prix</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                    <?php
                    //AFFICHAGE DES DONNEES
                    foreach ($posts as $immo) 
                    {
                        echo "
                        <tr>
                            <td>" . $immo['id_logement'] . "</td>";
                            if (strlen($immo['titre']) < 50) {
                            echo "<td> " . $immo['titre'] . " </td >"; // Affichage du titre complet si il fait moins de 50 charactères.
                            } 
                            else {
                            echo "<td>" . substr($immo['titre'], 0, 50) . " ... </td >"; // Affichage des 50 premiers charactères suivis de ...
                            }

                            if (strlen($immo['adresse']) < 50) {
                            echo "<td> " . $immo['adresse'] . " </td >"; // Affichage de l'adresse complète si elle fait moins de 50 charactères.
                            } 
                            else {
                            echo "<td>" . substr($immo['adresse'], 0, 50) . " ... </td >"; // Affichage des 50 premiers charactères suivis de ...
                            }

                            if (strlen($immo['ville']) < 50) {
                            echo "<td> " . $immo['ville'] . " </td >"; // Affichage du nom de la ville si il fait moins de 50 charactères.
                            } 
                            else {
                            echo "<td>" . substr($immo['ville'], 0, 50) . " ... </td >"; // Affichage des 50 premiers charactères suivis de ...
                            }
                            echo"
                            <td>" . $immo['cp'] . "</td>
                            <td>" . $immo['surface'] . "</td>
                            <td>" . $immo['prix'] . " €</td>
                            <td><img class='liste' src='uploads/" . $immo['photo'] . "' alt='" . $immo['photo'] . "'></td>
                            <td>" . $immo['type'] . "</td>
                            ";
                        if (strlen($immo['description']) < 150) 
                        {
                            echo "<td> " . $immo['description'] . " </td >"; // Affichage de la description complète si elle fait moins de 150 charactères.
                        } else {
                            echo "<td>" . substr($immo['description'], 0, 150) . " ... </td >"; // Affichage des 150 premiers charactères suivis de ...
                        }
                        echo "   
                        </tr >";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https: //code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"crossorigin="anonymous">
    </script>
    
</body> 
</html>