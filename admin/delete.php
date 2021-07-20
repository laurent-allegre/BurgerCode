<?php
     require 'database.php';

     if(!empty($_GET['id']))
     {
         $id = CheckInput($_GET['id']);
     }

     if(!empty($_POST))
     {
        $id = CheckInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
     }

     

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
                <h1>Supprimer un Item:</h1><br>
                        <form class="form" role="form" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                          
                       
                            <div class="form-actions">
                                <button type="submit" class="btn btn-danger"><span class="fas fa-trash-alt"> Supprimer</span></button>
                                <a href="index.php" type="button"class="btn btn-primary"><span class="fas fa-arrow-left"> Non</span></a>
                            </div>
                        </form>    
                    
                </div>
            </div>        
    
    




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

</html>                    