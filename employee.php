<?php
    session_start();
?>


<?php include("dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/stylesignin.css">
    <title>Sign In</title>
</head>
<body>
    <div class="contain">
        <h3>Railway Form</h3>
        <h5>Sign In for only employee</h5>
        <form action="" method="post">
            <div class="input-filed">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-filed">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" required>
            </div>
            <div class="input-filed">
                <input type="submit" value="Sign In" class="btn" name="signin">
            </div>
            <samp>Create a new account <a href="form.php">Click Here</a></samp>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $query = "SELECT * FROM employee WHERE email = '$email' AND password = '$pwd'";
    $data = mysqli_query($conn, $query);
    
    if ($data && mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
        $user_id = $row['id']; // Assuming 'id' is the primary key in your 'form1' table
        $_SESSION['emp_email'] = $email;
        // echo "<script>alert('Sign-in successful');</script>";
        echo "<script>window.location.href='information.php?id=$user_id';</script>";
    } else {
        echo "<script>alert('Incorrect email or password');</script>";
    }
}
?>
