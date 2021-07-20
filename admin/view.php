<?php
    require 'database.php';

    if(!empty($_GET['id'])) {

    $id = checkInput($_GET['id']);  
    }

    $db = Database::connect();
    $statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category 
                               FROM items LEFT JOIN categories ON items.category = categories.id
                               WHERE items.id = ?');
    $statement->execute(array($id));   
    $item = $statement->fetch();
    Database::disconnect();                        


function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Impérials Burger Code</title>
    </head>

    <body>

    <h1 class="text-logo site"><span class="fas fa-utensils "></span> Burger Code <span class="fas fa-utensils"></span></h1>
            <div class="container admin">
                <div class="row table-responsive">

                   <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title">Voir un Items :</h5>
                                        <p class="card-text"><strong>Nom: </strong> <?= ' ' . $item['name']; ?></p>
                                        <p class="card-text"><strong>Description: </strong> <?= ' ' . $item['description']; ?></p>
                                        <p class="card-text"><strong>Prix: </strong> <?= ' ' . number_format((float) $item['price'],2,'.','') . ' €'; ?></p>
                                        <p class="card-text"><strong>Catégories: </strong> <?= ' ' . $item['category']; ?></p>
                                        <p class="card-text"><strong>Image: </strong> <?= ' ' . $item['image']; ?></p>
                                        <a href="index.php" type="button"class="btn btn-success btn-sm"><span class="fas fa-arrow-left"></span> Retour</a>
                                    </div>
                                    <div class="col-sm-6 site">
                                        <img class="img-fluid" src="<?= '../images/' . $item['image']; ?>" alt="sans" >
                                        <p class="price"><?= number_format((float) $item['price'],2,'.',''). ' €'; ?></p> 
                                        <h5 class="card-title"><?= $item['name']; ?></h5>
                                        <p ><?= $item['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>        
    
    




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

</html>