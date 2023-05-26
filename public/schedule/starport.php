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

  $starport = $pdo->query('SELECT * FROM starport')
    ->fetchAll();

  for ($i = 0; $i < count($starport); $i++) {
    $available_transit_options[$i] = explode(", ", $starport[$i]['available_transit_options']);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Starport locations</title> 
  <!-- Fetch header information -->
  <div id="headContainer"></div>
  <script src="../assets/js/head.js"></script>  
</head>

<body class="antialiased bg-body text-body font-body">
  <div class="">

    <!-- NavBar -->
    <div id="navContainer"></div>
    <script src="../assets/js/navbar.js"></script>

    <!-- Body -->
    <section class="relative py-10 bg-gray-800">
      <div class="container px-4 mx-auto">
        <div class="mb-14 text-center">
          <h2 class="mt-8 text-5xl font-bold font-heading text-white">Starport locations</h2>
          <span class="text-lg text-blue-400 font-bold">
            Note: Some of the coordinates are not final and subject to change.
          </span>
        </div>
        <div class="mb-24 overflow-x-auto overflow-y-hidden">
          <table class="table-auto w-full">
            <thead class="bg-gray-900">
              <tr class="text-gray-200 text-left">
                <th class="font-normal px-8">Location</th>
                <th class="font-normal pr-8">Type</th>
                <th class="font-normal pr-8">Coordinates starport</th>
                <th class="font-normal pr-8">Coordinates starport transit hub</th>
                <th class="font-normal pr-8">Distance (km)</th>
                <th class="font-normal pr-8">Destination city</th>
                <th class="font-normal pr-8">Estimated starport cost</th>
                <th class="font-normal pr-8">Available transit options</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0; foreach ($starport as $location) { ?>
              <tr class="border-b border-gray-500">
                <td class="py-5 text-left">
                  <div class="inline-flex ml-8 items-center">
                    <span
                      class="flex items-center justify-center w-12 h-12 mr-6 rounded-full bg-violet-500 text-white text-lg font-bold">
                      <?= $location['location_starport'][0] ?>
                    </span>
                    <div>
                      <h4 class="text-lg text-white"><?= $location['location_starport'] ?></h4>
                    </div>
                  </div>
                </td>
                <td class="px-4 text-white"><?= $location['type_starport'] ?></td>
                <td class="px-4 text-white"><?= $location['coordinates_starport'] ?></td>
                <td class="px-4 text-white"><?= $location['arrcoordinates_starport_transit_hub'] ?></td>
                <td class="text-white"><?= $location['distance'] ?></td>
                <td class="text-white"><?= $location['destination_city'] ?></td>
                <td class="text-white"><?= $location['estimated_starport_cost'] ?></td>
                <td>
                  <span class="inline-block py-1 px-3 mr-2 text-white bg-blue-500 rounded-lg"><?= $available_transit_options[$i][0] ?></span>
                  <span class="inline-block py-1 px-3 mr-2 text-white bg-violet-500 rounded-lg"><?= $available_transit_options[$i][1] ?></span>
                  <?php if (isset($available_transit_options[$i][2])) { ?>
                    <span class="inline-block py-1 px-3 mr-2 mt-2 text-white bg-yellow-400 rounded-lg"><?= $available_transit_options[$i][2] ?></span>
                  <?php } $i++ ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </section>

    <!-- Footer -->
    <div id="footContainer"></div>
    <script src="../assets/js/footer.js"></script>
</body>

</html>