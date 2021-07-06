<?php

session_start();
$usname=$_SESSION['uname'];
    

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goldenchandelier";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])){
        if(!empty($_POST['uname']) && !empty($_POST['vuname']) && !empty($_POST['amnt']) && $_POST['uname']==$usname){
            $uname=$_POST['uname'];
            $vn=$_POST['vuname'];
            $amnt=$_POST['amnt'];
            $crd=$_POST['crd'];

            $sql="SELECT customer_id FROM customers WHERE cus_username = '$uname'";
            $sql1=$conn->query($sql);
            $sql2=$sql1->fetchAll(PDO::FETCH_NUM);
            $c_id=$sql2[0][0];

            $s="SELECT venue_id FROM venues WHERE name = '$vn'";
            $s1=$conn->query($s);
            $s2=$s1->fetchAll(PDO::FETCH_NUM);
            $v_id=$s2[0][0];

            $q="SELECT total_payment FROM venue_booking WHERE customer_id = '$c_id' and venue_id='$v_id'";
            $q1=$conn->query($q);
            $q2=$q1->fetchAll(PDO::FETCH_NUM);
            $total=$q2[0][0];

            $sq="SELECT bank_id,balance FROM cus_bank WHERE cus_id = '$c_id' ";
            $sq1=$conn->query($sq);
            $sq2=$sq1->fetchAll(PDO::FETCH_NUM);
            $b_id=$sq2[0][0];
            $blnc=$sq2[0][1];
            $amount=$blnc-$total;
            $amount1=$total-$amnt;
            $amount2=$amnt-$blnc;
            $amount3=$total-$blnc;
            $stat="Pending";
            $stat1="Paid";

            if($blnc>=$total){
                if($amnt==$total){
                    $qu="UPDATE cus_bank SET balance='$amount' WHERE cus_id='$c_id'";
                    $conn->exec($qu);
                    $qu1="INSERT INTO venue_bank(customer_id, venue_id, balance) VALUES ('$c_id','$v_id','$total')";
                    $conn->exec($qu1);
                    $quu="INSERT INTO payment_history(customer_id, venue_id, amount) VALUES ('$c_id','$v_id','$total')";
                    $conn->exec($quu);
                    $qu2="UPDATE venue_booking SET Payment_status='$stat1',total_payment='$amount1' WHERE customer_id='$c_id' and venue_id='$v_id'";
                    $conn->exec($qu2);
                    header('location: customerpage.php'); 
                }
                else{
                    $qu="UPDATE cus_bank SET balance='$amount' WHERE cus_id='$c_id'";
                    $conn->exec($qu);
                    $qu1="INSERT INTO venue_bank(customer_id, venue_id, balance) VALUES ('$c_id','$v_id','$amnt')";
                    $conn->exec($qu1); 
                    $quu="INSERT INTO payment_history(customer_id, venue_id, amount) VALUES ('$c_id','$v_id','$amnt')";
                    $conn->exec($quu);
                    $qu2="UPDATE venue_booking SET total_payment='$amount1',Payment_status='$stat' where customer_id='$c_id' and venue_id='$v_id'";
                    $conn->exec($qu2);
                    header('location: customerpage.php');
                }
                
            }
            elseif($blnc<$total && $blnc!=0){
                $qu="UPDATE cus_bank SET balance='$amount2' WHERE cus_id='$c_id'";
                $conn->exec($qu);
                $qu1="INSERT INTO venue_bank(customer_id, venue_id, balance) VALUES ('$c_id','$v_id','$amnt')";
                $conn->exec($qu1); 
                $quu="INSERT INTO payment_history(customer_id, venue_id, amount) VALUES ('$c_id','$v_id','$amnt')";
                $conn->exec($quu);
                $qu2="UPDATE venue_booking SET total_payment='$amount1', Payment_status='$stat' where customer_id='$c_id' and venue_id='$v_id'";
                $conn->exec($qu2);
                header('location: customerpage.php');                    
            }
            else{
                echo "taka nai pocket e";
                header('location: takanai.php');
            }
        }
        else{
            header('location: pay1.php');
            echo "wrong username / fill up the form";
        }
    }
    else{
        header('location: pay1.php');
        echo "jani na ki hoise";
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}

?>