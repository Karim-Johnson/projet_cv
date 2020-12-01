<?php
    include_once '../../config/database.php';
     if(isset($_GET['id'])){
         $sqlRe = 'SELECT * FROM formation WHERE id =:identifiant';
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(':identifiant' => $_GET['id']));
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

        <title>Modifier une formation</title>

  <!-- Bootstrap core CSS -->
  <link href="../../style/bootstrap.min.css" rel="stylesheet">
  <link href="../../style/main.css" rel="stylesheet">
    </head>
	<body>
        <?php include '../../header.php'; ?>
		<div class="form-container">

			<form action="ajouter.php" method="get" name="formulaire">
				<?php $row = $req->fetch();  ?>
                 
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
                        <input class="form-control" id="anneeDiplome" type="Number"  name="anneeDiplome" value="<?php echo $row["anneeDiplome"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description de la formation</b></label>
                        <input class="form-control" id="descriptions" type="text" name="descriptions"  value="<?php echo $row["description"]; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="utilisateur"><b>Nombre</b></label>
                        <input class="form-control" id="utilisateur" type="Number"  name="utilisateur" value="<?php echo  $row["utilisateur"]; ?>"  required>
                    </div>
					<button type="submit" id="bouton-ajouter" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>




