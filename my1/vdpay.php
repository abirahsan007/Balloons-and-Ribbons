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
        if(!empty($_POST['uname']) && !empty($_POST['vdname']) && !empty($_POST['amnt']) && $_POST['uname']==$usname){
            $uname=$_POST['uname'];
            $vd=$_POST['vdname'];
            $amnt=$_POST['amnt'];

            $sql="SELECT customer_id FROM customers WHERE cus_username = '$uname'";
            $sql1=$conn->query($sql);
            $sql2=$sql1->fetchAll(PDO::FETCH_NUM);
            $c_id=$sql2[0][0];

            $s="SELECT vendor_id FROM vendors WHERE brand_name = '$vd'";
            $s1=$conn->query($s);
            $s2=$s1->fetchAll(PDO::FETCH_NUM);
            $v_id=$s2[0][0];

            $q="SELECT total_payment FROM vendors_booking WHERE customer_id = '$c_id' and vendor_id='$v_id' ";
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
                    $qu1="INSERT INTO vendor_bank(customer_id, vendor_id, balance) VALUES ('$c_id','$v_id','$total')";
                    $conn->exec($qu1);
                    $quu="INSERT INTO payment_history(customer_id, vendor_id, amount) VALUES ('$c_id','$v_id','$total')";
                    $conn->exec($quu);
                    $qu2="UPDATE vendors_booking SET Payment_status='$stat1',total_payment='$amount1' WHERE customer_id='$c_id' and vendor_id='$v_id'";
                    $conn->exec($qu2);
                    header('location: customerpage.php'); 
                }
                else{
                    $qu="UPDATE cus_bank SET balance='$amount' WHERE cus_id='$c_id'";
                    $conn->exec($qu);
                    $qu1="INSERT INTO vendor_bank(customer_id, vendor_id, balance) VALUES ('$c_id','$v_id','$amnt')";
                    $conn->exec($qu1);
                    $quu="INSERT INTO payment_history(customer_id, vendor_id, amount) VALUES ('$c_id','$v_id','$amnt')";
                    $conn->exec($quu); 
                    $qu2="UPDATE vendors_booking SET total_payment='$amount1',Payment_status='$stat' where customer_id='$c_id' and vendor_id='$v_id'";
                    $conn->exec($qu2);
                    header('location: customerpage.php');       
                }
                
            }
            elseif($blnc<$total && $blnc!=0){
                $qu="UPDATE cus_bank SET balance='$amount2' WHERE cus_id='$c_id'";
                $conn->exec($qu);
                $qu1="INSERT INTO vendor_bank(customer_id, vendor_id, balance) VALUES ('$c_id','$v_id','$amnt')";
                $conn->exec($qu1); 
                $quu="INSERT INTO payment_history(customer_id, vendor_id, amount) VALUES ('$c_id','$v_id','$amnt')";
                $conn->exec($quu);
                $qu2="UPDATE vendors_booking SET total_payment=$amount1,Payment_status='$stat' where customer_id='$c_id' and vendor_id='$v_id'";
                $conn->exec($qu2);
                header('location: customerpage.php');                    
            }
            else{
                echo "taka nai pocket e";
                header('location: takanai.php');
            }
        }
        else{
            echo "shb vul disen";
            header('location: pay2.php');
        }
    }
    else{
        echo "kisui hy nai";
        header('location: pay2.php');
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}

?>