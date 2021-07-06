<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Book History</title>

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
                            <ul>
                                <li><a href="adminpage.php">Home</a></li>
                                <li class="search-btn search-trigger"><i class="fa fa-search"></i></li>
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
                            <h2>Vendor booked List</h2>

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
        <div class="container-fluid">
            <div class="row">
              <table class="table table-striped table-dark">
  <thead>
    <tr>

      <th> Booking Id</th>
      <th> Customer Id</th>
      <th>Customer Name</th>
      <th> Vendor's Name</th>
      <th> Vendor Type</th>
      <th> Vendor Location</th>
      <th> Hire Cost  </th>
       <th>Vendor Email</th>
       <th> Booking Date</th>
       <th>Event date</th>
       <th>Event Type</th>
       <th>Event Location</th>
       <th>Event Schedule </th>
       <th>Total Bill</th>
       <th> Payment Status </th>

    </tr>
  </thead>
  <tbody>
  <?php
                    session_start();
                    
                    $userid = "";
                    $un = $_SESSION['uname'];

                    $host="localhost";
                    $username="root";
                    $password="";
                    $database="goldenchandelier";

                    try{
                        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    //echo "$cus_id";
                                    $stmt="SELECT * FROM vendors_booking";
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
                                                . $row[9]. "</td><td>"
                                                . $row[10]. "</td><td>"
                                                . $row[11]. "</td><td>"
                                                . $row[12]. "</td><td>"
                                                . $row[15]. "</td><td>"
                                                . $row[14]. "</td><td>"
                                                . $row[16]. "</td><td>"
                                                ?><a class="btn btn-primary btn-block" href="del2.php?id=<?php echo $row[0] ?>">delete</a><?php "</td></tr>" ;
                            
                                            }
                                        }
                    catch(PDOException $ex){
                        echo  $ex->getMessage();
                    }
                    


                ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
   
    
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>