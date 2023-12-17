<?php
include('../includes/conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["firstname"]." ".$_POST['lastname']);
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = mysqli_real_escape_string($conn,$_POST["message"]);

    // Perform database insertion
    $sql = mysqli_query($conn, "INSERT INTO `contact_us`( `name`, `email`, `phone_no`, `message`) VALUES('$name','$email',' $number','$message')");

    if ($sql) {
        header("location: ../contact.php?FormSubmit=true");
    }else{
        header("location: ../contact.php?FormSubmit=false");
    }

    // Close database connection
    $conn->close();
}
?>