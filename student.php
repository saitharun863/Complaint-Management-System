<!DOCTYPE html>
<html>
<head>
    <title>Complaint Management System</title>
    <script>
        function moveToNextPage(url) {
            window.location.href = url;
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lavender;
            text-align: center;
            padding: 20px;
        }
        .button-container {
            margin: 20px 0;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;

        }
    </style>
</head>
<body>
    <h1>Complaint Management System</h1>
    <div class="button-container">
        <button onclick="moveToNextPage('fileacomplaint.php')">File a Complaint</button><br><br>
        <button onclick="moveToNextPage('show complaints1.php')">Show Your Complaint</button><br><br>
        <button onclick="moveToNextPage('deleteacomplaint.php')">Delete a Complaint</button>
    </div>
</body>
</html>
