<?php

    function generateCalendar($month, $year) {
        // Create an array to store the calendar
        $calendar = array();

        // Get the number of days in the specified month and year
        $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Loop through each day
        for ($day = 1; $day <= $numDays; $day++) {
            // Get the weekday of the current day
            $weekday = date('N', strtotime("$year-$month-$day"));

            // Store the day in the calendar array
            $calendar[$day] = $weekday;
        }

        // Return the calendar array
        return $calendar;
    }

    $host = 'localhost';
    $username = 'bit_academy';
    $password = 'bit_academy';
    $dbname = 'LuckyFluxx';

    // Create a database connection
    $connection = mysqli_connect($host, $username, $password, $dbname);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the database
    $query = "SELECT * FROM schedule";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query execution failed: " . mysqli_error($connection));
    }
    // Generate arrays for the dropdown menus
    $years = range(2023, 2040);
    $months = range(1, 12);
    $days = range(1, 31);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Starport locations</title>
    <!-- Fetch header information -->
    <div id="headContainer"></div>
    <script src="/assets/js/head.js"></script>
</head>

<body class="antialiased bg-body text-body font-body">
    <script>
    // JavaScript code for handling the date selection
    document.addEventListener("DOMContentLoaded", function() {
        var calendarDays = document.querySelectorAll("table td a");
        Array.from(calendarDays).forEach(function(day) {
            day.addEventListener("click", function(event) {
                event.preventDefault();
                var selectedDay = this.innerHTML;
                var selectedMonth = <?php echo $month; ?>;
                var selectedYear = <?php echo $year; ?>;
                console.log("Selected Date: " + selectedYear + "-" + selectedMonth + "-" +
                    selectedDay);
                // You can perform additional actions here based on the selected date
            });
        });
    });
    </script>

    <div class="">
        <!-- NavBar -->
        <div id="navContainer"></div>
        <script src="../assets/js/navbar.js"></script>

        <!-- Body -->
        <section class="relative py-10 bg-gray-800 pb-20">
            <div class="container px-4 mx-auto">
                <div class="mb-14 text-center">
                    <h2 class="mt-8 text-5xl font-bold font-heading text-white">Flights</h2>
                    <span class="mt-4 text-lg text-blue-400 font-bold">
                        Note: Some of the flights are not final and subject to change.
                    </span>
                </div>

                <!-- Display the form with dropdown menus -->
                <form class="flex justify-center p-2" method="post" action="">
                    <input required name="date" type="date" id="flight-date"
                        class="font-bold form-input mb-4 w-1/4 placeholder-gray-900 rounded-r-full focus:outline-none bg-white rounded-full text-center py-2 px-4"
                        placeholder="Select flight date...">
                    <button class="text-white py-2 px-4" type="submit">Submit</button>
                </form>

                <!-- Display the table -->
                <div class="mb-24 overflow-x-auto overflow-y-hidden border-t-2 border-b-2 border-yellow-500 mt-2">
                    <table class="table-auto w-full">
                        <thead class="bg-gray-900">
                            <tr class="text-gray-200 text-left">
                                <th class="font-normal pr-8">Departure Location</th>
                                <th class="font-normal pr-8">Arrival Location</th>
                                <th class="font-normal pr-8">Departure Time</th>
                                <th class="font-normal pr-8">Arrival Time</th>
                                <th class="font-normal pr-8">Duration</th>
                                <th class="font-normal pr-8">Available Seats</th>
                                <th class="font-normal pr-8">Total Seats</th>
                                <th class="font-normal pr-8">Maintenance Time</th>
                                <th class="font-normal pr-8">Departure Type</th>
                                <th class="font-normal pr-8">Transit Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) {?>
                            <tr class="border-b border-gray-500">
                                <td class="py-5 text-white"><?= $row['departure_location'] ?></td>
                                <td class="px-4 text-white"><?= $row['arrival_location']?></td>
                                <td class="px-4 text-white"><?= $row['departure_time']?></td>
                                <td class="text-white"><?= $row['arrival_time']?></td>
                                <td class="text-white"><?= $row['duration']?></td>
                                <td class="text-white"><?= $row['available_seats']?></td>
                                <td class="text-white"><?= $row['total_seats']?></td>
                                <td class="text-white"><?= $row['maintenance_time']?></td>
                                <td class="text-white"><?= $row['departure_type']?></td>
                                <td class="text-white"><?= $row['transit_options']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Close the database connection -->
                <?php mysqli_close($connection); ?>
        </section>

        <!-- Footer -->
        <div id="footContainer"></div>
        <script src="../assets/js/footer.js"></script>
    </div>
</body>

</html>