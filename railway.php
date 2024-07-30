<?php
    session_start();
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/stylerailway.css">
    <title>Railway</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="imagesfile/raillogo.jpg" alt="Railway Logo">
            <h1>Indian Railway</h1>
        </div>
        <div class="right-header">
            <div class="ashokchakra">
                <img src="imagesfile/ashokchakralogo.png" alt="Ashok Chakra">
            </div>
            <div>
                <form action="logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
            </div>
        </div>
    </header>
    <nav>
        <a href="railway.php?id=<?php echo $user_id; ?>">HOME</a>
        <a href="about.php?id=<?php echo $user_id; ?>">ABOUT</a>
        <a href="ticket.php?id=<?php echo $user_id; ?>">TICKET</a>
        <a href="timetable.php?id=<?php echo $user_id; ?>">TIMETABLE</a>
        <a href="pass.php?id=<?php echo $user_id; ?>">PASS</a>
        <a href="feedback.php?id=<?php echo $user_id; ?>">FEEDBACK</a>
    </nav>
    <section>
        <div class="left">
            <img src="imagesfile/railwaypic.jpeg" alt="railwaypic">
        </div>
        <div class="right">
            <ul>
                <li>When a passenger is travelling, it is mandatory to have a pass with him</li>
                <li>No ticket for children under six years of age</li>
                <li>But ticketing is mandatory if there cannot be more than three children</li>
            </ul>
        </div>
    </section>
    <footer>
        <a href="railway.php?id=<?php echo $user_id; ?>">HOME</a>
        <div class="facebook">
            <a href="https://www.facebook.com/RailMinIndia" target="_blank">
            <img src="imagesfile/facebook.jpeg" alt="facebook">
            <span>facebook</span>
            </a>
        </div>
        <div class="twitter">
            <a href="https://x.com/RailMinIndia" target="_blank">
            <img src="imagesfile/twitter.jpeg" alt="twitter">
            <span>twitter</span>
            </a>
        </div>
        <div class="youtube">
            <a href="https://www.youtube.com/user/RailMinIndia" target="_blank">
            <img src="imagesfile/youtube.jpeg" alt="youtube">
            <span>youtube</span>
            </a>
        </div>
    </footer>
</body>
</html>
