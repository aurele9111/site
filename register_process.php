<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your actual database connection details
    $db_host = "sql308.infinityfree.com";
    $db_user = "if0_35865595";
    $db_pass = "Mf5DL2ogTuX";
    $db_name = "if0_35865595_user";

    // Establish database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $email = $_POST["email"]; // Add this line to capture the email

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);
    
    if ($stmt->execute()) {
        session_start();
        $_SESSION["user_id"] = $stmt->insert_id; // Get the ID of the inserted user
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;

        // Redirect to dashboard or another secure page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
