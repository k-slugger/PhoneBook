<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$name=$_POST['username'];
$mob=$_POST['mobno'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO directory (name,mobile)
VALUES('".$name."','".$mob."')";

if (mysqli_query($conn, $sql)) {
    echo "<div>New record created successfully</div>";
} else {
    echo "<div>Error: " . $sql . "<br>" . mysqli_error($conn)."</div>";
}

mysqli_close($conn);
?>