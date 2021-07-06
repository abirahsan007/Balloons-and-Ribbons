

<?php

    $cusid="";
    $cusname="";
	$add="";
    $con="";
	$mail="";
    $usname="";
    $cuspass="";



    if(isset($_POST['cusid']) && isset($_POST['cusname']) && isset($_POST['add']) && isset($_POST['con']) && isset($_POST['mail'])&& isset($_POST['usname'])  && isset($_POST['cuspass'])  ){

        $cusid=$_POST['cusid'];
        //echo "$vnid";
        $cusname=$_POST['cusname'];
         //echo "$vuname";
        $add=$_POST['add'];
        //echo "$vnt";
        $con=$_POST['con'];
        //echo "$loc";
        $mail=$_POST['mail'];
        // echo "$cost";
        $usname=$_POST['usname'];
         //echo "$dm";
        $cuspass=$_POST['cuspass'];
        // echo "$av";

        //db connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "goldenchandelier";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['update']) ){

                                                                               // update  venue info
                $set1 = "update customers set  name ='$cusname',  address ='$add', contact='$con' ,  email='$mail', cus_username='$usname',cus_password  ='$cuspass'   where customer_id='$cusid' ";
               // echo "$set1";
                $conn->exec($set1);
                //echo"venue updated";

                //echo "Data updated successfully";


            }
         }catch(PDOException $e)
            {
                echo "Database operation error";
             }

          $conn = null;

       }else{
        echo"missing data / no data entered ";
       }


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style >
    .table {
 margin: auto;
 width: 24% !important;
 background-color: #82D066;
}
.contact-section {
    padding-top: 89px;
    padding-bottom: 220px;
}
.srch {
    float: right;
    height: 68px;
    left: 942px;
    bottom: 46px;
    padding: 10px 20px;
    
}
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html"><img src="img/logo2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <nav class="main-menu mobile-menu">
                            <ul class="srch">
                                <li><a href="customerpage.php">Home</a></li>
                                <li class="search-trigger"><i class="fa fa-search"></i></li>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Data Updated Successfully </h2>

                        </div>



                        <div class="contact-widget">
                            <ul>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
          </div>

        </div>

        <form >

          <table class="table table-borderless table-dark">
            <tbody>
              <tr>
                <td> Id </td>
                <td > : <?php echo $cusid;?> </td>
              </tr>

              <tr>
                <td> Name </td>
                <td > : <?php echo $cusname; ?> </td>
              </tr>

              <tr>
                <td> Address </td>
                <td > : <?php echo $add; ?> </td>
              </tr>

              <tr>
                <td> Contact </td>
                <td > : <?php echo $con;?> </td>
              </tr>

              <tr>
                <td> Email </td>
                <td > : <?php echo $mail;?> </td>
              </tr>

              <tr>
                <td> Username </td>
                <td > : <?php echo $usname; ?>  </td>
              </tr>

              <tr>
                <td> Password </td>
                <td > : <?php echo $cuspass; ?> </td>
              </tr>

            </tbody>
          </table>

        </form>
    </section>

	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
      <form method="post" class="search-model-form" action="sch_by_vnname-cus.php">
        <input type="text" name="vnname" placeholder="Search Venues here.....">
        <br>
        <br>
          <a href="search_venue-cus.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Venues By Filter</a>

      </form>
      <form class="search-model-form" method="post" action="sch_by_vdname-cus.php">
				<input type="text" id="vdname" name="vdname" placeholder="Search Vendors here.....">
                <br>
                <br>
                <a href="search_vendor-cus.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Vendors By Filter</a>
			</form>

		</div>
	</div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
