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

        if(isset($_POST['submit'])){

            if(!empty($_POST['vuname']) && !empty($_POST['bdate']) && !empty($_POST['edate']) && !empty($_POST['etype']) && !empty($_POST['gc']) && !empty($_POST['edu']) && !empty($_POST['sch'])){
               
                
                $vuname=$_POST['vuname'];
                $bdate= $_POST['bdate'] ;
                $edate=$_POST['edate'] ;
                $etype=$_POST['etype'];
                $gc= $_POST['gc'];
                $edu= $_POST['edu'];
                $sch= $_POST['sch'];
    
                    
                    $que="SELECT venue_id,type,location,hourly_cost FROM venues WHERE name = '$vuname' ";
                    $stmt=$conn->query($que);
                    $table=$stmt->fetchAll(PDO::FETCH_NUM);
                    $vnid=$table[0][0];
                    $vtype=$table[0][1];
                    $loc=$table[0][2];
                    $cost=$table[0][3];
                    $_SESSION['vnid'] = $table[0][0];
                    
    
                    $que1="SELECT customer_id,name FROM customers WHERE cus_username = '$usname' ";
                    $stmt1=$conn->query($que1);
                    $table1=$stmt1->fetchAll(PDO::FETCH_NUM);
                    $cusid=$table1[0][0];
                    $cus_name = $table1[0][1];
                    $stat="not paid";
                    //echo "$cusid,$vnid,$bdate,$edate,$etype,$gc,$edu,$sch";


                    $sql = "INSERT INTO venue_request(customer_id, venue_id, booking_date, event_date, event_type, guest_capacity, duration, event_schedule) VALUES ('$cusid','$vnid','$bdate','$edate','$etype','$gc','$edu','$sch')";
                    $conn->exec($sql);

                    
                    //$q1 = "DELETE FROM venue_request WHERE venue_id = $vnid and customer_id = $cusid";
                    //$conn->exec($q1);
                    header('location: customerpage.php');

                 }
               else{
                //echo"missing data / no data entered ";
                echo $sql . "<br>" . $e->getMessage();
               }
            }
        }
        catch(PDOException $e)
                  {
                    //echo "Database operation error";
                     echo $sql . "<br>" . $e->getMessage();
                   }              
        ?>
