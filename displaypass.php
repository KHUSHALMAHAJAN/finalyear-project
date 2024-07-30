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

// Get the ticket ID from the URL
$ticket_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$ticket_id) {
    echo "Ticket ID not found.";
    exit;
}

// Fetch the ticket details corresponding to the ticket ID
$query = "SELECT * FROM pass WHERE id = '$ticket_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $phone = $row['phone'];
    $email = $row['email'];
    $from = $row['fromrow'];
    $to = $row['torow'];
    $railname = $row['railname'];
    $validity = $row['validity'];
    $randnum = $row['id_num'];
} 
else {
    echo "Ticket not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Pass</title>
    <link rel="stylesheet" href="stylefile/styledisplayticket.css">
</head>
<body>
    <div class="container">
        <div class="flex">
            <img src="imagesfile/raillogo.jpg" alt="Railway Logo">
            <h1>Indian Railway</h1>
        </div>
        <p><img src="<?php echo $photo; ?>" alt="User Photo" height = "100px" width="100px"></p>
        <p>Id Number = <?php echo $randnum; ?></p>
        <p>Name: <?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></p>
        <p>Phone: <?php echo $phone; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>From: <?php echo $from; ?></p>
        <p>To: <?php echo $to; ?></p>
        <p>Rail Name: <?php echo $railname; ?></p>
        <p>Validity: <?php echo $validity; ?> month</p>
        <p id="expiry-date">Expiry Date: </p>
    </div>
    <div class="block bottom">
        Take a screenshot of the pass. Thank you for using Indian Railway Services!
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const validity = '<?php echo $validity; ?>';
            const expiryDateElement = document.getElementById('expiry-date');
            const currentDate = new Date();

            let expiryDate = new Date(currentDate);

            switch (validity) {
                case 'one':
                    expiryDate.setMonth(currentDate.getMonth() + 1);
                    break;
                case 'three':
                    expiryDate.setMonth(currentDate.getMonth() + 3);
                    break;
                case 'six':
                    expiryDate.setMonth(currentDate.getMonth() + 6);
                    break;
                default:
                    expiryDate = null;
            }

            if (expiryDate) {
                const formattedDate = expiryDate.toISOString().split('T')[0];
                expiryDateElement.textContent = 'Expiry Date: ' + formattedDate;
            } else {
                expiryDateElement.textContent = 'Expiry Date: Invalid validity period';
            }
        });
    </script>
</body>
</html>
