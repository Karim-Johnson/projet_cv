<!-- connexion avec la base -->
<?php
    include_once '../../config/database.php';
    $reponse = $database->query("SELECT * FROM formation");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About database</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
    <!-- Bootstrap core CSS -->
    <link href="../../css/styles.css" rel="stylesheet">

</head>

<body>
     
        <section class="page-section portfolio" id="portfolio">
                <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
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
                            echo'<a href= "detail.php?id='.$row["id"].'" class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/portfolio/cabin.png" alt="" />
                                    <div>'.$row["nomFormation"].'</div>
                                </div>';
                        }

                        $reponse->closeCursor();
                    ?>
                    </div>
                </div>
        </section>
</body>

</html>