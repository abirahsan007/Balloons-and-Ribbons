<?php 
  session_start(); 
    if($_SESSION['uname']){

    }
    else{
        header('location: index.php');
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
    <title>Admin page</title>

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
.btn-lg {
  padding: -0.5rem 0rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: 2.3rem;
  margin-top: 8px;

}
.btn-block {
    display: block;
    width: 51%;
}
.btn-primary, .btn-primary:active, .btn-primary:visited {
    background-color: #82D026 !important;
    border-color: #82D026;
}
.btn-primary:hover{
  background-color: #fff !important;
  border-color: #82d026;
  color: #82d026;
}

.srch {
    float: right;
    height: 10px;
    left: 942px;
    bottom: 46px;
    padding: 10px 20px;
}
.t {
        color: black;
        font-size: 10px;
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        float: none;
        
    }
    .t h1{
        font-size: 26px;
        padding: 38px;
        height: 30px;
        top: 300px;
        margin-right: 200px;
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

                    <div class="col-lg-10 col-md-10">
                        <nav class="main-menu mobile-menu">
                            <ul>
                                <li><a class="active" href="adminpage.php">Home</a></li>
                                <li><a href="venues_ad.php">Venues</a></li>
                                <li><a href="vendors_ad.php">Vendors</a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <li class="search-btn search-trigger"><i class="fa fa-search"></i></li>
                                
                            </ul>
                            <ul class="t">
                            <div>
                                <h1>Welcome to Golden Chandelier  <?php  if (isset($_SESSION['uname'])) : ?>
                                <strong><?php echo " Admin " . $_SESSION['uname'] ; ?></strong>
                                <?php endif ?></h1>
                                
                            </div>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->

    <!-- Hero Section End -->
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Admin Homepage</h2>

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
          <div align="center">
            <div class="row">

              <div class="col-lg-12" >
              <a href="vnreq_app.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Venue Requests</button> </a>
              <a href="vdreq_app.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Vendor requests</button> </a>
              <a href="ad-vn-book.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Venue Booking History </button> </a>
              <a href="ad-vd-book.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Vendor Booking History</button> </a>
              <a href="addvn.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Add/Remove/Update venue</button> </a>
              <a href="addvd.php">  <button type="button" class="btn btn-primary btn-lg btn-block">Add/Remove/Update vendor</button> </a>
              </div>




            </div>
          </div>
        </div>
    </section>
   
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
