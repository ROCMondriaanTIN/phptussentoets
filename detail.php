

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

<h1>Zie Hier Onder De Film</h1>
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub", "root", "");
    $id = $_GET["id"];
    $query = $db->prepare("SELECT * FROM `film` WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $item){
        echo "<h2>" . $item["titel"] . "</h2>";
    }
}catch (PDOException $e){
    die("error" . $e->getMessage());
}

?>

<h4>Zie Hier Onder De Reviews</h4>

<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub", "root", "");
    $id = $_GET["id"];
    $query = $db->prepare("SELECT * FROM `beoordeling` WHERE film_id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $count = 0;
    $som = 0;
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $item){
        echo "<p >Cijfer: " . " " . $item["cijfer"] . "</p>";
        echo "<p> Opmerkingen:" . " " . $item["opmerking"] . "</p>";
        $nieuw = $item["cijfer"];
        $som += $nieuw;
        $count++;
    }
    echo "<h3>Gemiddelde:</h3>" . $som / $count;
}catch (PDOException $e){
    die("error" . $e->getMessage());
}

?>

<form action="index.php">
    <input type="submit" value="go back?" />
</form>

</body>
</html>

