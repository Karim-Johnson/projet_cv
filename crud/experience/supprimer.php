
<!-- $action = mysql_real_escape_string('insert php code for button here'); -->
<?php
    include_once '../../config/database.php';
     if(isset($_POST['id']))
         $sqlRe = 'DELETE FROM formation WHERE id= :id';
         $req->execute(array($_GET['id']));
         $req->closeCursor();
        try{
            $req = $conn->prepare($sqlRe);
            $req->execute(array(id=> $_POST['id']));
            echo " delete execute";
            header("Location:about.php");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
      
      









?>


