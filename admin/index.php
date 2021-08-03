
<?php
//declare(strict_types= 1);


session_name ("login");
session_start();

require 'database.php';
include_once __DIR__ . "/functions.php";



$erreur = false;


$login = " ";

if(isset($_POST) && !empty($_POST)) {

    $login = validateForm($_POST["login"]);
    $password = trim($_POST["password"]) ;

    if(strpos($login, "&gt;") > 0) {
        header("location: honney.php");
    }

    $admin = signIn($login, $password);

    if (!empty($admin)) {
        if ($admin["id"] > 0) {
            $_SESSION["login"] = $admin["login"];
            header("Location: index1.php");
        } else {
            $erreur = true;
        }
    } else {
        $erreur = true;
    }

}

?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
            <link rel="stylesheet" href="../css/style.css">
            <title>Admin Burger-Code</title>
        </head>
        <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
                <a class="navbar-brand" href="#">Web-productions</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Retour Accueil</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--====== Formulaire de contact ========-->
            <section id="cover1" class="min-vh-100">
                <div id="cover-caption1">
                    <div class="container">
                        <div class="row text-white">
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                                <h1 class="display-4 py-2 text-truncate text-white">Administration</h1>
                                <div class="px-2">
                                    <form action="" id="form" method="post" class="justify-content-center">
                                        <div class="form-group">
                                            <label class="sr-only">Email</label>
                                            <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only">Mot de passe</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="****">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg">Soumettre</button>

                                        <?php if($erreur){ ?>
                                            <div class="alert alert-danger">
                                                <h6 class="alert-title">Erreur</h6>
                                                <p>Impossible de vous connecter</p>
                                                <hr>
                                                <pre>Veuillez vérifier vos saisies</pre>
                                            </div>

                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <footer class="page-footer bg-dark text-white  font-small blue">
                <div class="container">
                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href="https://web-concept-site.fr/">Web-Concept-site</a>
                    </div>
                    <!-- Copyright -->
                    <!-- Social buttons -->
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-li mx-1">
                                <a href="https://www.linkedin.com/in/laurent-allegre-72225a93/"><i class="fab fa-linkedin-in"> </i></a>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-github mx-1">
                                <a href="https://github.com/laurent-allegre"><i class="fab fa-github"> </i></a>
                            </a>
                        </li>
                    </ul>
                    <!-- Social buttons -->
            </footer>
            <!-- Footer -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="../assets/js/app.js"></script>
        </body>
    </html>