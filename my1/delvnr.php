<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goldenchandelier";

try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $vnid=$_GET['id1'];
    $vuname=$_GET['id2'];
    $cusid=$_GET['id3'];
    $cus_name=$_GET['id4'];
    $bdate=$_GET['id5'];
    $edate=$_GET['id6'];
    $etype=$_GET['id7'];
    $gc=$_GET['id8'];
    $edu=$_GET['id9'];
    $sch=$_GET['id10'];
    $stat="not paid";

    $s1 = "SELECT hourly_cost,location,type from venues where venue_id ='$vnid'";
    $s1_ret = $conn->query($s1);
    $s1_rs = $s1_ret->fetchAll(PDO::FETCH_NUM);

    $loc=$s1_rs[0][1];
    $cost=$s1_rs[0][0];
    $vtype=$s1_rs[0][2];

    $q = "INSERT INTO venue_booking(customer_id, cus_name, vn_name, vn_type, location, cost_per_hr, venue_id, booking_date, event_date, event_type, guest_capacity, duration, total_payment, vn_schedule, Payment_status) VALUES ('$cusid','$cus_name','$vuname','$vtype','$loc','$cost','$vnid','$bdate','$edate','$etype','$gc','$edu','$cost*$edu','$sch','$stat')";
    $conn->exec($q);

    $q1="DELETE FROM venue_request WHERE venue_id ='$vnid' and customer_id='$cusid'";
    $conn->exec($q1);

    header('location: vnreq_app.php');

}
catch(PDOException $e){
    header('location: adminpage.php');
}

?>