<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li> 
                <?php if(isset($_SESSION['login_user'])){
                    $role = $_SESSION['login_role'];
                    ?>
                    <li>    
                        <a href="data.php"><i class="menu-icon fa fa-list"></i>Data Log</a>
                    </li>
                    <li>
                 
                        <a href="permintaan.php"><i class="menu-icon fa fa-question"></i>Permintaan</a>
                
                  
                    </li>  
                    
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->