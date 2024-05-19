<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lavender;
            padding: 20px;
        }
        .complaint-form {
            background-color: lightyellow;
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            margin: 0 auto;
        }
        .complaint-form h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    $ID = $_POST["ID"];

    $conn = new mysqli("localhost", "root", "", "CMS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO complaints (ID,subject, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $ID, $subject, $description);

    if ($stmt->execute()) {
        header("Location: complaint_confirm.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>

    <div class="complaint-form">
        <h2>File a Complaint</h2>
        <form method="post">
	    <p>
                <label for="ID">Your Identity Number:</label><br>
                <input type="text" id="ID" name="ID" required>(Will be hidden for Others)
            </p>
            <p>
                <label for="subject">Subject:</label><br>
                <input type="text" id="subject" name="subject" required>
            </p>
            <p>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="8" required></textarea>
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
        </form>
    </div>

</body>
</html>

