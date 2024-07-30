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

<?php include("dbconnection.php");

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
    <link rel="stylesheet" href="stylefile/styleticket.css">
    <title>Ticket</title>
</head>
<body>
    <div class="contain">
        <h3>Ticket</h3>
        <form action="" method="post">
            <div class="input-field">
                <label for="from">From:</label>
                <select name="from" id="from" onchange="updatePrice()">
                    <option value="not select">From</option>
                    <option value="bhusaval">Bhusaval</option>
                    <option value="jalgaon">Jalgaon</option>
                    <option value="chalisgon">Chalisgon</option>
                    <option value="manmad">Manmad</option>
                    <option value="nashik">Nashik</option>
                    <option value="devdali">Devdali</option>
                    <option value="khandwa">Khandwa</option>
                    <option value="pune">Pune</option>
                </select> 
            </div>
            <div class="input-field">
                <label for="to">To:</label>
                <select name="to" id="to" onchange="updatePrice()">
                    <option value="not select">To</option>
                    <option value="bhusaval">Bhusaval</option>
                    <option value="jalgaon">Jalgaon</option>
                    <option value="chalisgon">Chalisgon</option>
                    <option value="manmad">Manmad</option>
                    <option value="nashik">Nashik</option>
                    <option value="devdali">Devdali</option>
                    <option value="khandwa">Khandwa</option>
                    <option value="pune">Pune</option>
                </select> 
            </div>
            <div class="input-field">
                <label for="railname">Rail Name:</label>
                <select name="railname" id="railname">
                    <option value="not select">Select Rail</option>
                </select> 
            </div>
            <div class="input-field">
                <div class="price" id="price">Price: 0</div>
            </div>
            <div class="input-field">
                <input type="submit" value="Submit" class="btn" name="submit">
            </div>
        </form>
    </div>
    <script src="ticketjs.js"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $railname = $_POST['railname'];
    $randnum = (rand(1,100));

    if ($from == "not select" || $to == "not select" || $railname == "not select") {
        echo "<script>alert('Please select From, To, and Rail options.');</script>";
    } else {
        // Insert the ticket details into the railwayticket table
        $query = "INSERT INTO railwayticket (email, fromrow, torow, railname, id_num) VALUES ('$email', '$from', '$to', '$railname','$randnum')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            // Get the last inserted ID
            $last_id = mysqli_insert_id($conn);
            // echo "<script>alert('Record stored successfully.');</script>";
            echo "<script>window.location.href='displayticket.php?id=$last_id';</script>";
        } else {
            echo "Data not stored. Error: " . mysqli_error($conn);
        }
    }
}
?>
