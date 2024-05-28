<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona z kursami</title>
    <link rel="stylesheet"  href="klasy.css">
</head>

<body>
    <style>
        /* Styl ogólny */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffe5cc; /* Jasny pomarańczowy odcień */
}

/* Nagłówek */
.header {
    background-color: #ff8c00; /* Ciemny pomarańczowy odcień */
    color: white;
    padding: 20px;
    text-align: center;
}

/* Kontener */
.container {
    margin: 20px;
    padding: 10px;
    background-color: white;
    border: 2px solid #ff8c00; /* Ciemny pomarańczowy odcień */
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

.button {
    display: block;
    padding: 10px 20px;
    color: white;
    background-color: #ff8c00; /* Ciemny pomarańczowy odcień */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #cc6a00; /* Ciemniejszy pomarańczowy odcień podczas najechania */
}

/* Styl tabeli */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ff8c00; /* Ciemny pomarańczowy odcień */
    padding: 10px;
    text-align: left;
}

th {
    background-color: #ff8c00; /* Ciemny pomarańczowy odcień */
    color: white;
}

    </style>
<div class="header">
    <h1>Strona z Klasami</h1>
</div>

<div class="container">
    <ul>
        <li><a href="nauczyciele.php" class="button">Lista nauczycieli</a></li>
        <li><a href="uczniowie.php" class="button">Lista uczniów</a></li>
        <li><a href="dziennik.php" class="button">Głowna strona</a></li>
        <li><a href="plan_lekcji.php" class="button">Plan lekcji</a></li>
    </ul>
</div>
   
   
   
    <section>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dziennik1";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Połączenie nieudane: " . $conn->connect_error);
        }

      
        $sql = "SELECT * FROM kursy";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
           
            echo "<table border='1'>";
            echo "<tr><th>ID kursu</th><th>Nazwa kursu</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_kursu"] . "</td>";
                echo "<td>" . $row["Nazwa_kursu"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Brak danych";
        }

        
        $conn->close();
        ?>
    </section>

 
   
</body>

</html>