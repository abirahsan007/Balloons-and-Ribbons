    <?php

        $cusid="";
        $cusname="";
    	$add="";
        $con="";
    	$email="";
        $usname="";
        $cuspass="";



        if(isset($_POST['cusname']) && isset($_POST['add']) && isset($_POST['con']) && isset($_POST['cusemail'])&& isset($_POST['usname']) && isset($_POST['cuspass'])     ){

            $cusname=$_POST['cusname'];
            $add= $_POST['add'] ;
            $con=$_POST['con'] ;
            $email=$_POST['cusemail'];
            $usname=$_POST['usname'] ;
            $cuspass=$_POST['cuspass'];


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "goldenchandelier";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //insert cus info
                $set1 = "INSERT INTO customers(name, address, contact, email, cus_username, cus_password)
                        VALUES ('$cusname','$add','$con','$email','$usname','$cuspass')" ;


                $conn->exec($set1);
                //echo"cus info inserted";


                echo "Data inserted successfully";
                header('location: customerpage.php');

             }
             catch(PDOException $e)
              {
                echo "Insert new customer id,usermail,password,email ";
               }

                    $conn = null;

           }
           else{
            echo"missing data / no data entered ";
           }

    ?>
   