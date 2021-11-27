<?php
session_start();
include('dbconn.php');
error_reporting(0);

if(isset($_POST['save']))
{
//Getting Post Values

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$msg = $_POST['msg'];
$phoneNo = $_POST['number'];
$date = $_POST['appointment'];


 // Query for Insertion
 $sql="INSERT INTO `patient`(firstname,lastname,telephone,msg,appointment)";
 $query = $dbh->prepare($sql);
 // Binding Post Values
 
 $query->bindParam(':fname',$fname,PDO::PARAM_STR);
 $query->bindParam(':lname',$lname,PDO::PARAM_STR);
 $query->bindParam(':msg',$msg,PDO::PARAM_STR);
 $query->bindParam(':number',$phoneNo,PDO::PARAM_STR);
 $query->bindParam(':appointment',$date,PDO::PARAM_STR);
 $query->execute();
 $lastInsertId = $dbh->lastInsertId();


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Dental Appointment</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="appointment.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Dental Clinic</span>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="register.php">Sign In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
        <header class="section-header">
          <h2>Appointment</h2>
         <p>Book an Appointment</p> 
        </header>
            
       <center> <form class="w-full max-w-lg mx-auto" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" name="fname" type="text" placeholder="Jane" required>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Last Name
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="lname" id="grid-last-name" type="text" placeholder="Doe" required>
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
       Appointment Date
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name ="appointment" id="grid-password" type="date">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full  px-3 ">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Phone Number
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" name="number" type="tel" placeholder=" +233 242617934" required>
    </div>
</div>


<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full  px-3 ">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Message
      </label>
      <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="msg" id="grid-city" type="text" placeholder=" Enter message"></textarea>
    </div>
</div>
<button type ="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="save" type="button">
        Send Message
      </button>
</form></center>
</div>
          
        </div>
  
      </div>
    </div>

  </section><!-- End Hero -->


  