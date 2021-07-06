<?php
    session_start();

        $usname=$_SESSION['uname'];
        $vnid="";
        $vuname="";
    	$bdate="";
        $edate="";
    	$etype="";
        $gc="";
    	$edu="";
        $sch="";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "goldenchandelier";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

        if(isset($_POST['sub'])){

            if(!empty($_POST['vdname']) && !empty($_POST['bdate']) && !empty($_POST['edate']) && !empty($_POST['etype']) && !empty($_POST['eloc']) && !empty($_POST['edu']) && !empty($_POST['sch'])){
               
                
                $vdname=$_POST['vdname'];
                $bdate= $_POST['bdate'] ;
                $edate=$_POST['edate'] ;
                $etype= $_POST['etype'];
                $loc= $_POST['eloc'];
                $edu= $_POST['edu'];
                $sch= $_POST['sch'];
    
                    
                    $que="SELECT vendor_id,hire_cost,email,location,type FROM vendors WHERE brand_name = '$vdname' ";
                    $stmt=$conn->query($que);
                    $table=$stmt->fetchAll(PDO::FETCH_NUM);
                    $vdid=$table[0][0];
                    $cost=$table[0][1];
                    $mail=$table[0][2];
                    $vloc=$table[0][3];
                    $vdtype=$table[0][4];
                    $_SESSION['vdid'] = $table[0][0];
                    
    
                    $que1="SELECT customer_id,name FROM customers WHERE cus_username = '$usname' ";
                    $stmt1=$conn->query($que1);
                    $table1=$stmt1->fetchAll(PDO::FETCH_NUM);
                    $cusid=$table1[0][0];
                    $cus_name = $table1[0][1];
                    $total=$cost*$edu;
                    //echo "$cusid,$vnid,$bdate,$edate,$etype,$gc,$edu,$sch";


                    $sql = "INSERT INTO vendor_request(customer_id, vendor_id, booking_date, event_date, event_type, Event_Location, duration, event_schedule) 
                            VALUES ('$cusid','$vdid','$bdate','$edate','$etype','$loc','$edu','$sch')";
                    $conn->exec($sql);
                    
                    header('location: customerpage.php');

                 }
               else{
                //echo"missing data / no data entered ";
                echo "error";
               }
            }
        }
        catch(PDOException $e)
                  {
                    //echo "Database operation error";
                     echo $e->getMessage();
                   }              
        ?>
