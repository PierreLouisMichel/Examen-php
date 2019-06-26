<?php require 'database.php';
//EXERCICE 2
$request = 'SELECT * FROM logement';
$response = $bdd->query($request);
$ecommerce = $response->fetchAll(PDO::FETCH_ASSOC);
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
                    <tr>
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
                    foreach ($ecommerce as $produit) {
                        echo "
                    <tr>
                        <td>" . $produit['id_logement'] . "</td>
                        <td>" . $produit['titre'] . "</td>
                        <td>" . $produit['adresse'] . "</td>
                        <td>" . $produit['ville'] . "</td>
                        <td>" . $produit['cp'] . "</td>
                        <td>" . $produit['surface'] . "</td>
                        <td>" . $produit['prix'] . " €</td>
                        <td><img class='liste' src='" . $produit['photo'] . "' alt='" . $produit['photo'] . "'></td>
                        <td>" . $produit['type'] . "</td>
                        <td>" . $produit['description'] . "</td>
                    </tr> 
                    ";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>