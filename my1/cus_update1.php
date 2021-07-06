
<?php
session_start();
    $userid="";
    $pass="";

    $cusid="";
    $cusname="";
	$add="";
    $con="";
	$mail="";
    $usname="";
    $cuspass="";


if(isset($_POST['userid'])  && isset($_POST['pass'])  ){


    $userid=$_POST['userid'];
    $pass=$_POST['pass'];

    // db connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goldenchandelier";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($userid == $_SESSION['uname']){
            $stmt="SELECT * FROM customers  where  cus_username='$userid' and  cus_password= '$pass' ";
            $returnobject= $conn->query($stmt);

            $tb= $returnobject->fetchAll(PDO::FETCH_NUM);
            if(empty($tb[0][1]) && empty($tb[0][2] ) ) {
                echo "customer userid ='$userid' or customer password= '$pass' doesn't exist" ;
                header('location: cus_edit_profile.php');

            }
            else{
            // echo "exists" ;

            $cusid=$tb[0][0];
                $cusname=$tb[0][1];
                $add=$tb[0][2];

                $con=$tb[0][3];
                $mail=$tb[0][4];
                $usname=$tb[0][5];
                $cuspass=$tb[0][6];

            }
        }else{
            echo "customer userid ='$userid' or customer password= '$pass' not correct" ; 
            header('location: cus_edit_profile.php');
        }

        

    }catch(PDOException $e) {
        echo "Database operation error";
     }

    $conn = null;

   }
   else{
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
    <!-- Hero Section Begin -->
    <div class="hero-section set-bg" data-setbg="img/events-5.jpg">
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
                            <h2>Edit Profile</h2>

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
    <div class="classes-time-section spad " style="  padding-top: 65px;padding-bottom: 211px;padding-left:250px;">
        <div class="container">
          <div align="center">
            <div class="row">

              </div>

              <form method="post" action="cus_update2.php">

              <div class="form-group row">
                <label for="cusid" class="col-sm-2 col-form-label">Customer Id (you can't change this value)</label>

                <div class="col-sm-6">
                    <input type="text" id="cusid" name="cusid" value="<?php echo $cusid;?>" class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for="cusname" class="col-sm-2 col-form-label">Customer  Name</label>
                  <div class="col-sm-6">
                   <input type="text" id="cusname" name="cusname" value="<?php echo $cusname;?>"class="form-control">
                </div>
              </div>

              <div class="form-group row">

                <label for="add" class="col-sm-2 col-form-label">Address</label>

                <div class="col-sm-6">
                    <input type="text" id="add" name="add" value="<?php echo $add;?>" class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for=" con" class="col-sm-2 col-form-label">Contact</label>


                <div class="col-sm-6">
                    <input type="text" id="con" name="con"  value="<?php echo $con;?>"  class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for="mail" class="col-sm-2 col-form-label">Email </label>


                <div class="col-sm-6">
                    <input type="text" id="mail" name="mail" value="<?php echo $mail;?>" class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for=" usname" class="col-sm-2 col-form-label">User Name</label>

                <div class="col-sm-6">
                    <input type="text" id="usname" name="usname"  value="<?php echo $usname;?>" class="form-control" >
                </div>
              </div>


              <div class="form-group row">

                <label for="cuspass" class="col-sm-2 col-form-label">password </label>


                <div class="col-sm-6">
                    <input type="password"  id="cuspass" name="cuspass" value="<?php echo $cuspass;?>" class="form-control" >
                </div>
              </div>



              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                </div>
              </div> </div>
  </form>

  <?php
      if(isset($_GET['status'])){
          $status=$_GET['status'];
          if($status=='invalid'){
              echo "<script>window.alert('invalid input')</script>";
          }
          else if($status=='dberror'){
              echo "<script>window.alert('Database Connection Error')</script>";
          }
          else if($status=='wrongdata'){
              echo "<script>window.alert('wrong/missing input')</script>";
          }
      }

  ?>









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
