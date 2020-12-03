<?php
    include_once '../../config/database.php';
    if(isset($_POST['nomFormation']) && isset($_POST['ecole']) && isset($_POST['anneeDiplome']) && isset($_POST['description']) && isset($_POST['utilisateur'])){
        $sqlRe = "INSERT INTO formation(nomFormation, ecole, anneeDiplome, description, utilisateur) VALUES(:nomFormation, :ecole, :anneeDiplome, :description, :utilisateur)";
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(':nomFormation'=>$_POST['nomFormation'], ':ecole'=> $_POST['ecole'], ':anneeDiplome'=>$_POST['anneeDiplome'], ':description'=>$_POST['description'], ':utilisateur'=>$_POST['utilisateur']));
            
            echo "New record created successfully";
            header("Location:liste.php");
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

        <title>Ajouter une formation</title>

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
                        <label for="nomFormation"><b>Nom de la formation</b></label>
                        <input class="form-control" id="nomFormation" type="text" name="nomFormation" required>
                    </div>
                    <div class="form-group">
                            <label for="ecole"><b>Nom de l'ecole</b></label>
                            <input class="form-control" id="ecole" type="text" name="ecole" required>
                    </div>
                    <div class="form-group">
                        <label for="anneeDiplome"><b>Année d'obtention</b></label>
                        <input class="form-control" id="anneeDiplome" type="Number"  name="anneeDiplome" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description de la formation</b></label>
                        <input class="form-control" id="description" type="text" name="description" required>
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




