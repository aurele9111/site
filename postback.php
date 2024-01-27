<?php
// Retrieve parameters from the query string
$status = isset($_GET['status']) ? $_GET['status'] : null;
$trans_id = isset($_GET['trans_id']) ? $_GET['trans_id'] : null;
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
$sub_id_1 = isset($_GET['sub_id_1']) ? $_GET['sub_id_1'] : null;
$sub_id_2 = isset($_GET['sub_id_2']) ? $_GET['sub_id_2'] : null;
$amount_local = isset($_GET['amount_local']) ? $_GET['amount_local'] : null;
$amount_usd = isset($_GET['amount_usd']) ? $_GET['amount_usd'] : null;
$ip_click = isset($_GET['ip_click']) ? $_GET['ip_click'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$secure_hash = isset($_GET['hash']) ? $_GET['hash'] : null;

// Your App's secret hash
$app_secure_hash = "yourappsecurehash";

// Calculate the expected hash
$expected_hash = 'md5('. $trans_id. '-' . $app_secure_hash.')';

// Validate the hash
if ($secure_hash === $expected_hash) {
    // Hash is valid, proceed with processing the postback

    // Check if the IP address is in the whitelist
    $whitelisted_ips = array('188.40.3.73', '2a01:4f8:d0a:30ff::2', '157.90.97.92','84.99.48.16');
    $client_ip = $_SERVER['REMOTE_ADDR'];

    if (in_array($client_ip, $whitelisted_ips)) {
        // IP is whitelisted, continue processing
        // Database configuration
        $servername = "sql308.infinityfree.com"; // Change to your database host
        $username = "if0_35865595"; // Change to your database username
        $password = "Mf5DL2ogTuX"; // Change to your database password
        $dbname = "if0_35865595_user"; // Change to your database name

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query to insert data into the database
        $sql = "INSERT INTO postbacks (status, trans_id, user_id, sub_id_1, sub_id_2, amount_local, amount_usd, ip_click, type)
                VALUES ('$status', '$trans_id', '$user_id', '$sub_id_1', '$sub_id_2', '$amount_local', '$amount_usd', '$ip_click', '$type')";

        if ($conn->query($sql) === TRUE) {
            echo "Postback received successfully and data inserted into the database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        // IP is not whitelisted
        echo "Error: IP address not whitelisted.";
    }
} else {
    // Hash is not valid, the request might be fraudulent
    echo "Error: Invalid hash. The request may be fraudulent.";
}
?>
