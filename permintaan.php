<?php
    
    
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:index.php");
        die();        
    }   
    $user_check = $_SESSION['login_user'];

    $last_id = 0;

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->


<head>
    <title>Daftar Permintaan</title>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

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

           
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Daftar Permintaan</strong>
                            
                        </div>
                        
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Karyawan</th>
                                        <th>Status</th>                                        
                                        <th>Petugas</th>
                                        <th>Tindakan</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'db_access.php';    
                                        $sql = "SELECT permintaan.id as id_permintaan, permintaan.waktu as waktu_lapor, petugas.nama as petugas , karyawan.nama as karyawan, data_sampah.* FROM (((permintaan LEFT JOIN user petugas ON permintaan.petugas_id = petugas.id) LEFT JOIN user karyawan ON permintaan.user_id = karyawan.id) LEFT JOIN data_sampah ON permintaan.last_report_id = data_sampah.id) ";                                     
                                    $load = mysqli_query($conn, $sql );   
                                    while ($row = mysqli_fetch_array($load)){
                                    echo '<tr>';
                                        echo '<td>'.$row['id_permintaan'].'</td>';
                                        echo '<td>'.$row['waktu_lapor'].'</td>';
                                        echo '<td>'.$row['karyawan'].'</td>';
                                        echo '<td><small>Kelembaban : </small> '.$row['kelembaban'].' % <br><small>Berat : </small>'.$row['berat'].' kg </td>';                                        
                                        echo '<td>'.$row['petugas'].'</td>';
                                        if($row['petugas'] == ''){

                                          if ($role == 'Petugas') { 

                                            echo '<td>
                                                    <a href="form/angkut.php?id='.$row['id_permintaan'].'&petugas='. $_SESSION['login_id'].'">
                                                        <button type="button" class="btn btn-warning btn-sm">Angkut</button>
                                                    </a>
                                            
                                            </td>';

                                          }else{
                                            echo '<td>
                                                    <a href="#">
                                                        <button type="button" class="btn btn-warning btn-sm">Belum Diangkut</button>
                                                    </a>
                                            
                                            </td>';
                                          }
                                        }else{
                                        echo '<td>
                                                <a href="#">
                                                    <button type="button" class="btn btn-success btn-sm">Selesai</button>
                                                </a>
                                        
                                        </td>';
                                        }                   
                                    echo '</tr>';
                                    $last_id =$row['id_permintaan']; 
                                    }   
                                ?>
                                </tbody>
                            </table>                                    
                        </div>
                       
                    
                       
                    <div>

                           
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
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#bootstrap-data-table').DataTable({
                    "order": [[ 0, "desc" ]],
                    "columnDefs" : [
                        {
                            "targets" : [0],
                            "visible" : false
                        }
                    ]
                });
        } );
    </script>


</body>
</html>
