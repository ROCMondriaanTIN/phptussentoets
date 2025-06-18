<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub", "root", "");
    $query = $db->prepare("SELECT * FROM `film`");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $item){
        echo '<a href="detail.php?id=' . $item['id'] . '">';
        echo "</br>";
        echo htmlspecialchars($item['titel']);
        echo "</br>";
        echo $item["id"];
        echo '</a>';
    }

}catch(PDOException $e){
    die("error fn" . " " . $e->getMessage());
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Zie hier boven de films!</h1>
<form action="insert.php">
    <input type="submit" value="Insert a movie?" />
</form>

</body>
</html>
