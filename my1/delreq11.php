<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goldenchandelier";

    try{

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];
        $vid= $_GET['id1'];
        $cid = $_GET['id2'];
                $min1 = "SELECT event_date FROM venue_request WHERE request_id='$id'";
                $min1_ret = $conn->query($min1);
                $min1_res = $min1_ret->fetchAll(PDO::FETCH_NUM);
                $edate=$min1_res[0][0];

                if($edate > date('Y-m-d')){
                    
                        $min = "DELETE FROM venue_request WHERE request_id='$id' ";
                        $conn->exec($min);
                        header('location: vn_req_list.php');     
                }
                else{
                    header('location: vn_req_list.php');
                }
                   

    }
    catch(PDOException $e){
        header('location: customerpage.php');
    }

    ?>

