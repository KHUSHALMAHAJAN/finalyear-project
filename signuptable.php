<?php
    session_start();
    // echo "wellcome".$_SESSION['user_email'];
    $emp = $_SESSION['emp_email'];
    if($emp == true){

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display a signup </title>
    <link rel="stylesheet" href="stylefile/stylesignuptable.css">
</head>
<body>
    <h1><mark>Display all signup table</mark></h1>
    <div class="logout">
        <form action="logoutemployee.php" method="post">
            <input type="submit" value="Logout">
        </form>
    </div>
    <?php
    $query = "SELECT * FROM form1";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total > 0) {
    ?>
        <center>
            <table>
                <tr>
                    <th width ="5%">ID</th>
                    <th width ="10%">First Name</th>
                    <th width ="10%">Middle Name</th>
                    <th width ="10%">Last Name</th>
                    <th width ="10%">Phone</th>
                    <th width ="20%">Email</th>
                    <th width ="20%">Password</th>
                </tr>
            
            <?php
            while($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>".$result['id']."</td>
                    <td>".$result['fname']."</td>
                    <td>".$result['mname']."</td>
                    <td>".$result['lname']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['password']."</td>
                </tr>";
            }
            ?>
            </table>
        </center>
    <?php
    } else {
        echo "No records found.";
    }
    ?> 
</body>
</html>