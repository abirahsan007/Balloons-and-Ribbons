<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venue requests</title>

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

    <style>
        .srch {
    float: right;
    height: 10px;
    left: 942px;
    bottom: 46px;
    padding: 10px 20px;
}
.t {
        color: black;
        font-size: 30px;
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        float: left; 
        margin-right: 30px; 
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
                            <h2>payment history(vendor)</h2>

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
    </section>
    <!-- Contact Section End -->

    <!-- Classes Time Section End -->
    <div class="classes-time-section spad set-bg" data-setbg="img/events-6.jpg">
        <div class="container">
            <div class="row">
              <table class="table table-striped table-dark">
  <thead>
    <tr>
    <th>id</th>
    <th>Vendor id</th>
    <th>Vendor's Name</th>
    <th>Customer id</th>
    <th>Customer Name</th>
    <th>paid amount</th>
    </tr>
  </thead>
  <tbody>
    <?php

        
                            
        $userid = "";
        $un = $_SESSION['uname'];

        $host="localhost";
        $username="root";
        $password="";
        $database="goldenchandelier";

       try{
            $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $s1 = "SELECT customer_id,name from customers where cus_username = '$un'";
            $s1_ret = $con->query($s1);
            $s1_rs = $s1_ret->fetchAll(PDO::FETCH_NUM);
            $id = $s1_rs[0][0];
            $name = $s1_rs[0][1];

           $stmt="SELECT vr.id, vr.vendor_id, vn.brand_name, vr.customer_id, cus.name, vr.amount
           FROM vendors as vn,customers as cus, payment_history as vr
           WHERE vr.customer_id = cus.customer_id and vr.vendor_id = vn.vendor_id and cus.customer_id='$id' ORDER BY vr.id DESC";
           $returnobject=$con->query($stmt);
           $table=$returnobject->fetchAll(PDO::FETCH_NUM);

           if(count($table)==true){
               foreach($table as $row){
                    echo "<tr> <td>"
                  . $row[0]. "</td><td>"
                  . $row[1]. "</td><td>"
                  . $row[2]. "</td><td>"
                  . $row[3]. "</td><td>"
                  . $row[4]. "</td><td>"
                  . $row[5]. "</td></tr>" ;

                }
           }
           else{

           }
           

       }
       catch(PDOException $ex){
           echo "<script>window.location.assign('index.php?status=dberror')</script>";
       }

   ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
    
    <!-- Search model -->
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
    <!-- Search model end -->

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