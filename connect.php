<?php

$email = $_POST["email"];

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

$sql = "INSERT INTO newsletter (email)
        VALUES (?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {

    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $email);

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
    <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div id="kontener1">
                    <div id="foras1">
                        <img src="zdjecia/sushi1.jpg" alt="slaid1" id="slaid1">
                    </div>
                    <div id="napiss1">
                        <h3>Promocja!</h3>
                        <p>Pragniesz niesamowitych okazji? Mamy dla Ciebie wyjątkową ofertę!
                            Wystarczy złożyć zamówienie przy pomocy strony internetowej i wpisać kod promocyjny:
                            <strong>PROMO10</strong>. Już teraz możesz zaoszczędzić 10% na wszystkich naszych produktach online!</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div id="kontener2">
                    <div id="napiss2">
                        <h3>Jakość, smak i atmosfera!</h3>
                        <p>Są dla nas priorytetem, wyznaczają nam drogę dzięki której możemy Was dalej zaskakiwać.</p>
                    </div>
                    <div id="fotas2">
                        <img src="zdjecia/sushi2.jpg" alt="slaid2">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="zaproszenie">
        <h2>TO JEST SUSHI TIME!</h2>
        <h3>Wpadnij do nas już dziś!</h3>
        <div id="kontener3">
            <div id="fotaadres">
                <img src="zdjecia/sushi3.png" alt="slaid2">
            </div>
            <div id="info">
                <div id="adres">
                    <h4>Adress</h4>
                    <p>ul. Norberta Gierczaka 34</p>
                    <p>Warszawa, 00-001</p>
                </div>
                <div id="otwarcie">
                    <h4>Godziny otwarcia</h4>
                    <p>PN - PT: 10AM - 12PM</p>
                    <p>SB -ND: 12PM - 12AM</p>
                </div>
            </div>
        </div>
    </div>
    <div id="newletter">
        <h2>Zapisz sie do Newslettera!</h2>
        <h3>Bądz na bieżąco z nowościami!</h3>
        <form action="connect.php" method="post" id="newletterform">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="example@exp.com" aria-label="Recipient's username" aria-describedby="button-addon2" id="emailnewsletter"  name="email" required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
            </div>
        </form>
    </div>
</main>
<footer>
    <h3>Do zobaczenia! </h3>
    <p>&copy;NINJA SUSHI 2023</p>
</footer>
</body>
</html>