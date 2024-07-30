<?php
    session_start();
    $user = $_SESSION['user_email'];
    if($user == true){

    }
    else{
        header('location:form.php');
    }
?>

<?php
include("dbconnection.php");

// Get the ticket ID from the URL
$ticket_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$ticket_id) {
    echo "Ticket ID not found.";
    exit;
}

// Fetch the ticket details corresponding to the ticket ID
$query = "SELECT * FROM railwayticket WHERE id = '$ticket_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $from = $row['fromrow'];
    $to = $row['torow'];
    $railname = $row['railname'];
    $randnum = $row['id_num'];
} else {
    echo "Ticket not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ticket</title>
    <link rel="stylesheet" href="stylefile/styledisplayticket.css">
</head>
<body>
    <div class="container">
        <div class="flex">
            <img src="imagesfile/raillogo.jpg" alt="raillogo">
            <h1>Indian Railway</h1>
        </div>
        <p>Id Number: <?php echo $randnum; ?></p>
        <p>From: <?php echo $from; ?></p>
        <p>To: <?php echo $to; ?></p>
        <p>Railname: <?php echo $railname; ?></p>
        <p id="datetime"></p>
        <script>
            const d = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById("datetime").innerHTML = d.toLocaleDateString('en-US', options);
        </script>
    </div>
    <div class="bottom">
        Take a screenshot of your ticket. Thank you for using Indian Railway Services!
    </div>
</body>
</html>
