<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guru | <?php echo $title . ( isset($sub_title) ? '- '.$sub_title : null  ); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta content="<?php echo base_url(); ?>" name="base_url">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,600,700|Roboto+Slab" rel="stylesheet">

  <style media="screen">
    *, .font-heading{
      font-family: "Fira Sans", sans-serif;
    }
    h1,h2,h3,h4,h5,h6, .font-heading{
      font-family: "Roboto Slab";
    }
    #loader{
      position: fixed;
      top: 0;
      left: 0;
      width:100%;
      height: 100vh;
      background: #fff;
      z-index: 999999999999999;
    }
    #loader .text-loader{
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);

    }
  </style>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div id="loader">
  <div class="text-loader">
    <b>Loading...</b>
  </div>
</div>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SMK</b>BA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SMK </b>BUDI AGUNG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs text-capitalize"><?php echo $this->session->userdata('user_data')->teacher_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                <p>
                  <span class="text-capitalize"><?php echo $this->session->userdata('user_data')->teacher_name; ?></span>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" id="logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="text-capitalize"><?php echo $this->session->userdata('user_data')->teacher_name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php echo ($menu == 'dashboard') ? 'class="active"' : null; ?>>
          <a href="<?php echo base_url('guru'); ?>">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?php echo ($menu == 'upload') ? 'active' : null; ?>">
          <a href="#">
            <i class="fa fa-cloud-upload"></i> <span>Upload</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo ( $menu == 'upload' && (isset($submenu) ? $submenu : null) == 'silabus') ? 'class="active"' : null; ?>>
              <a href="<?php echo base_url('guru/upload/silabus'); ?>">
                <i class="fa fa-circle-o"></i> Silabus
              </a>
            </li>
            <li <?php echo ( $menu == 'upload' && (isset($submenu) ? $submenu : null) == 'rpp') ? 'class="active"' : null; ?>>
              <a href="<?php echo base_url('guru/upload/rpp'); ?>">
                <i class="fa fa-circle-o"></i> RPP
              </a>
            </li>
            <li <?php echo ( $menu == 'upload' && (isset($submenu) ? $submenu : null) == 'modul') ? 'class="active"' : null; ?>>
              <a href="<?php echo base_url('guru/upload/modul'); ?>">
                <i class="fa fa-circle-o"></i> Modul
              </a>
            </li>
          </ul>
        </li>
        <li <?php echo ($menu == 'teach') ? 'class="active"' : null; ?>>
          <a href="<?php echo base_url('guru/mengajar'); ?>">
            <i class="fa fa-laptop"></i> <span>Mengajar</span>
          </a>
        </li>
        <li <?php echo ($menu == 'schedule') ? 'class="active"' : null; ?>>
          <a href="<?php echo base_url('guru/jadwal'); ?>">
            <i class="fa fa-calendar"></i> <span>Jadwal</span>
          </a>
        </li>
        <li <?php echo ($menu == 'score') ? 'class="active"' : null; ?>>
          <a href="<?php echo base_url('guru/nilai-siswa'); ?>">
            <i class="fa fa-users"></i> <span>Nilai Siswa</span>
          </a>
        </li>

        <li class="header">USER NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="#"><i class="fa fa-circle-o"></i> Lihat Profil</a> </li>
            <li> <a href="#"><i class="fa fa-circle-o"></i> Edit Profil</a> </li>
            <li> <a href="#"><i class="fa fa-circle-o"></i> Ganti Password</a> </li>
            <li> <a href="#"><i class="fa fa-circle-o"></i> Ganti Foto Profil</a> </li>
          </ul>
        </li>
        <li>
          <a href="#" id="logout">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
          </a>
          <form id="form-logout" action="<?php echo base_url('logout'); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo $this->Guard->token; ?>">
          </form>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-capitalize">
        <?php echo $title; ?>
        <small><?php echo $sub_title ?></small>
      </h1>
      <ol class="breadcrumb">
        <?php
        $i= 0;
        foreach ($breadcumbs as $key => $link) {
          if ($i+1>=2 && $i == count($breadcumbs) - 1) {
            ?>
            <li class="active text-capitalize"><?php echo $breadcumbs[0]; ?></li>
            <?php
          }
          else{
            if (count($breadcumbs) == 1) {
              ?>
              <li class="active text-capitalize"><?php echo $breadcumbs[0]; ?></li>
              <?php
            }
            else{
              ?>
              <li><a href="<?php echo base_url('guru/'.$link); ?>" class="text-capitalize"><?php echo $key; ?></a></li>
              <?php
            }
          }
          $i++;
        }
         ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php $this->load->view('site/teacher/'.$content, $data) ?>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>SMKN 1 Subang</b>
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">MagiClap</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>

<script type="text/javascript">
  $(window).on('load', function () {
    $('#loader').fadeOut('slow');
  });

  $(document).ready(function () {
    $('body').delegate('#logout', 'click', function(event) {
      $('#form-logout').submit();
    });
  });
</script>

<?php if (isset($script)): ?>
  <script type="text/javascript" src="<?php echo base_url('assets/js/page/' . $script . '.js'); ?>"></script>
<?php endif; ?>

</body>
</html>
