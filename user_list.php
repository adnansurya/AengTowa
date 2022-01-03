<?php
    
    
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:index.php");
        die();        
    }   
    $user_check = $_SESSION['login_user'];
    $role = $_SESSION['login_role'];
    if($role != 'Admin'){
        header("location:index.php");
        die();  
    }




?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->


<head>
    <title>Daftar Pengguna</title>
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
                            <strong class="card-title" v-if="headerText">Daftar Pengguna</strong>
                            <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#detailModal"><i class="fa fa-plus"></i> Tambah User</button>
                        </div>
                        
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>                                        
                                        <th>Role</th>
                                        <th>Email</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'db_access.php';    
                                        $sql = "SELECT * from user";                                     
                                    $load = mysqli_query($conn, $sql );   
                                    while ($row = mysqli_fetch_array($load)){
                                    echo '<tr>';
                                        echo '<td>'.$row['id'].'</td>';
                                        echo '<td>'.$row['nama'].'</td>';
                                        echo '<td>'.$row['username'].'</td>';
                                        echo '<td>'.$row['password'].'</td>';  
                                        echo '<td>'.$row['role'].'</td>';                                        
                                        echo '<td>'.$row['email'].'</td>';                                                  
                                    echo '</tr>';
                        
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

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                                   
                            <form action="form/add_user.php" method="post">
                                    
                                <div class="form-group">
                                    <label class="small mb-1" for="nameTxt">Nama</label>
                                    <input class="form-control py-4" type="text" name="nama" required/>
                                </div> 
                                <div class="form-group">
                                    <label class="small mb-1" for="usernameTxt">Username</label>
                                    <input class="form-control py-4" id="usernameTxt" type="text" name="username" required/>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="passTxt">Password</label>
                                    <input class="form-control py-4" id="passTxt" type="password" name="pass" required/>
                                </div>  
                                <div class="form-group">
                                    <label class="small mb-1" for="roleSel">Role</label>
                                    <select class="form-control" id="roleSel" name="role">
                                        <option value="Petugas">Petugas</option>
                                        <option value="Karyawan">Karyawan</option>                                                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="emailTxt">Email</label>
                                    <input class="form-control py-4" type="email" name="email" required/>
                                </div>                                                              
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                    <button class="btn btn-primary"  type="submit">Simpan</button>
                                </div>
                            </form>
                            

                        </div>
                    
                    </div>
                </div>
            </div>
    
    <?php include 'partials/footer.php'; ?>

</div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include 'partials/scripts.php'; ?>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <!-- <script type="text/javascript">
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
    </script> -->
    <script src="assets/js/tabledit/jquery.tabledit.min.js"></script>
        <script>
             $('#bootstrap-data-table').Tabledit({
            url: 'form/edit_user.php',
            columns: {
                identifier: [0, 'id_user'],
                restoreButton: false,
                editable: [[1, 'nama'], [2, 'username'], [3, 'password'], [4, 'role'], [5, 'email']]
            },buttons: {
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: 'Hapus',
                    action: 'delete'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Yakin?'
                },
                edit: {
                    class: 'btn btn-sm btn-info',
                    html: 'Edit',
                    action: 'edit'
                }
            },
        });
        </script>


</body>
</html>
