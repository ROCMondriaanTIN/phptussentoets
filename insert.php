<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub", "root", "");
    $id = $_GET["id"];
    $query = $db->prepare("SELECT * FROM `film` WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    die("error" . $e->getMessage());
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
<form action="" method="post">
    <label for="title">Titel</label>
    <br>
        <input type="text" name="titel" id="titel">
    <br>
    <label for="genre">Genre</label>
    <br>
        <input type="text" name="genre" id="genre">
    <br>
    <label for="submit"></label>
    <input type="submit" name="submit" id="submit">
</form>
<form action="index.php">
    <input type="submit" value="go back?" />
</form>
</body>
</html>
<?php

$titel_required = "titel invullen";
$genre_required = "genre invullen";

$errors = [];
$inputs = [];

if(isset($_POST["send"])){

    $title = $_POST["titel"];
    $genre = $_POST["genre"];

    $query = $db->prepare("INSERT INTO film (titel, genre) values (:titel, :genre)");

    $query->bindParam(":titel", $title);
    $query->bindParam(":genre", $genre);

    $result = $query->execute();
}
