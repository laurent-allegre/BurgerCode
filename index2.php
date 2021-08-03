<?php
      require 'admin/database.php';    
      $db = Database::connect();               
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
<link rel="stylesheet" href="css/style.css">
<title>Impérials Burger Code</title>
</head>
    
    
    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="fas fa-utensils "></span> Burger Code <span class="fas fa-utensils"></span></h1>
            
            <nav>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#tabs-1" role="tab">First Panel</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Second Panel</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#p3">Snacks</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#p4">Salades</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#p5">Boissons</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#p6">Desserts</a>
                    </li>
                </ul>
            </nav> 

                <div class="tab-content">

                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <?php
                            $dbco = $db->query('SELECT * FROM items WHERE items.category ')
                        ?>
                        <p>First Panel</p>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <img src="images/m2.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="price">8.9 €</p>  
                                        <h5 class="card-title">'. $item['name'] .'</h5>
                                        <p class="card-text">' . $item['description'] .'</p>
                                        <a href="#" type="button"class="btn_commande"><span class="fas fa-cart-plus"></span>Commander</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <p>Second Panel</p>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <img src="images/bo2.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="price">8.9 €</p>  
                                        <h5 class="card-title">'. $item['name'] .'</h5>
                                        <p class="card-text">' . $item['description'] .'</p>
                                        <a href="#" type="button"class="btn_commande"><span class="fas fa-cart-plus"></span>Commander</a>
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

