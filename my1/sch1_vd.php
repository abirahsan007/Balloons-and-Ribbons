
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>filter search for vendor</title>

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
                            <li><a href="customerpage.php">Home</a></li>
                                <li><a href="venues_cus.php">Venues</a></li>
                                <li><a class="active"  href="vendors_cus.php">Vendors</a></li>
                                <li><a  href="vn_book.php">Venue Booking</a></li>
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
                            <h2>Filter Vendor</h2>

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

      <th> Brand Name</th>
      <th>Vendor Type</th>
     <th> Location</th>
      <th>Experience</th>
      <th>Specialty </th>
      <th>Hire Cost</th>
     <th>Available Date</th>
       <th>Vendor Free Schedule </th>
      <th>Contact</th>
      <th>Email</th>

    </tr>
  </thead>
  <tbody>
    <?php
            $sch1=0;
            $loc1=0;
            $vdt=0;
            $cost=0;
            $c=0;
            $d=0;
            $e=0;
            $f=0;
            
 
            $host="localhost";
            $username="root";
            $password="";
            $database="goldenchandelier";
 
            try{
                $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
 
                if(isset($_POST['cnt1'])){
                     if(!empty($_POST['vdt'])){
                         $vdt=$_POST['vdt'];
                         $c=1;
                     }
                     if(!empty($_POST['loc1'])){
                         $loc1=$_POST['loc1'];
                         $d=1;
                     }
                 
                     if(!empty($_POST['cost'] ) && $_POST['cost'] < 10000000000000){
                         $cost=$_POST['cost'];
                         $e=1;
                     }
                     if(!empty($_POST['sch1'])){
                         $sch1=$_POST['sch1'];
                         $f=1;
                     }
                     if($c!=0 && $d!=0 && $e!= 0 && $f!=0){
 
                         $stmt= "SELECT *
                                FROM
                                  vendors
                                WHERE 
                                  type = '$vdt' and location = '$loc1' and hire_cost <= '$cost' and vendor_schedule like '%$sch1%'";
                                  $returnobject=$con->query($stmt);
                                  $table=$returnobject->fetchAll(PDO::FETCH_NUM);
                                  foreach($table as $row){
                                     echo "<tr> <td>"
                                    . $row[2]. "</td><td>"
                                    . $row[1]. "</td><td>"
                                    . $row[6]. "</td><td>"
                                    . $row[3]. "</td><td>"
                                    . $row[4]. "</td><td>"
                                    . $row[5]. "</td><td>"
                                    . $row[7]. "</td><td>"
                                    . $row[10]. "</td><td>"
                                    . $row[8]. "</td><td>"
                                    . $row[9]. "</td></tr>"  ;
              
                                 }
                              }
                              if($c != 0){
                                 $stmt=  "SELECT *
                                          FROM
                                              vendors
                                          WHERE 
                                              type = '$vdt'";
                                              
                                              $returnobject=$con->query($stmt);
                                              $table=$returnobject->fetchAll(PDO::FETCH_NUM);
                                              foreach($table as $row){
                                                echo "<tr> <td>"
                                               . $row[2]. "</td><td>"
                                               . $row[1]. "</td><td>"
                                               . $row[6]. "</td><td>"
                                               . $row[3]. "</td><td>"
                                               . $row[4]. "</td><td>"
                                               . $row[5]. "</td><td>"
                                               . $row[7]. "</td><td>"
                                               . $row[10]. "</td><td>"
                                               . $row[8]. "</td><td>"
                                               . $row[9]. "</td></tr>"  ;
                         
                                            }
                                         }
                                         if($d != 0){
                                             $stmt=  "SELECT *
                                                      FROM
                                                          vendors
                                                      WHERE 
                                                          location = '$loc1'";
                                                          $returnobject=$con->query($stmt);
                                                          $table=$returnobject->fetchAll(PDO::FETCH_NUM);
                                                          foreach($table as $row){
                                                            echo "<tr> <td>"
                                                           . $row[2]. "</td><td>"
                                                           . $row[1]. "</td><td>"
                                                           . $row[6]. "</td><td>"
                                                           . $row[3]. "</td><td>"
                                                           . $row[4]. "</td><td>"
                                                           . $row[5]. "</td><td>"
                                                           . $row[7]. "</td><td>"
                                                           . $row[10]. "</td><td>"
                                                           . $row[8]. "</td><td>"
                                                           . $row[9]. "</td></tr>"  ;
                                     
                                                        }
                                             }
                                             if($e != 0){
                                                 $stmt=  "SELECT *
                                                          FROM
                                                              vendors
                                                          WHERE 
                                                              hire_cost <= '$cost'";
                                                              $returnobject=$con->query($stmt);
                                                              $table=$returnobject->fetchAll(PDO::FETCH_NUM);
                                                              foreach($table as $row){
                                                                echo "<tr> <td>"
                                                               . $row[2]. "</td><td>"
                                                               . $row[1]. "</td><td>"
                                                               . $row[6]. "</td><td>"
                                                               . $row[3]. "</td><td>"
                                                               . $row[4]. "</td><td>"
                                                               . $row[5]. "</td><td>"
                                                               . $row[7]. "</td><td>"
                                                               . $row[10]. "</td><td>"
                                                               . $row[8]. "</td><td>"
                                                               . $row[9]. "</td></tr>"  ;
                                         
                                                            }
                                                 }
                                                 if($f != 0){
                                                     $stmt=  "SELECT *
                                                              FROM
                                                                  vendors
                                                              WHERE 
                                                              vendor_schedule LIKE '%$sch1%'";
                                                                  $returnobject=$con->query($stmt);
                                                                  $table=$returnobject->fetchAll(PDO::FETCH_NUM);
                                                                  foreach($table as $row){
                                                                    echo "<tr> <td>"
                                                                   . $row[2]. "</td><td>"
                                                                   . $row[1]. "</td><td>"
                                                                   . $row[6]. "</td><td>"
                                                                   . $row[3]. "</td><td>"
                                                                   . $row[4]. "</td><td>"
                                                                   . $row[5]. "</td><td>"
                                                                   . $row[7]. "</td><td>"
                                                                   . $row[10]. "</td><td>"
                                                                   . $row[8]. "</td><td>"
                                                                   . $row[9]. "</td></tr>"  ;
                                             
                                                                }
                                                     }
                     
                }
                else{
                    echo "kisui nah";
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
