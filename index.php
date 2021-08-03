
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="css/style.css">
<title>Impérials Burger Code</title>
</head>
<body>
    <div class="container site">
        <h1 class="text-logo"><span class="fas fa-utensils "></span> Burger Code <a href="./admin/login.php"><span class="fas fa-utensils"></span></a> </h1>
        

        <?php
        require 'admin/database.php';
        //================================================   BARRE DES MENUS  ================================//
            echo '
                <nav>
                 <ul class="nav nav-pills">';

            $db = Database::connect();
            $statement = $db->query('SELECT * From categories');
            $categories = $statement->fetchAll();
            foreach($categories as $categorie)
            {
                if($categorie['id'] == '1')
                {
                    echo '<li role="presentation" class="nav-item">
                            <a <a href="#'. $categorie['id'] . '" data-toggle="tab" class="nav-link active">' . $categorie['name'] .'</a> 
                        </li>';
                }
                else 
                {
                    echo '<li role="presentation" class="nav-item">
                            <a class="nav-link"  data-toggle="tab"  href="#' . $categorie['id'] .'">' . $categorie['name'] .'</a> 
                        </li>';
                }
            }
            echo '</ul>
                </nav>'; 
        //================================================  FIN DU MENU ===============================================// 
            echo '<div class="tab-content">';
                    foreach($categories as $categorie)
                    {
                    
                        if($categorie['id'] == '1') 
                            echo '<div class="tab-pane active" id="'. $categorie['id'] . '">';
                        
                        else 
                            echo '<div class="tab-pane" id="' .$categorie['id']. '">';
                        

                        echo ' <div class="row">';

                        $dbco = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                        $dbco->execute(array($categorie['id']));

                        while($item = $dbco->fetch())
                       
                        {
                            echo ' <div class="col-sm-6 col-md-4">
                                        <div class="card">
                                            <img src="images/'. $item['image'] .'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="price">'. number_format($item['price'], 2, '.', '') .' €</p>  
                                                <h5 class="card-title">'. $item['name'] .'</h5>
                                                <p class="card-text">' . $item['description'] .'</p>
                                                <a href="#" type="button"class="btn_commande"><span class="fas fa-cart-plus"></span>Commander</a>
                                                
                                            </div>
                                        </div>
                                    </div>';
                        }
                        echo '</div>
                        </div>';

                    }
                    Database::disconnect();
            echo '</div>';
        ?>
    </div>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>