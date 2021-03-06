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
    <title>Log Ukur</title>
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
                            <strong class="card-title" v-if="headerText">Log Ukur</strong>
                            
                        </div>
                        
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Kelembaban (%)</th>
                                        <th>Berat (kg)</th>
                                        <th>Pompa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $role = $_SESSION['login_role'];
                                    include 'db_access.php';                                         
                                    $load = mysqli_query($conn, "SELECT * FROM data_sampah ORDER BY id ASC");   
                                    while ($row = mysqli_fetch_array($load)){
                                    echo '<tr>';
                                        echo '<td>'.$row['id'].'</td>';
                                        echo '<td>'.$row['waktu'].'</td>';
                                        echo '<td>'.$row['kelembaban'].'</td>';
                                        echo '<td>'.$row['berat'].'</td>';
                                        echo '<td>'.$row['pompa'].'</td>';                     
                                    echo '</tr>';
                                    $last_id =$row['id']; 
                                    }   
                                ?>
                                </tbody>
                            </table>                                    
                        </div>
                        <div class="card-header">
                        
                        <div class="float-right">
                            <?php if($req < 1){ ?>
                                <a href="form/request.php?last=<?php echo $last_id; ?>&user=<?php echo $_SESSION['login_id']; ?>">
                                <?php if ($role == 'Karyawan') { ?>
                                    <button type="button" class="btn btn-primary btn-sm">Minta Angkut</button>
                                <?php } else { ?> 
                                <?php } ?>
                                </a>
                                <?php } ?>
                            </div>      
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
