<?php
// Replace the database connection details with your own
$host = '127.0.0.1';
$database = 'luckyfluxx';
$username = 'bit_academy';
$password = 'bit_academy';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query1 = $pdo->query("SELECT * FROM info ORDER BY id DESC LIMIT 1");
    $query2 = $pdo->query("SELECT * FROM flight ORDER BY id DESC LIMIT 1");
    $data1 = $query1->fetchAll(PDO::FETCH_ASSOC);
    $data2 = $query2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $pdoex) {
    $message = $pdoex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking form</title>
    <!-- Fetch header information -->
    <div id="headContainer"></div>
    <script src="/assets/js/head.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">
    <div class="bg-gradient-to-tl from-blue-700 to-black">
        <!-- NavBar -->
        <div id="navContainer"></div>
        <script src="../assets/js/navbar.js"></script>

        <div class="ml-20 mb-72">
            <p class="text-8xl pt-16 pb-2 font-bold text-transparent bg-clip-text bg-gradient-to-bl from-yellow-200 to-orange-600">Booking overview</p>

            <p class="text-4xl mt-8 text-blue-600 ">Flight information</p>
            <?php foreach ($data2 as $row) { ?>
                <div class="text-white text-2xl">
                    <div>
                    <p><?= "From: " . $row["from"]; ?></p>
                    <p><?= "To: " . $row["to"]; ?></p>
                    <p><?= "Date: " . $row["date"]; ?></p>
                    <p><?= "Time: " . $row["time"]; ?></p>
                    </div>
                </div>
            <?php } ?>

            <p class="text-4xl mt-8 text-blue-600 ">Personal information</p>

            <?php foreach ($data1 as $row) { ?>
                <div class="text-white text-2xl">
                    <div><h2><?= "Name: " . $row["firstname"] ." ".  $row["lastname"]; ?></h2>
                    <p><?= "Phone:     " . $row["phone"]; ?></p>
                    <p><?="Email:  " . $row["email"]; ?></p>
                    <p><?= "Address: " . $row["address"]; ?></p>
                    </div>
                </div>
            <?php } ?>
            <img class="block absolute h-128 bottom-0 right-0 z-10" src="../assets/images/raket.png" alt="">
        </div>
        

        <!-- Footer -->
        <div id="footContainer"></div>
        <script src="../assets/js/footer.js"></script>
    </div>
</body>
</html>