<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #222;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            text-align: left;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fff;
            color: #333;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Form</h2>

        <?php
        $dbConnection = new mysqli("localhost", "root", "", "dbValidation");
        if ($dbConnection->connect_error) {
            die("Connection Failed" . $dbConnection->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $editId = $_GET["id"];
            $selectSql = "SELECT * FROM validate WHERE id = $editId";
            $result = $dbConnection->query($selectSql);

            if ($result->num_rows == 1) {
                $editRow = $result->fetch_assoc();
        ?>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">

            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" value="<?php echo $editRow['name']; ?>" required>

            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" value="<?php echo $editRow['middle']; ?>">

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $editRow['last']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $editRow['email']; ?>" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male" <?php echo ($editRow['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($editRow['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo ($editRow['gender'] === 'other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" required><?php echo $editRow['address']; ?></textarea>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" value="<?php echo $editRow['phone']; ?>" required>

            <input type="submit" value="Update">
        </form>

        <?php
            } else {
                echo "Record not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $dbConnection->close();
        ?>
    </div>
</body>
</html>
