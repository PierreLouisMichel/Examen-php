<?php require 'database.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <title>Ajout Logement</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <a href='ListeLogement.php'>liste des Logements</a>
    <div class='form col-12'>
        <fieldset>
            <form action="ajoutLogement.php" method="post" enctype="multipart/form-data">
                <input type='text' placeholder='Titre' name='titre'><br />
                <input type='text' placeholder='Adresse' name='adr'><br />
                <input type='text' placeholder='Ville' name='ville'><br />
                <input type='text' placeholder='Code Postal' name='cp'><br />
                <input type='text' placeholder='Surface' name='surface'><br />
                <input type='int' placeholder='Prix' name='prix'><br />
                <input type="file" name="photo"><br />
                <input type='text' placeholder='Type' name='type'><br />
                <input type='text' placeholder='Description' name='desc'><br />
                <input type="submit" value="Ajouter" name="valid">
            </form>
        </fieldset>
    </div>
    <?php

    if (isset($_POST['valid'])) {

        if (!isset($_POST['titre'])) {
            throw new Exception('Le champ titre est vide.');
        }

        if (strlen($_POST['titre']) > 150) {
            throw new Exception('Le champ titre est trop long.');
        }

        if (!isset($_POST['adr'])) {
            throw new Exception('Le champ adresse est vide.');
        }

        if (strlen($_POST['adr']) > 255) {
            throw new Exception('Le champ adresse est trop long.');
        }

        if (!isset($_POST['ville'])) {
            throw new Exception('Le champ ville est vide.');
        }

        if (strlen($_POST['ville']) > 150) {
            throw new Exception('Le champ ville est trop long.');
        }

        if (!isset($_POST['cp'])) {
            throw new Exception('Le champ cp est vide.');
        }

        if ($_POST['cp'] < 1000) {
            throw new Exception('Le champ cp est incorrect (< 1 000).');
        }

        if ($_POST['cp'] > 100000) {
            throw new Exception('Le champ cp est incorrect (> 100 000).');
        }

        if (!isset($_POST['prix'])) {
            throw new Exception('Le champ prix est vide.');
        }

        if (!is_numeric($_POST['prix'])) {
            throw new Exception('Le champ prix est au mauvais format.');
        }

        if (strpos($_POST['prix'], ',')) {
            throw new Exception('Le champ prix contient une virgule.');
        }

        if (strpos($_POST['prix'], '.')) {
            throw new Exception('Le champ prix contient un point.');
        }

        if (!isset($_FILES['photo'])) {
            throw new Exception('Le champ photo est vide.');
        }

        if (!isset($_POST['type'])) {
            throw new Exception('Le champ type est vide');
        }

        if (isset($_FILES['photo']) and $_FILES['photo']['error'] == 0) 
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo']['size'] <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) 
                {
                    //  On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . basename($_FILES['photo']['name']));
                    echo "L'envoi a bien été effectué !";
                }
                else
                {
                    throw new Exception('Le champ photo est incorrect');
                }
            }
        }

        $request = "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description) 
                    VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type, :desc)";

        $response = $bdd->prepare($request);
        $response->execute([
            'titre'             => $_POST['titre'],
            'adresse'           => $_POST['adr'],
            'ville'             => $_POST['ville'],
            'cp'                => $_POST['cp'],
            'surface'           => $_POST['surface'],
            'prix'              => $_POST['prix'],
            'type'              => $_POST['type'],
            'desc'              => $_POST['desc'],
            'photo'             => $_FILES['photo']['name']
        ]);
        echo "ajout éffectué";
        var_dump($response);
        echo "C'est Franchement très sympa !"
    }
    else
    {
        echo "C'est pas franchement sympa !";
    }





    ?>

    <!--Optional JavaScript -->
    <!--jQuery first, then Po p per.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous ">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>