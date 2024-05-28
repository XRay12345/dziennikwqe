<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dziennik1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM plan_lekcji";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przegląd Lekcji</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
         
            background-color: rgb(9, 128, 0);
            color: white;
        }

        h1 {
            color: rgb(9, 128, 0);
        }


        a {
            color: rgb(9, 128, 0);
        }
    </style>
</head>
<body>
    <h1>Przegląd Lekcji</h1>

    <div class="container">
    <ul>
        <li><a href="dziennik.php" class="button">Głowna strona</a></li>
        <li><a href="uczniowie.php" class="button">Lista uczniów</a></li>
        <li><a href="klasy.php" class="button">Lista klas</a></li>
        <li><a href="dziennik.php" class="button">Głowna strona</a></li>
    </ul>
</div>

    <table>
        <tr>
            <th>ID Lekcji</th>
            <th>ID Klasy</th>
            <th>ID Nauczyciela</th>
            <th>ID Kursu</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Typ Lekcji</th>
            <th>Nazwa Lekcji</th>
        </tr>
        
        <?php
 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_lekcji"] . "</td>";
                echo "<td>" . $row["ID_klasy"] . "</td>";
                echo "<td>" . $row["ID_nauczyciela"] . "</td>";
                echo "<td>" . $row["ID_kursu"] . "</td>";
                echo "<td>" . $row["Data"] . "</td>";
                echo "<td>" . $row["Godzina"] . "</td>";
                echo "<td>" . $row["Typ_lekcji"] . "</td>";
                echo "<td>" . $row["nazwa_lekcji"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Brak lekcji do wyświetlenia</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php

$conn->close();
?>

