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

$sqlRe = "SELECT * FROM experience WHERE id = ?";
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

    <!-- Bootstrap core CSS -->
    <link href="../../style/bootstrap.min.css" rel="stylesheet">
    <link href="../../style/main.css" rel="stylesheet">
    </head>
	<body>
        <?php include '../../header.php'; 
        
     
        
        ?>
	
            
				<div class="container mt-5">

                <form> 
                        <div class="form-group" >    
                            <label>Nom de l'entreprise: </label> <?php echo '  ' .$row["nomEntreprise"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Poste occupé: </label> <?php echo '  ' .$row["posteOccupe"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>description du poste: </label> <?php echo '  ' .$row["descriptionPoste"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Utilisateur: </label> <?php echo '  ' .$row["utilisateur"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Date de debut: </label> <?php echo '  ' .$row["dateDebut"]; ?>
                
                        </div>
                        <div class="form-group" >    
                            <label>Date de fin: </label> <?php echo '  ' .$row["dateDefin"]; ?>
                
                        </div>

                        </div>     
                <form> 
     </body>

 <html>
               


