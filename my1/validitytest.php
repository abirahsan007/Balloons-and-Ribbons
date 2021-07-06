<?php 
session_start(); 

    	$uname="";
    	$pass="";

        if(isset($_POST['uname']) and isset($_POST['pass']) ){
           $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            

        }
        else{
            echo"no username entered ";
        }
    	if(!empty($uname)  && !empty($pass) ){
        	include 'db.php';

    		try{
    			$con = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    			$stmt="SELECT * FROM admins ";
    			$returnobject=$con->query($stmt);

    			$table=$returnobject->fetchAll(PDO::FETCH_NUM);

    			$isvalid=false;
    			foreach($table as $row){
    				if($row[5] == $uname && $row[6]==$pass){
						$isvalid=true;
						$_SESSION['uname'] = $uname;
    					break;
    				}
    			}

                $iscust=false;
                $stmt="SELECT * FROM customers ";
    			$returnobject=$con->query($stmt);

    			$table=$returnobject->fetchAll(PDO::FETCH_NUM);

    			foreach($table as $row){
    				if($row[5] == $uname && $row[6]==$pass){
                        $iscust=true;
						$_SESSION['uname'] = $uname;
						$_SESSION['pass'] = $pass;
                        $_SESSION['cusid'] = $row[0];
                        
    					break;
    				}
    			}

    			if($isvalid==true){
    				echo "<script>window.location.assign('adminpage.php')</script>";
    			}
                else if($iscust==true){
                    echo "<script>window.location.assign('customerpage.php')</script>";
                }

    			else{
    				echo "<script>window.location.assign('index.php?status=wrongdata')</script>";
    			}

    		}
    		catch(PDOException $ex){
    			echo "<script>window.location.assign('index.php?status=dberror')</script>";
    		}

    	}
    	else{
    		echo "<script>window.location.assign('index.php?status=invalid')</script>";
    	}

    ?>
    