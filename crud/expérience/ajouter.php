<?php
    include_once '../config/database.php';
    if(isset($_GET['posteOccupe']) && isset($_GET['nomEntreprise']) && isset($_GET['dateDebut']) 
    && isset($_GET['dateDefin']) && isset($_GET['descriptionPoste']) && isset($_GET['utilisateur'])){
        $sqlRe = "INSERT INTO formation(posteOccupe, nomEntreprise, dateDebut, dateDefin, descriptionPoste, utilisateur)
         VALUES(:NomPosteOccupe, :NomEntreprise, :debutAnnee, :finAnnee, :textDescriptionPoste, :nbreUtilisateur)";
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array( Nomformation=>$_GET['nomFormation'], nomEcole=> $_GET['ecole'], dateAnneeDiplome=>$_GET['anneeDiplome'], 
            textDescription=>$_GET['description'], nbreUtilisateur=>$_GET['utilisateur']));

            echo "New record created successfully";
            header("Location:../about.php");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
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

        <title>Ajouter une formation</title>

  <!-- Bootstrap core CSS -->
  <link href="../style/bootstrap.min.css" rel="stylesheet">
  <link href="../style/main.css" rel="stylesheet">
    </head>
	<body>
        <?php include '../header.php'; ?>
		<div class="form-container">
			<form action="ajouter.php" method="get" name="formulaire">
				
				<div class="container">
                    <div class="form-group">
                        <label for="nomFormation"><b>Nom de la formation</b></label>
                        <input class="form-control" id="nomFormation" type="text" name="nomFormation" required>
                    </div>
                    <div class="form-group">
                            <label for="ecole"><b>Nom de l'ecole</b></label>
                            <input class="form-control" id="ecole" type="text" name="ecole" required>
                    </div>
                    <div class="form-group">
                        <label for="anneeDiplome"><b>Année d'obtention</b></label>
                        <input class="form-control" id="anneeDiplome" type="Number" step="0.01" name="anneeDiplome" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description de la formation</b></label>
                        <input class="form-control" id="descriptiont" type="text" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="utilisateur"><b>nombre</b></label>
                        <input class="form-control" id="utilisateur" type="Number" step="0.01" name="utilisateur" required>
                    </div>
					<button type="submit" id="bouton-ajouter" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>




