<?php
     include_once '../../config/database.php';
    //  if(isset($_GET['id'])){
    //      $sqlRe = 'SELECT * FROM experience WHERE id= :?';
    //     try{
    //         $req = $database->prepare($sqlRe);
    //         $req->execute(array(':?' => $_GET['id']));
    //     } catch(PDOException $e) {
    //         echo $sqlRe . "<br>" . $e->getMessage();
    //     }
      
    //  } 
    

if (!empty($_GET['id']));
{
    $id = checkInput(($_GET['id']));
}

$sqlRe = "SELECT * FROM formation WHERE id = ?";
$req = $database->prepare($sqlRe);
$req->execute(array($id));
$row =$req->fetch();

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars_decode($data);
    return $data;
}

?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modifier une formation</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Bootstrap core CSS -->
  <link href="../../style/bootstrap.min.css" rel="stylesheet">
  <link href="../../style/main.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet" />
    </head>
	<body>
        <?php include '../../header.php'; 
        
     
        
        ?>
	
            
			<div class="container mt-5">

                <form> 
                        <div class="form-group" >    
                            <label>Nom de la formation: </label> <?php echo '  ' .$row["nomFormation"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Nom de l'école: </label> <?php echo '  ' .$row["ecole"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Année d'obtention du diplôme: </label> <?php echo '  ' .$row["anneeDiplome"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Description de la formation: </label> <?php echo '  ' .$row["description"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Utilisateur: </label> <?php echo '  ' .$row["utilisateur"]; ?>
                
                        </div>
                        
                
                <form> 
            </div>     
               

                <?php include("../../_footer.php"); ?>
     </body>

 <html>
               


