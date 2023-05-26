<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking form</title>
    <!-- Fetch header information -->
    <div id="headContainer"></div>
    <script src="/assets/js/head.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">
    
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

    if (isset($_GET['Sending']) && $_GET['Sending'] == $addME) {
        $name = isset($_GET['name']) ? $_GET['name'] : null;
        $from = isset($_GET['from']) ? $_GET['from'] : null;
        $to = isset($_GET['to']) ? $_GET['to'] : null;
        $date = isset($_GET['date']) ? $_GET['date'] : null;
        $adults = isset($_GET['adults']) ? $_GET['adults'] : null;
        $kids = isset($_GET['kids']) ? $_GET['kids'] : null;
        $number = isset($_GET['number']) ? $_GET['number'] : null;
        $email = isset($_GET['email']) ? $_GET['email'] : null;

        $sql = "INSERT INTO booking (`name`, `from`, `to`, `date`, `adults`, `kids`, `number`, `email`) VALUES ('$name', '$from', '$to', '$date', '$adults', '$kids', '$number', '$email')";

        if (mysqli_query($connection, $sql)) {
            echo "Gegevens zijn succesvol opgeslagen in de database.";
        } else {
            echo "Fout bij het opslaan van gegevens: " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
    ?>

    <div class="">
         <!-- NavBar -->
        <div id="navContainer"></div>
        <script src="../assets/js/navbar.js"></script>
                
        <section class="pt-20 pb-24 2xl:py-40 bg-gray-800">
            <div class="mt-8 mb-16 text-5xl font-bold font-heading text-white text-center">Flight Booking Form</div>
            <form method="GET">
                <div class="flex flex-wrap justify-center items-center mb-4">
                    <div class="flex flex-col items-center mr-8">
                        <label for="from" class="text-white mb-2 text-2xl font-bold font-heading">From</label>
                        <input name="from" type="text" id="from" class="font-bold form-input placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" list="datalistOptions" required placeholder="Type to search...">
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="to" class="text-white mb-2 text-2xl font-bold font-heading">To</label>
                        <input name="to" type="text" id="to" class="font-bold form-input placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" list="datalistOptions" required placeholder="Type to search...">
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

                <div class="flex flex-col items-center">
                    <label for="flight-date" class="text-white mb-2 text-2xl font-bold font-heading">Flight Date (yyyy-mm-dd)</label>
                    <input required name="date" type="text" id="flight-date" class="font-bold form-input mb-4 w-1/4 placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Select flight date...">
                </div>

                <div class="flex flex-wrap justify-center mb-4">
                    <div class="flex flex-col items-center mr-8">
                        <label for="Adults" class="text-white mb-2 text-2xl font-bold font-heading">Adults (18+ Yrs)</label>
                        <input required type="number" id="adults" name="adults" class="font-bold bg-transparent placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" min="0" placeholder="How many adults?">
                    </div>
                    <div class="flex flex-col items-center mr-8">
                        <label for="Kids" class="text-white mb-2 text-2xl font-bold font-heading">children (12-18 Yrs)</label>
                        <input type="number" id="kids" name="kids" class="font-bold bg-transparent placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" min="0" placeholder="How many kids?">
                    </div>
                </div> <br>

                <div class="mt-8 mb-16 text-5xl font-bold font-heading text-white text-center">Personal Information</div>
                <div class="flex flex-wrap justify-center">
                    <div class="flex flex-col items-center mr-8">
                        <label for="name" class="text-white mb-2 text-2xl font-bold font-heading">Name</label>
                        <input required name="name" type="text" id="name" class="font-bold form-input mb-4 bg-transparent placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Enter your name...">
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="phone" class="text-white mb-2 text-2xl font-bold font-heading">Phone Number</label>
                        <input required name="number" type="tel" id="phone" class="form-input mb-4 bg-transparent font-bold placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Enter your number...">
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <label for="email" class="text-white mb-2 text-2xl font-bold font-heading">Email</label>
                    <input required name="email" type="email" id="email" class="form-input mb-4 w-1/4 bg-transparent font-bold placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center" placeholder="Enter your email address...">
                </div> <br>

                <div class="flex justify-center">
                    <button name="Sending" class="block w-full lg:w-auto py-4 px-12 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full transition duration-200" value="<?php echo $addME ?>">Send</button>
                </div>
            </form>
        </section>
      <!-- Footer -->
      <div id="footContainer"></div>
      <script src="../assets/js/footer.js"></script>
    </div>
</body>
</html>
