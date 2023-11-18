<?php
$dbConnection = new mysqli("localhost", "root", "", "dbValidation");
if ($dbConnection->connect_error) {
    die("Connection Failed" . $dbConnection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userFirstName = $_POST["firstname"];
    $userMiddleName = $_POST["middlename"];
    $userLastName = $_POST["lastname"];
    $userEmail = $_POST["email"];
    $userGender = $_POST["gender"];
    $userAddress = $_POST["address"];
    $userPhone = $_POST["phone"];

    // Check for duplicate data
    $duplicateCheckSql = "SELECT id FROM validate WHERE name='$userFirstName' AND middle='$userMiddleName' AND last='$userLastName' OR email='$userEmail' OR phone='$userPhone'";
    $duplicateResult = $dbConnection->query($duplicateCheckSql);

    if ($duplicateResult->num_rows > 0) {
        echo "<script>alert('A Duplicate data is detected.'); window.location='display_info.php';</script>";
    } else {
        // Insert data into the database
        $insertSql = "INSERT INTO validate (name, middle, last, email, gender, address, phone) 
                        VALUES ('$userFirstName', '$userMiddleName', '$userLastName', '$userEmail', '$userGender', '$userAddress', '$userPhone')";

        if ($dbConnection->query($insertSql) === TRUE) {
            header("Location: display_info.php");
            exit();
        } else {
            echo "Error: " . $insertSql . "<br>" . $dbConnection->error;
        }
    }
}

$dbConnection->close();
?>
