<?php
include "../dbconnect.php";
session_start();
if ($_POST) {
    $customer = $_SESSION['user'];
    $mediaId = $_POST['mediaId'];
    $rate = $_POST['rate'];
    $customer .= $mediaId;
    $query = "INSERT INTO cookies (UserName, Value, Exist) VALUES ('$customer ', '$mediaId','1')";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $query = "SELECT rate, nbrrate FROM rating WHERE media='$mediaId'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $newRate = $row['rate'] + $rate;
        $newNbrRate = $row['nbrrate'] + 1;
        $query = "UPDATE rating SET rate = '$newRate', nbrrate = '$newNbrRate' WHERE media = '$mediaId'";
        $result = mysqli_query($con, $query) or die(mysql_error());

    } else {
        $query = "INSERT INTO rating (media, rate, nbrrate) VALUES (' $mediaId', ' $rate ','1')";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $newRate = $rate;
        $newNbrRate = 1;
    }
    $average = round($newRate / $newNbrRate, 2);
    $dataBack = array('avg' => $average, 'nbrRate' => $newNbrRate);
    $dataBack = json_encode($dataBack);
    echo $dataBack;
}
?>