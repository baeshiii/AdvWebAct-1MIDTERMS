<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        header {
            background-color: #333;
            padding: 15px 0;
            width: 100%;
            text-align: center;
        }

        .container {
            width: 80%;
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #333;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #444;
            text-align: left;
            padding: 12px;
            white-space: nowrap;
        }

        th {
            background-color: #2196F3;
            color: #fff;
        }

        .edit-link, .delete-link {
            text-decoration: none;
            color: #2196F3;
            font-weight: bold;
            cursor: pointer;
            margin-right: 10px;
        }

        .edit-link:hover {
            color: #64B5F6;
        }

        .delete-link:hover {
            color: #f44336;
        }

        .register-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px;
            background-color: #2196F3;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }

        .register-button:hover {
            background-color: #1565C0;
        }

        .container p {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Display Information</h1>
    </header>

    <a class='register-button' href='record.php'>Register Another Data</a>

    <div class='container'>
        <?php
        $dbConnection = new mysqli("localhost", "root", "", "dbValidation");
        if ($dbConnection->connect_error) {
            die("Connection Failed" . $dbConnection->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $deleteId = $_GET["id"];
            $deleteSql = "DELETE FROM validate WHERE id = $deleteId";
            if ($dbConnection->query($deleteSql) !== TRUE) {
                echo "<p style='color: red;'>Error deleting record: " . $dbConnection->error . "</p>";
            }
        }

        $selectSql = "SELECT id, name, middle, last, email, gender, address, phone FROM validate";
        $result = $dbConnection->query($selectSql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Middle Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Address</th><th>Phone Number</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['middle']}</td>";
                echo "<td>{$row['last']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td><a class='edit-link' href='edit_form.php?id={$row['id']}'>Edit</a>";
                echo "<a class='delete-link' href='display_info.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No records found</p>";
        }

        $dbConnection->close();
        ?>
    </div>
</body>
</html>
