<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `email`, `phone`, `subject`, `message`, `dt`) VALUES ('$name', '$email', '$phone', '$subject', '$message', current_timestamp());";
    
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
            echo "ERROR: $sql <br> $con->error";
        }
    
    $con->close();
}
    header("Location: index.html");
?>
