<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/styleform.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="contain">
        <h3>Railway Form</h3>
        <h5>Sign Up</h5>
        <form id="signupForm" action="" method="post" onsubmit="return validatePassword()">
            <div class="input-filed">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" required> 
            </div>
            <div class="input-filed">
                <label for="mname">Middle Name:</label>
                <input type="text" name="mname" required> 
            </div>
            <div class="input-filed">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" required>
            </div>
            <div class="input-filed">
                <label for="phone">Phone:</label>
                <input type="number" name="phone" required>
            </div>
            <div class="input-filed">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-filed">
                <label for="pwd">Password:</label>
                <input type="password" id="password" name="pwd" required>
            </div>
            <div class="input-filed">
                <input type="submit" value="Register" class="btn" name="register">
            </div>
            <samp>Already have an account? <a href="signin.php">Click Here</a></samp>
        </form>
    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!regex.test(password)) {
                alert("Password must be at least 8 characters long, include uppercase and lowercase letters, numbers, and special characters.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
<?php
    session_start();
?>

<?php include("dbconnection.php"); ?>

<?php
if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    // Check if any field is empty
    if (empty($fname) || empty($mname) || empty($lname) || empty($phone) || empty($email) || empty($pwd)) {
        echo "Please fill all the fields.";
    } else {
        // Check password strength
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if (!preg_match($regex, $pwd)) {
            echo "Password must be at least 8 characters long, include uppercase and lowercase letters, numbers, and special characters.";
        } else {
            // Hash the password
            // $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
            
            // Insert into database
            $query = "INSERT INTO form1 (fname, mname, lname, phone, email, password) VALUES ('$fname', '$mname', '$lname', '$phone', '$email', '$pwd')";
            $data = mysqli_query($conn, $query);
            
            if ($data) {
                // Get the last inserted ID
                $last_id = mysqli_insert_id($conn);
                $_SESSION['user_email'] = $email;
                // echo "<script>alert('Record stored successfully.');</script>";
                echo "<script>window.location.href='railway.php?id=$last_id';</script>";
            } else {
                echo "Data not stored. Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
