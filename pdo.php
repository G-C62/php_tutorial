<?php
$dbh = new PDO('mysql:host=10.10.1.175;dbname=c62;charset=utf8', 'root', 'webdev1!');
if(!dbh){
    echo "\n안됨\n";
    exit;
}
$stmt = $dbh->prepare('SELECT * FROM users');
if(!stmt){
    echo "\nPOD::errorInfo()\n";
    print_r($dbh->errorInfo());
}
$stmt->execute();
$list = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
   <body>
   <?php
   var_dump($list);
   foreach($list as $row){
       echo "<p>{$row['id']}</p>";
       echo "<p>{$row['name']}</p>";
       echo "<p>{$row['rank']}</p>";
   }
   ?>
   </body>
    
</html>