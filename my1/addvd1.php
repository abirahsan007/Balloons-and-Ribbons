<?php
    session_start();

    $vdname="";
    $vt="";
    $loc="";
    $cost="";
    $sp="";
    $exp="";
    $av="";
    $cnt="";
    $em="";
    $sch="";            

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "goldenchandelier";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

        if(isset($_POST['submit'])){

            if(!empty($_POST['vdname']) && !empty($_POST['vt']) && !empty($_POST['loc']) && !empty($_POST['cost'])&& !empty($_POST['exp'] && !empty($_POST['sp']) && !empty($_POST['av']) && !empty($_POST['cnt']) && !empty($_POST['em']) ) &&  !empty($_POST['sch'])){
               
                
                $vdname=$_POST['vdname'];
                $vt=$_POST['vt'];
                $loc=$_POST['loc'];
                $cost=$_POST['cost'];
                $exp=$_POST['exp'];
                $sp=$_POST['sp'];
                $av=$_POST['av'];
                $cnt=$_POST['cnt'];
                $em=$_POST['em'];
                $sch=$_POST['sch'];
    
                $sql1 = "INSERT INTO vendors(type, brand_name, experience, specialty, hire_cost, location, availability, contact, email, vendor_schedule) 
                        VALUES ('$vt', '$vdname', '$exp', '$sp', '$cost', '$loc', '$av', '$cnt', '$em', '$sch')";

                    $conn->exec($sql1);

                    header('location: addvd.php');
                 }
               else{
                //echo"missing data / no data entered ";
                echo $sql1 . $e->getMessage();
               }
            }

            if(isset($_POST['submit1'])){
                if(!empty('vdname')){
                    $name=$_POST['vdname'];

                    $s = "DELETE FROM vendors WHERE brand_name='$name'";
                    $conn->exec($s);
                    header('location: addvd.php');
                }
                else{
                    echo"at least enter name";
                   }
                   
            }

            if(isset($_POST['submit2'])){
                if(!empty($_POST['vdname'])){
                    $name=$_POST['vdname'];
                    
                    $vn = "SELECT * FROM vendors WHERE brand_name='$name'";
                    $vn1 = $conn->query($vn);
                    $vn2 = $vn1->fetchAll(PDO::FETCH_NUM);
                    $vt1=$vn2[0][1];
                    $loc1=$vn2[0][6];
                    $cost1=$vn2[0][5];
                    $exp1= $vn2[0][3];
                    $sp1= $vn2[0][4];
                    $av1= $vn2[0][7];
                    $cnt1= $vn2[0][8];
                    $em1=$vn2[0][9];
                    $sch1= $vn2[0][10];

                    $vt=$_POST['vt'];
                    $loc=$_POST['loc'];
                    $cost=$_POST['cost'];
                    $exp=$_POST['exp'];
                    $sp=$_POST['sp'];
                    $av=$_POST['av'];
                    $cnt=$_POST['cnt'];
                    $em=$_POST['em'];
                    $sch=$_POST['sch'];



                    if($name != null && $vt != 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp == null && $av==null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc != 'Any' && $cost == null && $exp == null && $sp == null && $av==null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost != null && $exp == null && $sp == null && $av==null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp != null && $sp == null && $av==null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp == null && $av!=null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp == null && $av==null && $cnt!=null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt', specialty='$sp1', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp != null && $av==null && $cnt==null && $em==null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp', vendor_schedule='$sch1', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp == null && $av==null && $cnt==null && $em==null && $sch!='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch', email='$em1' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt == 'Any' && $loc == 'Any' && $cost == null && $exp == null && $sp == null && $av==null && $cnt==null && $em!=null && $sch=='Any'){

                        $s = "UPDATE vendors SET type='$vt1', location='$loc1', hire_cost='$cost1', experience='$exp1', availability='$av1', contact='$cnt1', specialty='$sp1', vendor_schedule='$sch1', email='$em' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    }

                    elseif($name != null && $vt != 'Any' && $loc != 'Any' && $cost != null && $exp != null && $sp != null && $av!=null && $cnt!=null && $em!=null && $sch!='Any'){
                        $s = "UPDATE vendors SET type='$vt', location='$loc', hire_cost='$cost', experience='$exp', availability='$av', contact='$cnt', specialty='$sp', vendor_schedule='$sch', email='$em' WHERE brand_name='$name'";
                        $conn->exec($s);
                        header('location: addvd.php');
                    } 
                    else{
                        header('location: addvd.php'); 
                    }

                }
                else{
                    echo"at least enter name";
                   }
                   
            }
        }
        catch(PDOException $e)
                  {
                    //echo "Database operation error";
                     echo  $e->getMessage();
                   }              
        ?>