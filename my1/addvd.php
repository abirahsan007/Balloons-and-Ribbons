<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add Vendor</title>

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
}</style>
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
    <!-- Hero Section Begin -->
    <div class="hero-section set-bg" data-setbg="img/events-15.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h1>Contact</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Add/Remove/Update Vendor</h2>

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
    <div class="classes-time-section spad " style="padding-top: 65px;padding-bottom: 211px;padding-left: 280px;">
        <div class="container">
          <div align="center">
            <div class="row">
            </div>
              <form method="post" action="addvd1.php">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Vendor Name</label>
                <div class="col-sm-6">
                  <input type="text" id="vdname"  name="vdname" class="form-control" >
                </div>
              </div>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-6">
                    <select id="inputState" name="vt" class="form-control">
                    <option selected>Any</option>
                    <option>catering</option>
                    <option>DJ</option>
                    <option>photographer</option>
                    <option>decorator</option>
                    <option>makeup artist</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-6">
                    <select id="inputState" name="loc" class="form-control">
                    <option selected>Any</option>
                    <option>Dhanmondi</option>
                    <option>Uttara</option>
                    <option>Gulshan</option>
                    <option>Mirpur</option>
                    </select>
                  </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Hire cost</label>
                <div class="col-sm-6">
                  <input type="text" name="cost" class="form-control" id="inputPassword3" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Experience</label>
                <div class="col-sm-6">
                  <input type="text" id="exp" name="exp" class="form-control"  >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Speciality</label>
                <div class="col-sm-6">
                  <input type="text"  id="sp"  name="sp" class="form-control" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Availability</label>
                <div class="col-sm-6">
                  <input type="text"  id="av"  name="av" class="form-control" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-6">
                  <input type="text"  id="cnt"  name="cnt" class="form-control" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                  <input type="text"  id="em"  name="em" class="form-control" >
                </div>
              </div>
              
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Vendor Schedule</label>
                <div class="col-sm-6">
                  <select id="sch" name="sch" class="form-control">
                  <option selected>Any</option>
                  <option>day</option>
                    <option>afternoon</option>
                    <option>night</option>
                    <option>evening</option>
                    <option>day and afternoon</option>
                    <option>afternoon and evening</option>
                    <option>evening and night</option>
                    <option>day and evening</option>
                  </select>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
                <button type="submit" class="btn btn-primary" name="submit1">Remove</button>
                <button type="submit" class="btn btn-primary" name="submit2">Update</button>
              </div>
            </div>
          </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Contact Section End -->
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
