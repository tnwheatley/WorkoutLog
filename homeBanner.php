<?php
  require_once 'header.php';


echo <<<_header
<body>

<!-- -------- START HEADER 11 w/ carousel ------- -->
<header>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="page-header min-vh-75" style="background-image: url('WeightLiftingUnsplash.jpg');" loading="lazy">
          <span class="mask bg-gradient-dark"></span>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 my-auto">
                <h1 class="text-white mb-0 fadeIn1 fadeInBottom">Motivate: Fitness Tracker</h1>
                <br><h4 class="text-white fadeIn2 fadeInBottom">Motivation</h4>
                <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">A fitness tracker is an excellent motivational tool.  Seeing your progress will likely help create a sense of pride in what you have accomplished and help motivate you to keep going.</p>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="carousel-item">
        <div class="page-header min-vh-75" style="background-image: url('Morning-Run-Female.jpg');" loading="lazy">
          <span class="mask bg-gradient-dark"></span>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 my-auto">
              <h1 class="text-white mb-0 fadeIn1 fadeInBottom">Motivate: Fitness Tracker</h1>
              <br><h4 class="text-white fadeIn2 fadeInBottom">Track Progress</h4>
                <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Maintaining a fitness tracker helps a person keep track of progress and see firsthand if he or she is sticking to a steady exercise routine.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="page-header min-vh-75" style="background-image: url('picture3.jpg');" loading="lazy">
          <span class="mask bg-gradient-dark"></span>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 my-auto">
              <h1 class="text-white mb-0 fadeIn1 fadeInBottom">Motivate: Fitness Tracker</h1>
              <br><h4 class="text-white fadeIn2 fadeInBottom">Accountability</h4>
                <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">It's one thing to set a goal and another to develop an implementation plan for achieving it.  A fitness tracker provides a record of measurable progress, which is critical for achieving your goals.</p>
              </div>
            </div>
          </div>
        </div>              
      </div>
    </div>
    <div class="min-vh-75 position-absolute w-100 top-0">
      <a class="carousel-control-prev ms-0 ms-md-n5 mt-12 mb-n7 mt-md-0 mb-md-0" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next ms-0 ms-md-n5 mt-12 mb-n7 mt-md-0 mb-md-0" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
</header>
<!-- -------- END HEADER 11 w/ carousel ------- -->
_header;

echo <<<_header2

    <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/mattboldt/typed.js/ -->
  <script src="assets/js/plugins/typedjs.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="assets/js/material-kit-pro.min.js?v=3.0.1" type="text/javascript"></script>


  </body>
</html>
_header2;


?>
