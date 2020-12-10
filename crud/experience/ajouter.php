<?php
    include_once '../../config/database.php';
    
    session_start();

    if(isset($_POST['posteOccupe']) && isset($_POST['nomEntreprise']) && isset($_POST['dateDebut']) && isset($_POST['dateDefin']) && isset($_POST['descriptionPoste']) && isset($_POST['utilisateur'])){
        $sqlRe = "INSERT INTO experience(posteOccupe, nomEntreprise, dateDebut, dateDefin, descriptionPoste, utilisateur) VALUES(:posteOccupe, :nomEntreprise, :dateDebut, :dateDefin, :descriptionPoste, :utilisateur)";
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(':posteOccupe'=>$_POST['posteOccupe'], ':nomEntreprise'=>$_POST['nomEntreprise'], ':dateDebut'=> $_POST['dateDebut'], ':dateDefin'=> $_POST['dateDefin'], ':descriptionPoste'=>$_POST['descriptionPoste'], ':utilisateur'=>$_POST['utilisateur']));
            
            echo "New record created successfully";
            header("Location:../../index.php");
        } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
        }
}


// $result = mysqli_query( $con, $query );


?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ajouter une expérience</title>

  <!-- Bootstrap core CSS -->
  <link href="../../style/bootstrap.min.css" rel="stylesheet">
  <link href="../../style/main.css" rel="stylesheet">
    </head>
	<body>
        <?php include '../../header.php'; ?>
		<div class="form-container">
			<form action="ajouter.php" method="post" name="formulaire">
				
				<div class="container">
                    <div class="form-group">
                        <label for="posteOccupe"><b>Nom du poste occupé</b></label>
                        <input class="form-control" id="posteOccupe" type="text" name="posteOccupe" required>
                    </div>
                    <div class="form-group">
                            <label for="nomEntreprise"><b>Nom de l'entreprise</b></label>
                            <input class="form-control" id="nomEntreprise" type="text" name="nomEntreprise" required>
                    </div>
                    <div class="form-group">
                        <label for="dateDebut"><b>Date de début</b></label>
                        <input class="form-control" id="dateDebut" type="date"  name="dateDebut" required>
                    </div>
                    <div class="form-group">
                        <label for="dateDefin"><b>Date de fin</b></label>
                        <input class="form-control" id="dateDefin" type="date"  name="dateDefin" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptionPoste"><b>Description du poste</b></label>
                        <input class="form-control" id="descriptionPoste" type="text" name="descriptionPoste" required>
                    </div>
                    <div class="form-group">
                        <label for="utilisateur"><b>Nombre</b></label>
                        <input class="form-control" id="utilisateur" type="Number"  name="utilisateur" required>
                    </div>
					<button type="submit" id="bouton-ajouter" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>




