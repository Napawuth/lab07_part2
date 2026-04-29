<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
        function clean_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $firstname = clean_input($_POST["firstname"]);
            $lastname = clean_input($_POST["lastname"]);
            $species = clean_input($_POST["species"]);
            $age = clean_input($_POST["age"]);
            $mealPreference = clean_input($_POST["food"]);
            $nuberOfTraveller = clean_input($_POST["partysize"]);

            $tourMessage = "You are now booked on the ";
            $tours=[];
            if (isset($_POST["accom"])) $tours[] = "Accommodation";
            if (isset($_POST["4day"])) $tours[] = "Four-day tour";
            if (isset($_POST["10day"])) $tours[] = "Ten-day tour";
            $tourMessage .= implode(" and ", $tours);

            $speciesFull ="";
            if ($species == "H") $speciesFull = "Hobbit";
            if ($species == "D") $speciesFull = "Dwarf";
            if ($species == "E") $speciesFull = "Elf";
            if ($species == "M") $speciesFull = "Human";

            echo "<p>Welcome " . $firstname . " " . $lastname . "!</p>";
            echo $tourMessage;
            echo "<p>Species: " . $speciesFull . "</p>";
            echo "<p>Age: " . $age . "</p>";
            echo "<p>Meal Preference: " . $mealPreference . "</p>";
            echo "<p>Number of travellers: " . $nuberOfTraveller . "</p>";
        }

    ?>
</body>
</html>