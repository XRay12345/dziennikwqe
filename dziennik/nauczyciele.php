<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nauczyciele</title>
    <link rel="stylesheet"  href="nauczyciele.css">
</head>
<body>
    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}


.header {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
}

.container {
    margin: 20px;
    padding: 10px;
    background-color: white;
    border-radius: 5px;
}


ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}


.button {
    display: block;
    padding: 10px 20px;
    color: white;
    background-color: #4CAF50;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #45a049;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

    </style>
<div class="header">
    <h1>Lista Nauczycieli</h1>
</div>

<div class="container">
    <ul>
        <li><a href="dziennik.php" class="button">Głowna strona</a></li>
        <li><a href="uczniowie.php" class="button">Lista uczniów</a></li>
        <li><a href="klasy.php" class="button">Lista klas</a></li>
        <li><a href="plan_lekcji.php" class="button">Plan lekcji</a></li>
    </ul>
</div>
    <table>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dziennik1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM nauczyciele";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Specjalizacja</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID_nauczyciela"]."</td><td>".$row["Imię"]."</td><td>".$row["Nazwisko"]."</td><td>".$row["Specjalizacja"]."</td></tr>";
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
