<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            max-width: 300px;
            width: 100%;
        }
        label, input, small {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post" action="show complaints.php">
        <label for="ID">Your Identity Number:</label>
        <input type="text" id="ID" name="ID" required>
        <small>(Will be hidden for Others)</small>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
