<?php
    include_once '../../config/database.php';
    $reponse = $database->query("SELECT * FROM formation ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>About database</title>

  <!-- Bootstrap core CSS -->
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link href="style/main.css" rel="stylesheet">

</head>

<body>
<?php 

include '../../header.php';

if ($reponse->rowCount() > 0) {    
?>
<div class="container">
    <h1 id="entete-tableau"> Table de formations :</h1>
    <table>
        <tr>
            <td idden>id</td>
            <td>nomFormation</td>
            <td>ecole</td>
            <td>anneeDiplome</td>
            <td>descriptions</td>
            <td>utilisateur</td>
        </tr>
    <?php
    while($row = $reponse->fetch()) {
        $lienSuppression ='href="crud/formation/supprimer.php?id='.$row["id"];
        ?> 
    ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["nomFormation"]; ?></td>
            <td><?php echo $row["ecole"]; ?></td>
            <td><?php echo $row["anneeDiplome"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["utilisateur"]; ?></td>
            <td><?php echo '<a class="btn btn-success" href="crud/formation/modifier.php?id='.$row["id"].'">modifier</a>'?></td>
            <td><?php echo '<a class="btn btn-danger" href="crud/formation/supprimer.php?id='.$row["id"].'">supprimer</a>'?></td>
            
        </tr>
    <?php
    }
    $reponse->closeCursor();
    ?>
    </table>
<?php
}
else{
    echo "No result found";
}
?>
    <a class="btn btn-primary" id="bouton-ajouter" href="crud/formation/ajouter.php">Ajouter une formation</a>

    <form>
        kkkkkkkkkkk
        <label>ok</label>
        kkkkkkk
    </form>
</div>
</body>

</html>