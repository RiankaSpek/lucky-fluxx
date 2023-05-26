<?php 
    // Replace the database connection details with your own
    global $database;
    global $pdoex;

    $host = '127.0.0.1';
    $database = 'luckyfluxx';
    $username = 'bit_academy';
    $password = 'bit_academy';
    $charset = 'utf8mb4';

    try {
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $pdoex) {
        echo "Connection fail: " . $pdoex->getMessage();
    }
    
    if (isset($_GET['sort'])) {
        $column = trim(strip_tags($_GET['sort']));
        $orderby = "ORDER BY $column";
    } else {
        $orderby = "";
    }

    $result = $pdo->query('SELECT * FROM schedule')
        ->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lucky Fluxx</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/tailwind/tailwind.min.css">
    <script src="../assets/js/main.js"></script>
</head>

<body class="antialiased bg-body text-body font-body">
  <div class="">
    <!-- NavBar -->
        <div id="navContainer"></div>
        <script src="../assets/js/navbar.js"></script>
    <table>
            <tr> 
                <th><?= "Departure Location" ?></th>
                <th><?= "Arrival Location" ?></th>
                <th><?= "Departure Time" ?></th>
                <th><?= "Arrival Time" ?></th>
                <th><?= "Duration" ?></th>
                <th><?= "Available Seats" ?></th>
                <th><?= "Total Seats" ?></th>
                <th><?= "Maintenance Time" ?></th>
                <th><?= "Departure Type" ?></th>
                <th><?= "Transit Options" ?></th>
            </tr>

    <?php foreach ($result as $value) {?>
        <tr>            
                <td><?= $value['departure_location'] ?></td>
                <td><?= $value['arrival_location'] ?></td>
                <td><?= $value['departure_time'] ?></td>
                <td><?= $value['arrival_time'] ?></td>
                <td><?= $value['duration'] ?></td>
                <td><?= $value['available_seats'] ?></td>
                <td><?= $value['total_seats'] ?></td>
                <td><?= $value['maintenance_time'] ?></td>
                <td><?= $value['departure_type'] ?></td>
                <td><?= $value['transit_options'] ?></td>
            </tr>
    <?php } ?>
    </table>    
    
    <!-- Footer -->
    <div id="footContainer"></div>
    <script src="../assets/js/footer.js"></script>
</body>

</html>