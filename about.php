<?php
    session_start();
    // echo "wellcome".$_SESSION['user_email'];
    $user = $_SESSION['user_email'];
    if($user == true){

    }
    else{
        header('location:form.php');
    }
?>


<?php
include("dbconnection.php");

// Get the user ID from the URL
$user_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$user_id) {
    echo "User ID not found.";
    exit;
}

// Fetch the email corresponding to the user ID
$query = "SELECT email FROM form1 WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
} else {
    echo "User not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/styleabout.css">
    <title>About</title>
</head>
<body>
    <img src="imagesfile/aboutimage.jpg" alt="aboutimage" height="70%" width="60%">
    <div class="subcontent">
        Any user can get a ticket or pass between <b>Bhusaval</b> to <b>Pune</b>. You can click on the timetable text to see the full timetable.
        <div class="thanks">Thanks to all users for visiting this website.</div>
    </div>
</body>
</html>
