<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goldenchandelier";

try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id=$_GET['id'];
    $q1="DELETE FROM venue_booking WHERE booking_id ='$id' ";
    $conn->exec($q1);

    header('location: ad-vn-book.php');

}
catch(PDOException $e){
    header('location: adminpage.php');
}

?>