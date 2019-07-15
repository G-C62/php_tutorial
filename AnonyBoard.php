<?php
$dbh = new PDO('mysql:host=10.10.1.175;dbname=c62;charset=utf8', 'root', 'webdev1!');
if(!dbh){
    echo "\n안됨\n";
    exit;
}
function list_all(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM POSTS');
    if(!stmt){
        echo "\nPOD::errorInfo()\n";
        print_r($dbh->errorInfo());
    }
    $stmt->execute();
    $list = $stmt->fetchAll();
    return $list;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script>
        $(function(){
            $('#table_id').DataTable();
        });
        </script>
    </head>
    <body>
    <?php
    $list = list_all();
    foreach($list as $row){
        echo "<p>{$row['id']}</p>";
        echo "<p>{$row['name']}</p>";
        echo "<p>{$row['rank']}</p>";
    }
    ?>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>글번호</th>
                <th>제목</th>
                <th>작성일시</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $list = list_all();
            foreach($list as $row){
                echo "
                <tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['TITLE']}</td>
                    <td>{$row['CREATED_AT']}</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    </body>
    
</html>