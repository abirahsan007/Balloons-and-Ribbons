<?php
    session_start();

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

            if(!empty($_POST['vuname']) && !empty($_POST['vt']) && !empty($_POST['loc']) && !empty($_POST['cost']) && !empty($_POST['dm']) && !empty($_POST['av']) && !empty($_POST['cnt']) && !empty($_POST['mc']) &&  !empty($_POST['sch'])){
               
                
                $vuname=$_POST['vuname'];
                $vt= $_POST['vt'] ;
                $loc=$_POST['loc'] ;
                $cost=$_POST['cost'];
                $dm= $_POST['dm'];
                $av= $_POST['av'];
                $cnt= $_POST['cnt'];
                $mc= $_POST['mc'];
                $sch= $_POST['sch'];
    
                $sql = "INSERT INTO venues(name, type, location, hourly_cost, dimensions, availability, contact, max_capacity, venue_schedule) VALUES ('$vuname','$vt','$loc','$cost','$dm','$av','$cnt','$mc','$sch')";

                    $conn->exec($sql);

                    header('location: addvn.php');
                 }
               else{
                    echo"missing data / no data entered ";
               }
            }

            if(isset($_POST['submit1'])){
                if(!empty('vuname')){
                    $name=$_POST['vuname'];

                    $s = "DELETE FROM venues WHERE name='$name'";
                    $conn->exec($s);
                    header('location: addvn.php');
                }
                else{
                    echo"at least enter name";
                   }
                   
            }

            if(isset($_POST['submit2'])){
                if(!empty($_POST['vuname'])){
                    $name=$_POST['vuname'];
                    
                    $vn = "SELECT * FROM venues WHERE name='$name'";
                    $vn1 = $conn->query($vn);
                    $vn2 = $vn1->fetchAll(PDO::FETCH_NUM);
                    $vt1=$vn2[0][2];
                    $loc1=$vn2[0][3];
                    $cost1=$vn2[0][4];
                    $dm1= $vn2[0][5];
                    $av1= $vn2[0][6];
                    $cnt1= $vn2[0][7];
                    $mc1= $vn2[0][8];
                    $sch1= $vn2[0][9];

                    $vt= $_POST['vt'] ;
                    $loc=$_POST['loc'] ;
                    $cost=$_POST['cost'];
                    $dm= $_POST['dm'];
                    $av= $_POST['av'];
                    $cnt= $_POST['cnt'];
                    $mc= $_POST['mc'];
                    $sch= $_POST['sch'];



                    if($name != null && $vt !='Any' && $loc == 'Any' && $cost == null && $dm == null && $av == null && $cnt == null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt', location='$loc1', hourly_cost='$cost1', dimensions='$dm1', availability='$av1', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc != 'Any' && $cost == null && $dm == null && $av == null && $cnt == null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc', hourly_cost='$cost1', dimensions='$dm1', availability='$av1', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc == 'Any' && $cost != null && $dm == null && $av == null && $cnt == null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc1', hourly_cost='$cost', dimensions='$dm1', availability='$av1', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt !='Any' && $loc == 'Any' && $cost == null && $dm != null && $av == null && $cnt == null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc1', hourly_cost='$cost1', dimensions='$dm', availability='$av1', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc == 'Any' && $cost == null && $dm == null && $av != null && $cnt == null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET  type='$vt1', location='$loc1', hourly_cost='$cost1', dimensions='$dm1', availability='$av', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc == 'Any' && $cost == null && $dm == null && $av == null && $cnt != null && $mc == null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc1', hourly_cost='$cost1', dimensions='$dm1', availability='$av1', contact='$cnt', max_capacity='$mc1', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc == 'Any' && $cost == null && $dm == null && $av == null && $cnt == null && $mc != null &&  $sch == 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc1', hourly_cost='$cost1', dimensions='$dm1', availability='$av1', contact='$cnt1', max_capacity='$mc', venue_schedule='$sch1' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }

                    elseif($name != null && $vt =='Any' && $loc == 'Any' && $cost == null && $dm == null && $av == null && $cnt == null && $mc == null &&  $sch != 'Any'){

                        $s = "UPDATE venues SET type='$vt1', location='$loc1', hourly_cost='$cost1', dimensions='$dm1', availability='$av1', contact='$cnt1', max_capacity='$mc1', venue_schedule='$sch' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }
                    elseif($name != null && $vt !='Any' && $loc != 'Any' && $cost != null && $dm != null && $av != null && $cnt != null && $mc != null &&  $sch != 'Any'){
                        $s = "UPDATE venues SET type='$vt', location='$loc', hourly_cost='$cost', dimensions='$dm', availability='$av', contact='$cnt', max_capacity='$mc', venue_schedule='$sch' WHERE name='$name'";
                        $conn->exec($s);
                        header('location: addvn.php');
                    }
                    else{
                        header('location: addvn.php'); 
                    }

                        
                }
                else{
                    echo"at least enter name";
                   }
                   
            }
        }
        catch(PDOException $e)
                  {
                     echo  $e->getMessage();
                   }              
        ?>