<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goldenchandelier";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $vdid=$_GET['id1'];
    $vdname=$_GET['id2'];
    $cusid=$_GET['id3'];
    $cus_name=$_GET['id4'];
    $bdate=$_GET['id5'];
    $edate=$_GET['id6'];
    $etype=$_GET['id7'];
    $loc=$_GET['id8'];
    $edu=$_GET['id9'];
    $sch=$_GET['id10'];
    $stat="not paid";

    $s1 = "SELECT hire_cost, location , email, type from vendors where vendor_id ='$vdid' ";
    $s1_ret = $conn->query($s1);
    $s1_rs = $s1_ret->fetchAll(PDO::FETCH_NUM);

    $vloc=$s1_rs[0][1];
    $cost=$s1_rs[0][0];
    $mail=$s1_rs[0][2];
    $vdtype=$s1_rs[0][3];
    $stat="not paid";
    

    $q = "INSERT INTO vendors_booking(customer_id, cus_name, vendor_name, vendor_type, vendor_loc, hire_cost, vd_email, vendor_id, booking_date, event_date, event_type, event_loc, duration, total_payment, vdb_schedule, Payment_status) VALUES ('$cusid','$cus_name','$vdname','$vdtype','$vloc','$cost','$mail','$vdid','$bdate','$edate','$etype','$loc','$edu','$cost','$sch','$stat')";
    $conn->exec($q);
    $q1="DELETE FROM vendor_request WHERE vendor_id ='$vdid' and customer_id='$cusid'";
    $conn->exec($q1);

    header('location: vdreq_app.php');

}
catch(PDOException $e){
    echo $e->getMessage();
}

?>