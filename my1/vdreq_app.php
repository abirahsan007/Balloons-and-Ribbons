
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor requests</title>

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
    height: 68px;
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
                            <li><a href="adminpage.php">Home</a></li>
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
                            <h2>Vendor request List</h2>

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
    <div class="classes-time-section spad set-bg" data-setbg="img/events-13.jpg">
        <div class="container">
            <div class="row">
              <table class="table table-striped table-dark">
  <thead>
    <tr>
    <th>Request id</th>
    <th>Vendor id</th>
    <th>Vendor Name</th>
    <th>Customer id</th>
    <th>Customer Name</th>
    <th>Booking Date</th>
    <th>Event Date</th>
    <th>Event Type</th>
    <th>Event Location</th>
    <th>Duration</th>
    <th>Event Schedule</th>
    <th>Approve Request</th>
    </tr>
  </thead>
  <tbody>
    <?php
         include 'db.php';

       try{
           $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);

           $stmt="SELECT vr.request_id, vr.vendor_id, vd.brand_name, vr.customer_id, cus.name, vr.booking_date, vr.event_date, vr.event_type, vr.Event_location, vr.duration, vr.event_schedule
                FROM vendors as vd,customers as cus,vendor_request as vr
                WHERE vr.customer_id = cus.customer_id and vr.vendor_id = vd.vendor_id";
           $returnobject=$con->query($stmt);

           $table=$returnobject->fetchAll(PDO::FETCH_NUM);


           foreach($table as $row){
              echo "<tr> <td>"
                  . $row[0]. "</td><td>"
                  . $row[1]. "</td><td>"
                  . $row[2]. "</td><td>"
                  . $row[3]. "</td><td>"
                  . $row[4]. "</td><td>"
                  . $row[5]. "</td><td>"
                  . $row[6]. "</td><td>"
                  . $row[7]. "</td><td>"
                  . $row[8]. "</td><td>"
                  . $row[9]. "</td><td>"
                  . $row[10]. "</td><td>" 
                  ?><a class="btn btn-primary btn-block" href="delvdr.php?id=<?php echo $row[0] ?>&id1=<?php echo $row[1] ?>&id2=<?php echo $row[2] ?>&id3=<?php echo $row[3] ?>&id4=<?php echo $row[4] ?>&id5=<?php echo $row[5] ?>&id6=<?php echo $row[6] ?>&id7=<?php echo $row[7] ?>&id8=<?php echo $row[8] ?>&id9=<?php echo $row[9] ?>&id10=<?php echo $row[10] ?>">select</a><?php "</td></tr>" ;

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
    <!-- Classes Time Section End -->

  
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
      <form method="post" class="search-model-form" action="sch_by_vnname-ad.php">
        <input type="text" name="vnname" placeholder="Search Venues here.....">
        <br>
        <br>
          <a href="search_venue-ad.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Venues By Filter</a>

      </form>
      <form class="search-model-form" method="post" action="sch_by_vdname-ad.php">
				<input type="text" id="vdname" name="vdname" placeholder="Search Vendors here.....">
                <br>
                <br>
                <a href="search_vendor-ad.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Vendors By Filter</a>
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
