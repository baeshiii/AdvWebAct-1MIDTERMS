<?php
$dbConnection = new mysqli("localhost", "root", "", "dbValidation");
if ($dbConnection->connect_error) {
    die("Connection Failed" . $dbConnection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $userAddress = $_POST["address"];
    $userPhone = $_POST["phone"];

    $duplicateCheckSql = "SELECT id FROM validate WHERE name='$firstName' AND middle='$middleName' AND last='$lastName' OR email='$email' OR phone='$userPhone'";
    $duplicateResult = $dbConnection->query($duplicateCheckSql);

    if ($duplicateResult->num_rows > 0) {
        echo "<script>alert('A Duplicate data is detected.'); window.location='record.php';</script>";
    } else {
        $insertSql = "INSERT INTO validate (name, middle, last, email, gender, address, phone) 
                        VALUES ('$firstName', '$middleName', '$lastName', '$email', '$gender', '$userAddress', '$userPhone')";

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
