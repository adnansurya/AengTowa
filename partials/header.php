<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img width = "100px" src="images/LogoAeng.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    
                    <?php if(isset($_SESSION['login_user'])){?>

                        <div class="header-left">
                        <?php
                            $role = $_SESSION['login_role'];
                            include 'db_access.php';
                            $req = 0;
                            $load = mysqli_query($conn, "SELECT * FROM permintaan WHERE status='BELUM SELESAI' ORDER BY id ");   
                            while ($row = mysqli_fetch_array($load)){
                                $req++;
                            }

                        ?>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $req; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Ada <?php echo $req; ?> Permintaan</p>
                                <?php
                                    
                                    $load = mysqli_query($conn, "SELECT * FROM permintaan WHERE status='BELUM SELESAI' ORDER BY id");   
                                    while ($row = mysqli_fetch_array($load)){
                                        
                                        echo '
                                        <a class="dropdown-item media" href="#">
                                            <i class="fa fa-check"></i>
                                            <p>Request Pada '.$row['waktu'].'.</p>
                                        </a>
                                        
                                        ';
                                    }
                                ?>                                
                            </div>
                        </div>
                        
                    </div>

                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($role == 'Karyawan') { ?>
                                <img class="user-avatar rounded-circle" src="images/Group 4.png" alt="User Avatar">
                                <?php } else { ?> 
                                <img class="user-avatar rounded-circle" src="images/user.png"  alt="User Avatar">
                                <?php } ?>
                            </a> 
                                
                            <div class="user-menu dropdown-menu">
                                <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>                           -->

                                <!-- <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a> -->

                                <a class="nav-link" href="form/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                            </div>
                        </div>
                    <?php } else { ?>                       
                    
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Login
                        </a>                                                
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="login.php"><i class="fa fa-user"></i>Karyawan</a>                          
                            <a class="nav-link" href="login_petugas.php"><i class="fa fa-cog"></i>Petugas</a>    
                        </div>
                    </div>


                    <?php } ?>
                </div>
            </div>
        </header><!-- /header -->