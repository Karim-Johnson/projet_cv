<?php
    include_once '../../config/database.php';
     if(isset($_GET['id'])){
         $sqlRe = 'SELECT * FROM experience WHERE id= :identifiant';
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(':identifiant' => $_GET['id']));
        } catch(PDOException $e) {
            echo $sqlRe . "<br>" . $e->getMessage();
        }
      
     } 
else{
    if(isset($_POST['identifiant']) && isset($_POST['posteOccupe']) && isset($_POST['nomEntreprise']) && isset($_POST['dateDebut']) && isset($_POST['dateDefin']) && isset($_POST['descriptionPoste']) && isset($_POST['utilisateur'])){
       
        $sqlRe = "UPDATE experience SET posteOccupe=?, nomEntreprise=?, dateDebut=?, dateDefin=?, descriptionPoste=?, utilisateur=? WHERE id=?";
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array($_POST['posteOccupe'], $_POST['nomEntreprise'], $_POST['dateDebut'], $_POST['dateDefin'], $_POST['descriptionPoste'], (int)$_POST['utilisateur'], $_POST['identifiant']));
            
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

        <title>Modifier une experience</title>

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
                        <label for="posteOccupe"><b>Nom du poste occupé</b></label>
                        <input class="form-control" id="posteOccupe" type="text" name="posteOccupe" value="<?php echo $row["posteOccupe"]; ?>" required>
                    </div>
                    <div class="form-group">
                            <label for="nomEntreprise"><b>Nom de l'entreprise</b></label>
                            <input class="form-control" id="nomEntreprise" type="text" name="nomEntreprise" value="<?php echo $row["nomEntreprise"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dateDebut"><b>Année de début</b></label>
                        <input class="form-control" id="dateDebut" type="date"  name="dateDebut" value="<?php echo $row["dateDebut"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dateDefin"><b>Année de fin</b></label>
                        <input class="form-control" id="dateDefin" type="date"  name="dateDefin" value="<?php echo $row["dateDefin"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptionPoste"><b>Description du poste</b></label>
                        <input class="form-control" id="descriptionPoste" type="text" name="descriptionPoste"  value="<?php echo $row["descriptionPoste"]; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="utilisateur"><b>Nombre d'utilisateur</b></label>
                        <input class="form-control" id="utilisateur" type="number"  name="utilisateur" value="<?php echo  $row["utilisateur"]; ?>"  required>
                    </div>
                    <input type="hidden" name="identifiant" value="<?php echo $row["id"]; ?>" required>
                
					<button type="submit" id="bouton-ajouter" class="btn btn-primary">Envoyer</button>
				</div>
			</form>
		</div>
	</body>
</html>




