<?php
session_start();

// Replace these values with your SurveyWall configuration
$app_id = "21558"; // Your App ID
$secure_hash = md5($_SESSION["user_id"] . '-your_app_secure_hash');
$user_name = $_SESSION["username"];
$email = $_SESSION["email"]; // You can use the user's email if available

// SurveyWall FRAME integration code
?>
<iframe width="100%" frameborder="0" height="100%" src="https://offers.cpx-research.com/index.php?app_id=<?php echo $app_id; ?>&ext_user_id=<?php echo $_SESSION["user_id"]; ?>&secure_hash=<?php echo $secure_hash; ?>&username=<?php echo $user_name; ?>&email=<?php echo $email; ?>&subid_1=&subid_2"></iframe>
