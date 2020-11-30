

<?php

try
    {
        $database = new PDO('mysql:host=localhost;dbname=job_board','root','');
        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch (Excepttion $e)
    {
        die('ERROR: ' .$e->getMessage());
    }


    $pdo = new PDO('mysql:host=localhost;dbname=job_board', 'root', '');
    $statement = $pdo->query("SELECT PRIX FROM stock");
    while($row = $statement->fetch())
    {
        echo ($row['PRIX']).'<br><br><br>';
    }
?>

<?php include '../header.php'; ?>