<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Lab1</title>
</head>
<body>
    <h3>Задорожний Віктор. КІУКІу-20-1</h3>
    <form method="GET" action="">
        <p>Фильмы по жанру <select name="genre" id="genre">
                <?php
                include 'conn.php';
                $sqlSelect = "SELECT DISTINCT title FROM $db.genre";
                foreach ($dbh->query($sqlSelect) as $cell) {
                    echo "<option>";
                    print($cell[0]);
                    echo "</option>";
                }
                ?>
            </select>
            <button> ОК </button>
        </p>
    </form>


    <form method="GET" action="">
        <p>Фильмы по актеру<select name="actor" id="actor">
                <?php
                include 'conn.php';
                $sqlSelect = "SELECT DISTINCT name FROM $db.actor";
                foreach ($dbh->query($sqlSelect) as $cell) {
                    echo "<option>";
                    print($cell[0]);
                    echo "</option>";
                }
                ?>
            </select>
            <button> ОК </button>
        </p>
    </form>


    <form method="GET" action="">
        <p>Фильмы по дате
            <select name="date_1" id="date_1">
                <?php
                include 'conn.php';
                $sqlSelect = "SELECT DISTINCT date FROM $db.FILM";
                foreach ($dbh->query($sqlSelect) as $cell) {
                    echo "<option>";
                    print($cell[0]);
                    echo "</option>";
                }
                ?>
            </select>
            <select name="date_2" id="date_2">
                <?php
                include 'conn.php';
                $sqlSelect = "SELECT DISTINCT date FROM $db.FILM";
                foreach ($dbh->query($sqlSelect) as $cell) {
                    echo "<option>";
                    print($cell[0]);
                    echo "</option>";
                }
                ?>
        </p>
        </select>
        <button> ОК </button>
    </form>
</body>


<?php
if (isset($_GET['genre'])) {
    include "conn.php";
    $genre = $_GET['genre'];
    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.genre
    inner join $db.film_genre on $db.genre.id_genre = $db.FILM_GENRE.FID_GENRE
    inner join $db.film on $db.film_genre.fid_film = $db.film.id_film
    where $db.genre.title = :genre"
    );
    $sqlSelect->execute(array('genre' => $genre));
    echo "<table border ='1'>";
    echo "<tr><th>Жанр</th><th>Фильм</th><th>Дата выпуска</th><th>Страна</th><th>Качество</th><th>Расширение</th><th>Кодек</th><th>Продюсер</th><th>Директор</th><th>Карьер</th></tr>";
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
        $genre = $cell[1];
        $film = $cell[5];
        $date = $cell[6];
        $country = $cell[7];
        $quality = $cell[8];
        $resolution = $cell[9];
        $codec = $cell[10];
        $producer = $cell[11];
        $director = $cell[12];
        $carrier = $cell[13];

        echo "<tr><td>$genre</td><td>$film</td><td>$date</td><td>$country</td><td>$quality</td><td>$resolution</td><td>$codec</td><td>$producer</td><td>$director</td><td>$carrier</td></tr>";
    }
}
if (isset($_GET['actor'])) {
    $actor = $_GET['actor'];
    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.actor
    inner join $db.film_actor on $db.actor.id_actor = $db.FILM_actor.FID_actor
    inner join $db.film on $db.film_actor.fid_film = $db.film.id_film
    where $db.actor.name = :actor"
    );
    $sqlSelect->execute(array('actor' => $actor));
    echo "<table border ='1'>";
    echo "<tr><th>Актер</th><th>Фильм</th><th>Дата выпуска</th><th>Страна</th><th>Качество</th><th>Расширение</th><th>Кодек</th><th>Продюсер</th><th>Директор</th><th>Карьер</th></tr>";
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
        $film = $cell[5];
        $date = $cell[6];
        $country = $cell[7];
        $quality = $cell[8];
        $resolution = $cell[9];
        $codec = $cell[10];
        $producer = $cell[11];
        $director = $cell[12];
        $carrier = $cell[13];

        echo "<tr><td>$actor</td><td>$film</td><td>$date</td><td>$country</td><td>$quality</td><td>$resolution</td><td>$codec</td><td>$producer</td><td>$director</td><td>$carrier</td></tr>";
    }
}
if (isset($_GET['date_1']) && isset($_GET['date_2'])) {
    $date_1 = $_GET['date_1'];
    $date_2 = $_GET['date_2'];

    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.film
            where $db.film.date between :date_1 and :date_2"
    );
    $sqlSelect->execute(array('date_1' => $date_1, 'date_2' => $date_2));
    echo "<table border ='1'>";
    echo "<tr><th>Фильм</th><th>Дата</th><th>Страна</th><th>Качество</th><th>Расширение</th><th>Кодек</th><th>Продюсер</th><th>Директор</th><th>Карьер</th></tr>";
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
        $film = $cell[1];
        $date = $cell[2];
        $country = $cell[3];
        $quality = $cell[4];
        $resolution = $cell[5];
        $codec = $cell[6];
        $producer = $cell[7];
        $director = $cell[8];
        $carrier = $cell[9];
        echo "<tr><td>$film</td><td>$date</td><td>$country</td><td>$quality</td><td>$resolution</td><td>$codec</td><td>$producer</td><td>$director</td><td>$carrier</td></tr>";
    }
}
?>

</html>