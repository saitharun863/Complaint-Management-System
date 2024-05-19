<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lavender;
            padding: 10px;
        }
        table {
            margin: 0 auto;
            text-align: center;
        }
        .left-login {
            background-color: lightblue; 
            padding: 50px;
            border-radius: 30px; 
        }
        .right-login {
            background-color: lightgreen; 
            padding: 50px;
            border-radius: 30px;
        }
    </style>
</head>
<body>


<table cellpadding="20" cellspacing="50">
    <tr>
        <td colspan="2" align="center"><h1>ONLINE COMPLAINT BOX</h1></td>
    </tr>
    <tr>
        <td class="left-login">
            <form method="post">
                <h3><u><b>ADMIN LOGIN</b></u></h3>
                <p>Login ID:<input type="text" name="aloginid" placeholder="Login ID"></p>
                <p>Password:<input type="password" name="apassword" placeholder="Password"></p>
                <p><input type="submit" value="Login"></p>
            </form>
        </td>
        <td class="right-login">
            <form method="post">
                <h3><u><b>STUDENT LOGIN</b></u></h3>
                <p>Login ID:<input type="text" name="sloginid" placeholder="Login ID"></p>
                <p>Password:<input type="password" name="spassword" placeholder="Password"></p>
                <p><input type="submit" value="Login"></p>
            </form>
        </td>
    </tr>
</table>
</body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = new mysqli("localhost", "root", "", "CMS");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if (isset($_POST['aloginid']) && isset($_POST['apassword'])) 
	{  
	// Checking if admin login is submitted
        $aloginid = $_POST['aloginid'];
        $apassword = $_POST['apassword'];
        
        $sql = "SELECT * FROM adminverifcation WHERE aloginid1 = ? AND apassword1 = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $aloginid, $apassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<center>Invalid Admin Credentials</center>";
        }
    } 
	
	elseif (isset($_POST['sloginid']) && isset($_POST['spassword'])) 
	{  
	// Checking if student login is submitted
        $sloginid = $_POST['sloginid'];
        $spassword = $_POST['spassword'];
        
        $sql = "SELECT * FROM studentverifcation WHERE sloginid1 = ? AND spassword1 = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $sloginid, $spassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            header("Location: student.php");
            exit;
        } else {
            echo "Invalid Student Credentials";
        }
    }

    $stmt->close();
    $con->close();
}
?>

</html>
