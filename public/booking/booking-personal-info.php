<?php
$addME = "Next";
$info = false;

if (isset($_GET['Next']) && $_GET['Next'] == $addME) {
    $firstname = isset($_GET['firstname']) ? $_GET['firstname'] : null;
    $lastname = isset($_GET['lastname']) ? $_GET['lastname'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $phone = isset($_GET['phone']) ? $_GET['phone'] : null;
    $street = isset($_GET['street']) ? $_GET['street'] : null;
    $housenum = isset($_GET['house-num']) ? $_GET['house-num'] : null;
    $city = isset($_GET['city']) ? $_GET['city'] : null;
    $address = isset($_GET['address']) ? $_GET['address'] : null;

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

        $sql = "INSERT INTO info (`firstname`, `lastname`, `email`, `phone`, `street`, `house_num`, `city`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $phone, $street, $housenum, $city, $address]);

        $info = true;

        // Data is succesvol opgeslagen in de database
        // Voer hier de redirect uit
        header("Location: booking-overview.php");
        exit(); // Verlaat de huidige scriptuitvoering om te voorkomen dat de rest van de pagina wordt geladen
    } catch (PDOException $pdoex) {
        echo "Error saving data: " . $pdoex->getMessage();
    }

    if ($info == true) {
      header("Location: /booking/booking-overview.php");
  }
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
    <!-- NavBar -->
    <div id="navContainer"></div>
    <script src="../assets/js/navbar.js"></script>

    <!-- Body -->
    <section class="relative py-10 overflow-hidden bg-gradient-to-l from-blue-600 to-yellow-500">
        <div class="absolute top-0 left-0 lg:bottom-0 h-full w-10/12 bg-gray-800 lg:overflow-hidden">
          <img class="block mt-64 ml-112" src="../assets/zospace-assets/lines/circle.svg" alt="">
        </div>
        <img class="block absolute h-128 bottom-0 right-0 z-10" src="../assets/zospace-assets/images/men-stars.png" alt="">
        <img class="block absolute w-96 bottom-0 right-0 mr-64 mb-24" src="../assets/zospace-assets/lines/purple-line.svg" alt="">
        <div class="relative container px-4 mx-auto">
          <span class="text-lg text-blue-400 font-bold">A little more about you</span>
          <h2 class="mt-8 mb-16 text-5xl font-bold font-heading text-white">Personal information</h2>
          <form method="GET" action="#">
            <div class="max-w-2xl flex flex-wrap -mx-4 mb-3">
              <div class="w-1/2 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="firstname" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="First name">
                </div>
              </div>
              <div class="w-1/2 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="lastname" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Last name">
                </div>
              </div>
              <label class="w-full pl-8 pb-2 text-white">Address</label>
              <div class="w-3/4 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="street" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Street name">
                </div>
              </div>
              <div class="w-1/4 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="house-num" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Nr">
                </div>
              </div>
              <div class="w-1/3 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="address" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Postal code">
                </div>
              </div>
              <div class="w-2/3 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="city" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="City">
                </div>
              </div>
              <label class="w-full pl-8 pb-2 text-white">Contact information</label>
              <div class="w-1/2 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="email" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Email address">
                </div>
              </div>
              <div class="w-1/2 px-4">
                <div class="flex items-center pl-6 mb-3 bg-white rounded-full">                  
                  <input required name="phone" class="pr-6 pl-4 py-4 font-bold bg-transparent placeholder-gray-900 rounded-r-full" type="text" placeholder="Phone number">
                </div>
              </div>
              <div class="inline-flex pl-4">
                <input required class="mr-4" type="checkbox">
                <p class="-mt-1 text-sm text-gray-200">I agree with the <a class="text-gray-100 hover:text-white" href="/terms-of-service.html" target="_blank">Terms of service</a> and <a class="text-gray-100 hover:text-white" href="/policy.html" target="_blank"> Data Policy.</a></p>
              </div>
              <div class="w-full px-4 mt-12">
                <input name="Next" value="Next" placeholder="Next" type="submit" class="block w-full lg:w-auto py-4 px-12 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full transition duration-200">
              </div>
            </div>
          </form>
        </div>
      </section>

      <!-- Fetch footer information -->
      <div id="footerContainer"></div>
      <script src="../assets/js/footer.js"></script>
    </body>
</html>
