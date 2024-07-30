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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefile/styletimetable.css">
    <title>timetable</title>
</head>
<body>
    <h1>timetable</h1>
    <table>
        <tr>
            <th colspan="4"></th>
            <th colspan="2">source to destination</th>
            <th colspan="2">destination to source</th>
            <th></th>
        </tr>
        <tr>
            <th>train no.</th>
            <th>train name</th>
            <th>from</th>
            <th>to</th>
            <th>station</th>
            <th>time</th>
            <th>station</th>
            <th>time</th>
        </tr>
        <tr class="no101 main101">
            <td>101</td>
            <td>pavan</td>
            <td>bhusaval</td>
            <td>pune</td>
            <td>bhusaval</td>
            <td>7:00</td>
            <td>pune</td>
            <td>18:00</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>jalgaon</td>
            <td>8:15</td>
            <td>khandwa</td>
            <td>19:15</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>chalisgon</td>
            <td>9:30</td>
            <td>devdali</td>
            <td>20:30</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>manmad</td>
            <td>10:45</td>
            <td>nashik</td>
            <td>21:45</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>nashik</td>
            <td>12:00</td>
            <td>manmad</td>
            <td>22:00</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>devdali</td>
            <td>13:15</td>
            <td>chalisgon</td>
            <td>23:15</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>khandwa</td>
            <td>14:30</td>
            <td>jalgaon</td>
            <td>00:30</td>
        </tr>
        <tr class="no101">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>pune</td>
            <td>16:30</td>
            <td>bhusaval</td>
            <td>1:45</td>
        </tr>
        <tr class="no102 main102">
            <td>102</td>
            <td>geetanjali</td>
            <td>bhusaval</td>
            <td>nashik</td>
            <td>bhusaval</td>
            <td>10:00</td>
            <td>nashik</td>
            <td>17:00</td>
        </tr>
        <tr class="no102">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>bhusaval</td>
            <td>10:00</td>
            <td>nashik</td>
            <td>17:00</td>
        </tr>
        <tr class="no102">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>jalgaon</td>
            <td>11:30</td>
            <td>manmad</td>
            <td>18:00</td>
        </tr>
        <tr class="no102">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>chalisgon</td>
            <td>13:00</td>
            <td>chalisgon</td>
            <td>19:00</td>
        </tr>
        <tr class="no102">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>manmad</td>
            <td>14:00</td>
            <td>jalgaon</td>
            <td>20:30</td>
        </tr>
        <tr class="no102">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>nashik</td>
            <td>15:00</td>
            <td>bhusaval</td>
            <td>22:45</td>
        </tr>
        <tr class="no103 main103">
            <td>103</td>
            <td>pushapak</td>
            <td>nashik</td>
            <td>pune</td>
            <td>nashik</td>
            <td>2:00</td>
            <td>pune</td>
            <td>8:00</td>
        </tr>
        <tr class="no103">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>devdali</td>
            <td>3:30</td>
            <td>khandwa</td>
            <td>9:30</td>
        </tr>
        <tr class="no103">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>khandwa</td>
            <td>4:30</td>
            <td>devdali</td>
            <td>10:30</td>
        </tr>
        <tr class="no103">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>nashik</td>
            <td>12:00</td>
            <td>pune</td>
            <td>6:00</td>
        </tr>
    </table>
</body>
</html>
