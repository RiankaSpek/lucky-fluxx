<?php
    $host = 'localhost';
    $username = 'bit_academy';
    $password = 'bit_academy';
    $dbname = 'LuckyFluxx';

    // Create a database connection
    $connection = mysqli_connect($host, $username, $password, $dbname);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $addME = "Toevoegen";
    $info = false;

    if (isset($_POST['Toevoegen']) && $_POST['Toevoegen'] == $addME) {
        $from = isset($_POST['from']) ? $_POST['from'] : null;
        $to = isset($_POST['to']) ? $_POST['to'] : null;
        $date = isset($_POST['date']) ? $_POST['date'] : null;
        $time = isset($_POST['time']) ? $_POST['time'] : null;
        // $adults = isset($_POST['adults']) ? $_POST['adults'] : null;
        // $kids = isset($_POST['kids']) ? $_POST['kids'] : null;
    
        // Convert date format from "d-m-y" to "Y-m-d"
        $date = date('Y-m-d', strtotime($date));
    
        $sql = "INSERT INTO flight (`from`, `to`, `date`, `time`) VALUES ('$from', '$to', '$date', '$time')";
        $info = true;

        if (mysqli_query($connection, $sql)) {
            // Data is succesvol opgeslagen in de database
            // Voer hier de redirect uit
            header("Location: booking-personal-info.php");
            exit(); // Verlaat de huidige scriptuitvoering om te voorkomen dat de rest van de pagina wordt geladen
        } else {
            echo "Error saving data: " . mysqli_error($connection);
        }

    }

    mysqli_close($connection);  

    if ($info == true) {
        header("Location: /booking/booking-personal-info.php");
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
<body class="antialiased bg-body text-body font-body bg-gray-800">
    <div class="">
         <!-- NavBar -->
        <div id="navContainer"></div>
        <script src="../assets/js/navbar.js"></script>

        <!-- Booking form -->
        <section class="grid grid-cols-2 gap-4 py-20 overflow-hidden bg-gradient-to-l from-blue-800 to-black-500">
            <img class="block absolute h-128 bottom-0 left-0 z-10" src="../assets/images/rocket.png" alt="">
            <div class="w-1/3"></div>
            <div class="px-4 mx-auto">          
                <h2 class="mt-8 mb-2 text-5xl font-bold font-heading text-white">Book your flight</h2>
                <span class="text-lg text-blue-400 font-bold">Let's get you going</span>
                <form method="POST" action="#">
                    <div class="flex flex-wrap justify-center mt-8 mb-4">
                        <div class="flex flex-col mr-8">
                            <label for="from" class="text-white mb-2 text-2xl font-bold font-heading">From</label>
                            <input required name="from" type="text" id="from" class="p-3 font-bold form-input placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" list="datalistOptions" placeholder="Type to search...">
                        </div>
                        <div class="flex flex-col">
                            <label for="to" class="text-white mb-2 text-2xl font-bold font-heading">To</label>
                            <input required name="to" type="text" id="to" class="p-3 font-bold form-input placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" list="datalistOptions" placeholder="Type to search...">
                        </div>
                    </div>
                    <datalist id="datalistOptions">
                        <option value="Amsterdam"></option>
                        <option value="New York"></option>
                        <option value="Sydney"></option>
                        <option value="Tokyo"></option>
                        <option value="Dubai"></option>
                        <option value="Singapore"></option>
                        <option value="Hong Kong"></option>
                        <option value="Los Angeles"></option>
                        <option value="Rio de Janeiro"></option>
                        <option value="Cape Town"></option>
                        <option value="Barcelona"></option>
                        <option value="Rome"></option>
                    </datalist>
                    <div class="flex flex-wrap justify-between mt-8 mb-4">
                        <div class="flex flex-col w-2/3 pr-4">
                            <label for="flight-date" class="text-white mb-2 text-2xl font-bold font-heading">Flight Date</label>
                            <input required name="date" type="date" id="flight-date" class="p-3 font-bold form-input mb-4 placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Select flight date...">
                        </div>

                        <div class="flex flex-col w-1/3">
                            <label for="flight-time" class="text-white mb-2 text-2xl font-bold font-heading">Flight Time</label>
                            <input required name="time" type="time" id="flight-time" class="p-3 font-bold form-input mb-4 placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Select flight date...">
                        </div>
                    </div>
    <!--
                    <div class="flex flex-wrap justify-center mb-4">
                        <div class="flex flex-col items-center mr-8">
                            <label for="Adults" class="text-white mb-2 text-2xl font-bold font-heading">Adults (18+ Yrs)</label>
                            <input required type="number" id="Adults" name="adults" class="font-bold bg-transparent placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" min="0" placeholder="How many adults?">
                        </div>
                        <div class="flex flex-col items-center mr-8">
                            <label for="Kids" class="text-white mb-2 text-2xl font-bold font-heading">Children (12-18 Yrs)</label>
                            <input type="number" id="Kids" name="kids" class="font-bold bg-transparent placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" min="0" placeholder="How many children?">
                        </div>
                    </div> <br>
    -->
                    <div class="flex justify-center mt-8">
                        <button name="Toevoegen" class="block w-auto py-4 px-12 mb-40 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full transition duration-200" value="<?php echo $addME ?>">Check availability</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <div id="footContainer"></div>
        <script src="../assets/js/footer.js"></script>
    </div>
</body>
</html>
