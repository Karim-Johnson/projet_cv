<?php
    include_once 'config/database.php';
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Devéloppeur Web</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include("_navbar.php"); ?>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="rounded-circle" src="karim.png" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">QUI SUIS - JE ?</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Développeur Web: HTML5, CSS3, JAVASCRIPT, PHP</p>
            </div>
        </header>
        <!-- Portfolio Section-->
       
        <?php $reponse = $database->query("SELECT * FROM formation ORDER BY id ASC"); ?>

        <section class="page-section portfolio" id="portfolio">
                <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Mes formations</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Portfolio Grid Items-->
                    <div class="row justify-content-center">
                    <?php 
                        while($row = $reponse->fetch()) {
                            echo'<a href= "crud/formation/detail.php?id='.$row["id"].'" class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/forma.png" alt="" />
                                    <div class= "taille_formation">'.$row["nomFormation"].'</div>
                                </div>';
                        }

                        $reponse->closeCursor();
                    ?>
                    </div>
                </div>
                <div class="boutonAjouter1"> 
            <a class="btn btn-primary" id="bouton-ajouter" href="crud/formation/ajouter.php" style="opacity: <?= isset($_SESSION['email']) ? '1':'0' ?>;">Ajouter une formation</a>
        </div>
        </section>
           <!-- About Section-->
        <section class="page-section bg-primary1 text-white mb-0" id="about">
                <?php $reponse = $database->query("SELECT * FROM experience"); ?>

                <section class="page-section portfolio" id="portfolio">
                    <div class="container">
                        <!-- Portfolio Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Mes expériences</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Portfolio Grid Items-->
                        <div class="row justify-content-center">
                        <?php 
                            while($row = $reponse->fetch()) {
                                echo'<a href= "crud/experience/detail.php?id='.$row["id"].'" class="col-md-6 col-lg-4 mb-5">
                                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="assets/img/portfolio/exp.png" alt="" />
                                        <div class= "taille_formation">'.$row["posteOccupe"].'</div>
                                    </div>';
                            }

                            $reponse->closeCursor();
                        ?>
                        </div>                    
                    </div>
                    <!-- le bouton apparait lorrsque un visiteur est connecté il disparait lorsqu'il est déconnecté -->
                    <a class="btn btn-primary" id="bouton-ajouter" href="crud/experience/ajouter.php"  style="opacity: <?= isset($_SESSION['email']) ? '1':'0' ?>;">Ajouter une Expérience</a>  
               
                    </div>
               </section>
        </section>

        <!-- Contact Section-->
        
        <?php include("contact.php"); ?>

                  <!-- footer  -->
        <?php include("_footer.php"); ?>
                   <!-- footer  -->

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
