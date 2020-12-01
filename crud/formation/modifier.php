<?php
    include_once '../../config/database.php';
     if(isset($_GET['id'])){
         $sqlRe = 'UPDATE  formation SET WHERE id= :id';
        try{
            $req = $database->prepare($sqlRe);
            $req->execute(array(id=> $_GET['id']));
            echo " update execute";
            header("Location:../../about.php");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
      
     }  

?>
