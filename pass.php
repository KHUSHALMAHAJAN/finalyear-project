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
    <link rel="stylesheet" href="stylefile/stylepass.css">
    <title>Pass</title>
</head>
<body>
    <div class="contain">
        <h3>PASS</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-field block">
                <label for="file">Photo:</label>
                <input type="file" name="file" required> 
            </div>
            <div class="input-field">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" required> 
            </div>
            <div class="input-field">
                <label for="mname">Middle Name:</label>
                <input type="text" name="mname" required>
            </div>
            <div class="input-field">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" required>
            </div>
            <div class="input-field">
                <label for="phone">Phone:</label>
                <input type="number" name="phone" required>
            </div>
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
                <label>Pass Validity:</label>
                <div class="radio-group">
                    <input type="radio" name="month" value="one" id="one" onchange="calculateExpiryDate()">
                    <label for="one">One month</label>
                    <input type="radio" name="month" value="three" id="three" onchange="calculateExpiryDate()">
                    <label for="three">Three months</label>
                    <input type="radio" name="month" value="six" id="six" onchange="calculateExpiryDate()">
                    <label for="six">Six months</label>
                </div>
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
                <p id="expiry-date">Expiry Date: </p>
            </div>
            <div class="input-field">
                <input type="submit" value="Submit" class="btn" name="submit">
            </div>
        </form>
    </div>
    <script src="passjs.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $filename = $_FILES["file"]["name"];
    $temname = $_FILES{"file"}["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($temname, $folder);
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $railname = $_POST['railname'];
    $validity = $_POST['month'];
    $randnum = (rand(1,100));

    // Check if any field is empty
    if (empty($fname) || empty($lname) || empty($phone) || $from == "not select" || $to == "not select"  || empty($validity) || $railname == "not select") {
        echo "Please fill all the fields.";
    } else {
        // Insert into database
        $query = "INSERT INTO pass(photo,fname,mname ,lname, email, phone, fromrow, torow, railname, validity,id_num) VALUES ('$folder','$fname','$mname','$lname', '$email', '$phone', '$from', '$to', '$railname', '$validity','$randnum')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            // Get the last inserted ID
            $last_id = mysqli_insert_id($conn);
            // echo "<script>alert('Record stored successfully.');</script>";
            echo "<script>window.location.href='displaypass.php?id=$last_id';</script>";
        } else {
            echo "Data not stored. Error: " . mysqli_error($conn);
        }
    }
}
?>
