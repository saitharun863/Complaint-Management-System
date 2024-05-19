<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Complaint Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lavender;
            text-align: center;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Admin Complaint Viewer</h1>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Date Submitted</th>
		<th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to retrieve complaints and populate the table -->
            <?php
                // Connect to the database and retrieve complaints
                $con = new mysqli("localhost", "root", "", "CMS");

                // Check connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // Query to select complaints
                $sql = "SELECT * FROM complaints";
                $result = $con->query($sql);

                // Output data of each row
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["subject"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
			echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found.</td></tr>";
                }

		$upd = "update complaints set status='viewed' where status='unviewed'";
		$con->query($upd);

                // Close the database connection
                $con->close();
            ?>
        </tbody>
    </table>
</body>
</html>
