<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uczniowie</title>
</head>
<body>
    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffe6e6; 
}

/* Nagłówek */
.header {
    background-color: #ff4d4d; /* Jasny czerwony odcień */
    color: white;
    padding: 20px;
    text-align: center;
}

/* Kontener */
.container {
    margin: 20px;
    padding: 10px;
    background-color: white;
    border: 2px solid #ff4d4d; /* Jasny czerwony odcień */
    border-radius: 5px;
}

/* Lista nawigacyjna */
ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

/* Styl przycisków */
.button {
    display: block;
    padding: 10px 20px;
    color: white;
    background-color: #ff4d4d; /* Jasny czerwony odcień */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #cc0000; /* Ciemniejszy czerwony odcień podczas najechania */
}

/* Styl tabeli */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ff4d4d; /* Jasny czerwony odcień */
    padding: 10px;
    text-align: left;
}

th {
    background-color: #ff4d4d; /* Jasny czerwony odcień */
    color: white;
}

    </style>
<div class="header">
<h2>Lista uczniów</h2>
</div>

<div class="container">
    <ul>
        <li><a href="nauczyciele.php" class="button">Lista nauczycieli</a></li>
        <li><a href="dziennik.php" class="button">Głowna strona</a></li>
        <li><a href="klasy.php" class="button">Lista klas</a></li>
        <li><a href="plan_lekcji.php" class="button">Plan lekcji</a></li>
    </ul>
</div>


    <table>
    <?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dziennik1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zapytanie SQL
$sql = "SELECT * FROM uczniowie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Wyświetlanie danych w tabeli
    echo "<table border='1'><tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID_ucznia"]."</td><td>".$row["Imię"]."</td><td>".$row["Nazwisko"]."</td><td>".$row["Data_urodzenia"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak danych";
}
$conn->close();
?>
    </table>


</body>
</html>
