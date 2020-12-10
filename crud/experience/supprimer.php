
<!-- $action = mysql_real_escape_string('insert php code for button here'); -->
<?php
   include_once '../../config/database.php';
   if(isset($_GET['id'])){
       $sqlRe = 'DELETE FROM experience WHERE id= :id';
      try{
          $req = $database->prepare($sqlRe);
          $req->execute(array(id=> $_GET['id']));
          echo " delete execute";
          header("Location:../../index.php");
      } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
    
   }  
?>



