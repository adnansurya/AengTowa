<?php
    session_start();
    if(isset($_SESSION['login_user'])){
        $user_check = $_SESSION['login_user'];
    }
    
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <title>Tempat Sampat Pintar</title>
    <?php include 'partials/head.php'; ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <?php include 'partials/left.php'; ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'partials/header.php'; ?>
        <!-- Header-->       

        <div class="content">           
            <p><?php if(isset($_SESSION['login_user'])) {echo 'Selamat Datang, '.$user_check;}?></p>
            <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="images/carousel/bismillah (1).jpg" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="images/carousel/bismillah (2).jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="images/carousel/bismillah (3).jpg" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                </div>
            <div class="row mt-2">
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center bg-success text-white">                       
                        <div class="card-body">
                            <i class="fa fa-phone fa-5x mb-3"></i>
                            <h3>CALL NUMBER</h3>
                            <p class="text-white"> (0411) 8217133</p>
                          
                            
                        </div>
                    </div>                
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center">                       
                        <div class="card-body">
                            <i class="fa fa-ambulance fa-5x mb-3"></i>
                            <h3>UNIT UGD</h3>
                            <p>Instalasi Gawat Darurat Puskesmas Aeng Towa melayani kegawatdaruratan medik baik kasus trauma maupun non trauma, termasuk resusitasi secara optimal dan profesional.</p>
                    
                        </div>
                    </div>                
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center">                       
                        <div class="card-body">
                            <i class="fa fa-user-md fa-5x mb-3"></i>
                            <h3>TENAGA MEDIS</h3>
                            <p>didukung oleh tenaga kerja medis yang terlatih dan memilih sertifikat penanggulangan pasien gawat darurt (PPGD)advance trauma</p>
                          
                            
                        </div>
                    </div>                
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center">                       
                        <div class="card-body">
                            <i class="fa fa-clock-o fa-5x mb-3"></i>
                            <h3>PELAYANAN 24 JAM</h3>
                            <p>Pelayanan 7 hari dalam seminggu dengan dokter umum dan perawatan yang profesional didukung oleh dokter spesialis yang dapat dihubungi setiap waktu.</p>
                          
                            
                        </div>
                    </div>                
                </div>
            </div>
                
            
            
        </div>
 







    <div class="clearfix"></div> 
    
    <?php include 'partials/footer.php'; ?>

</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include 'partials/scripts.php'; ?>


</body>
</html>
