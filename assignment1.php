<?php
// Function to calculate age based on the date of birth
function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate);
    return $age->y; // Returns the difference in years
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture user inputs from the form
    $name = htmlspecialchars($_POST['name']);
    $dob = $_POST['dob'];
    $address = htmlspecialchars($_POST['address']);
    
    // Calculate age using the DOB
    $age = calculateAge($dob);
    
    // Display welcome message with age
    echo "<h2>Welcome home, $name!</h2>";
    echo "<p>Your address is: $address</p>";
    echo "<p>You are $age years old today.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Script</title>
</head>
<body>
    <!-- Form to collect user input -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="address">Home Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>