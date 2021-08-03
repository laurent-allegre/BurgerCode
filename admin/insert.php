<?php


session_name("login");
session_start();

if(!empty($_SESSION) && isset($_SESSION["login"])) {
?>
<?php
     require 'database.php';

     $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category =$price = "";

     if(!empty($_POST))
     {
         $name        = CheckInput($_POST['name']) ;
         $description = CheckInput($_POST['description']) ;
         $price       = CheckInput($_POST['price']) ;
         $category    = CheckInput($_POST['category']) ;
         $image       = CheckInput($_FILES['image']['name']) ;
         $imagePath   = '../images/' . basename($image);
         $imageExtend  = pathinfo($imagePath, PATHINFO_EXTENSION);
         $isSuccess   = true;
         $isUploadSuccess = false;

         if(empty($name))
         {
            $nameError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
         }
         if(empty($description))
         {
            $descriptionError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
         }
         if(empty($price))
         {
            $priceError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
         }
         if(empty($category))
         {
            $categoryError = "le champ ne peut pas être vide";
            $isSuccess = false;
         }
         if(empty($image))
         {
            $imageError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
         }
         else
         {
             $isUploadSuccess = true;
             if($imageExtend != 'jpg' && $imageExtend != 'png' && $imageExtend != 'jpeg' && $imageExtend != 'gif')
             {
                 $imageError = "Les fichiers autorisés sont : .jpg, .png, .jpeg, .gif";
                 $isUploadSuccess = false;
             }
             if(file_exists($imagePath))
             {
                $imageError = "le fichier existe déjà";
                $isUploadSuccess = false;
             }
             if($_FILES['image']['size'] > 500000)
             {
                $imageError = "le fichier ne doit pas dépasser les 500KB";
                $isUploadSuccess = false;
             }
             if($isUploadSuccess)
             {
                 if(!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath))
                 {
                    $imageError = "Il y a eu une erreur lors de l'upload ";
                    $isUploadSuccess = false;
                 }
             }
         }
            if($isSuccess && $isUploadSuccess)
            {
                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
                $statement->execute(array($name,$description,$price,$category,$image));
                Database::disconnect();
                header('Location: index.php');
            }
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
                    <h1>Ajouter un Items :</h1><br>
                        <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $name; ?>">
                                <span class="help-inline"><?= $nameError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="description">Decription:</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Déscription" value="<?= $description; ?>" >
                                <span class="help-inline"><?= $descriptionError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Prix (en €):</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= $price; ?>">
                                <span class="help-inline"><?= $priceError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="category">Catégorie:</label>
                                <select name="category" id="category" class="form-control">
                                    <?php
                                        $db = Database ::connect();
                                        foreach($db->query('SELECT * FROM categories') as $row)
                                        {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';                                     
                                        }
                                        Database::disconnect();
                                    ?>

                                </select>
                                <span class="help-inline"><?= $categoryError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="image">Sélectionner une image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <span class="help-inline"><?= $imageError; ?></span>
                            </div>
                        
                       
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><span class="fas fa-pencil-alt"> Ajouter</span></button>
                                <a href="index.php" type="button"class="btn btn-primary"><span class="fas fa-arrow-left"> Retour</span></a>
                            </div>
                        </form>    
                    </div>
                </div>        

            


<!-- SI ON EST PAS CONNECTER ON AFFICHE LA PAGE D'ACCUEIL -->
<?php } else {
    header("location: ../index.php");
} ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

</html>            