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
    <link rel="stylesheet" href="stylefile/stylefeedback.css">
    <title>feedback</title>
</head>
<body>
    <div class="contain">
        <h3>feedback</h3>
        <form action="#" method="post">
            <div class="input-filed">
                <label for="email">Email:-</label>
                <?php echo $email ?>
            </div>
            <div class="input-filed">
                <label for="feedback">feedback:-</label>
                <textarea id="feedback" name="feedback" rows="4" cols="50" placeholder="only 100 word send beause only 100 word stroe other is ignor"></textarea>
            </div>
            <div class="input-filed">
                <input type="submit" value="Submit" name="submit" class="btn">
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $feedback = $_POST['feedback'];

    if (empty($feedback)) {
        echo "Please fill all the fields.";
    } else {
        // Insert the ticket details into the railwayticket table
        $query = "INSERT INTO railwayfeedback (email, feedback) VALUES ('$email', '$feedback')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            // Get the last inserted ID
            $last_id = mysqli_insert_id($conn);
            // echo "<script>alert('Record stored successfully.');</script>";
            echo "<script>window.location.href='railway.php?id=$last_id';</script>";
        } else {
            echo "Data not stored. Error: " . mysqli_error($conn);
        }
    }
}
?>