
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
        <h1 class="text-logo"><span class="fas fa-utensils "></span> Burger Code <span class="fas fa-utensils"></span></h1>
        

        <?php
        require 'admin/database.php';
        //================================================   BARRE DES MENUS  ================================//
            echo '
                <nav>
                 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';

            $db = Database::connect();
            $statement = $db->query('SELECT * From categories');
            $categories = $statement->fetchAll();
            foreach($categories as $categorie)
            {
                if($categorie['id'] == '1')
                {
                    echo '<li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#'. $categorie['id'] . '" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                         </li>';
                }
                else 
                {
                    echo '<li  class="nav-item">
                             <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#'. $categorie['id'] . '" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a> 
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
                        {
                            echo '<div class="tab-pane active" id="'. $categorie['id'] . '">';
                        }
                        else
                        { 
                            echo '<div class="tab-pane" id="' .$categorie['id']. '">';
                           echo '<div class="tab-pane fade" id="' .$categorie['id']. '" role="tabpanel" aria-labelledby="'. $categorie['id'] . '">... YO MAN</div>' ;
                        }

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
             <?php 
             echo '     
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#'. $categorie['id'] . '" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">COUCOU</div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">..yoyoy.</div>
                    </div>';

            ?>          
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>