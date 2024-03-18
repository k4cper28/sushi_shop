<?php

$imie   = $_POST['imie'];
$nazwisko = $_POST["nazwisko"];
$email = $_POST["email"];
$ulica = $_POST["ulica"];
$nrDom = $_POST["nrDomu"];
$nrTele = $_POST["nrTel"];
$uwagi = $_POST["uwagi"];


$host = "localhost";
$dbname = "projekt";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO zamowienie (Imie,Nazwisko,email,ulica,nr_domu,nr_telefonu,uwagi)
        VALUES (?,?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {

    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssiis", $imie,$nazwisko,$email,$ulica,$nrDom,$nrTele,$uwagi);

mysqli_stmt_execute($stmt);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ninja sushi</title>
    <link rel="icon" type="image/x-icon" href="zdjecia/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    <script src="js/sctipt.js"></script>
</head>
<body>
<nav>
    <div id="logo">
        <a href="index.html"> <img src="zdjecia/logo.png" id="logoo" alt="logo"></a>
    </div>
    <div id="name">
        <p id="namee">NINJA SUSHI</p>
    </div>
    <ul id="nav">
        <li><a href="index.html"> Strona główna </a></li>
        <li><a href="onas.html"> O nas</a></li>
        <li><a href="menu.html"  title="">Menu </a></li>
        <li><a href="kontakt.html" title="">Kontakt</a></li>
        <li><a href="zamowienie.html" title="Zlóż zamówienie" id="zamow">Zamów online</a></li>
    </ul>
</nav>
<main>
        <div id="kontenerpo">
                <h1>Dziekujemu za zamówienie!</h1>
                <h2>Zapraszamy ponownie!</h2>
                <a href="index.html" title="Zlóż zamówienie" id="powrot">Powrot do strony głownej</a>
            </div>
</main>
<footer>
    <h3>Do zobaczenia! </h3>
    <p>&copy;NINJA SUSHI 2023</p>
</footer>
</body>
</html>