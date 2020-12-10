<?php
    include_once '../../config/database.php';
     if(isset($_GET['id'])){
         $sqlRe = 'SELECT * FROM formation WHERE id= :identifiant';
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(':identifiant' => $_GET['id']));
        } catch(PDOException $e) {
            echo $sqlRe . "<br>" . $e->getMessage();
        }
      
     } 
else{
    if(isset($_POST['identifiant']) && isset($_POST['nomFormation']) && isset($_POST['ecole']) && isset($_POST['anneeDiplome']) && isset($_POST['description']) && isset($_POST['utilisateur'])){
       
        $sqlRe = "UPDATE formation SET nomFormation=?, ecole=?, anneeDiplome=?, description=?, utilisateur=? WHERE id=?";
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array($_POST['nomFormation'], $_POST['ecole'], (int)$_POST['anneeDiplome'], $_POST['description'], (int)$_POST['utilisateur'], $_POST['identifiant']));
            
            echo "New record created successfully";
            header("Location:../../index.php");
        } catch(PDOException $e) {
            echo $sqlRe . "<br>" . $e->getMessage();
        }
    }
        
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
        <?php include '../../header.php'; ?>
		<div class="form-container">

			<form action="modifier.php" method="post" name="formulaire">
				<?php $row =$req->fetch();  ?>

            
				<div class="container">

               

                    <div class="form-group">    
                        <label for="nomFormation"><b>Nom de la formation</b></label>
                        <input class="form-control" id="nomFormation" type="text" name="nomFormation" value="<?php echo $row["nomFormation"]; ?>" required>
                    </div>
                    <div class="form-group">
                            <label for="ecole"><b>Nom de l'ecole</b></label>
                            <input class="form-control" id="ecole" type="text" name="ecole" value="<?php echo $row["ecole"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="anneeDiplome"><b>Année d'obtention</b></label>
                        <input class="form-control" id="anneeDiplome" type="number"  name="anneeDiplome" value="<?php echo $row["anneeDiplome"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description de la formation</b></label>
                        <input class="form-control" id="descriptions" type="text" name="description"  value="<?php echo $row["description"]; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="utilisateur"><b>Nombre</b></label>
                        <input class="form-control" id="utilisateur" type="number"  name="utilisateur" value="<?php echo  $row["utilisateur"]; ?>"  required>
                    </div>
                    <input type="hidden" name="identifiant" value="<?php echo $row["id"]; ?>" required>
                
					<button type="submit" id="bouton-ajouter" class="btn btn-primary">Envoyer</button>
				</div>
			</form>
		</div>
	</body>
</html>




