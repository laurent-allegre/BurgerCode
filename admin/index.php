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
                    <h2><strong>Liste des Items :</strong><a href="#" type="button"class="btn btn-success btn-sm ml-3"><span class="fas fa-plus"></span> Ajouter</a></h2>
                
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Noms</th>
                                <th>Descriptions</th>
                                <th>Prix</th>
                                <th>Catégories</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require 'database.php';
                                $db = Database::connect();
                                $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id
                                                         ORDER BY items.id DESC');
                                while($item = $statement->fetch())
                                {
                                echo '<tr>';
                                  echo '<td>' . $item['name'] . '</td>'; 
                                  echo '<td>' . $item['description'] . '</td>'; 
                                  echo '<td>' . $item['price'] . '0 €</td>'; 
                                  echo '<td>' . $item['category'] . '</td>'; 

                                  echo '<td class="action">';
                                  echo '<a type="button"class="btn btn-outline-secondary btn-sm" href="view.php?id=' . $item['id'] .'"><span class="fas fa-eye"></span>  voir</a>';
                                  echo ' ';
                                  echo '<a type="button"class="btn btn-primary btn-sm" href="view.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Modifier</a>';
                                  echo ' ';
                                  echo '<a type="button"class="btn btn-danger btn-sm" href="view.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Supprimer</a>';
                                  
                                  echo '</td>';     
                                echo '</tr>';    

                                }
                            ?>
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
    

        
        



























        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

</html>