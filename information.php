<?php
    session_start();
    // echo "wellcome".$_SESSION['user_email'];
    $emp = $_SESSION['emp_email'];
    if($emp == true){

    }
    else{
        header('location:employee.php');
    }
?>

<?php include("dbconnection.php");

// Get the user ID from the URL
$user_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$user_id) {
    echo "User ID not found.";
    exit;
}

// // Fetch the email corresponding to the user ID
// $query = "SELECT email FROM employee WHERE id = '$user_id'";
// $result = mysqli_query($conn, $query);

// if ($result && mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $email = $row['email'];
// } else {
//     echo "User not found.";
//     exit;
// }
// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/styleinformation.css">
    <title>Information</title>
</head>
<body>
    <div class="logout">
        <form action="logoutemployee.php" method="post">
            <input type="submit" value="Logout">
        </form>
    </div>
    <table>
        <tr>
            <th>Topic</th>
            <th>Links</th>
        </tr>
        <tr>
            <td>Sign Up Information</td>
            <td><a href="signuptable.php?id=<?php echo $user_id; ?>">Click Here</a></td>
        </tr>
        <tr>
            <td>Ticket Information</td>
            <td><a href="tickettable.php?id=<?php echo $user_id; ?>">Click Here</a></td>
        </tr>
        <tr>
            <td>Pass Information</td>
            <td><a href="passtable.php?id=<?php echo $user_id; ?>">Click Here</a></td>
        </tr>
        <tr>
            <td>Feedback Information</td>
            <td><a href="feedbacktable.php?id=<?php echo $user_id; ?>">Click Here</a></td>
        </tr>
    </table>
</body>
</html>
