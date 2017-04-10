<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url();?>asset/dkpp.ico" />
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css">
    <!-- Metro Icons Font -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/metro-icons/css/metro-icons.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/ionicons/css/ionicons.min.css">
	<!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
	<!-- select2-->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
	<script type="text/javascript">
		function confirmSubmit()
		{
			var agree=confirm("Apakah anda yakin ingin melanjutkan aksi ini?");
			if (agree)
			return true ;
			else
			return false ;
		}
	</script>
    <div class="wrapper">
<?php foreach($pengguna->result_array() as $user)?>
      <header class="main-header" style="width:100%;position:fixed">
        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <span class="logo-mini"><b>KMS</b></span>
          <span class="logo-lg"><b>KMS DKPP</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" id="notif" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning" id="notifikasi"></span>
                </a>
<script type="text/javascript"  src="<?php echo base_url();?>asset/jquery.min.js"></script>
<script>
function cek(){
    $.ajax({
        url: "<?php echo base_url('web/cek_notif');?>",
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
        }
    });
    var waktu = setTimeout("cek()",2000);
}

$(document).ready(function(){
    cek();
	$("#notif").click(function(){
        $.ajax({
        url: "<?php echo base_url('web/update_notif');?>",
    });

    });
});
</script>
<script>
function validasi(){
    $.ajax({
        url: "<?php echo base_url('web/cek_validasi');?>",
        cache: false,
        success: function(msg){
            $("#validasi").html(msg);
        }
    });
    var waktu = setTimeout("validasi()",2000);
}

$(document).ready(function(){
    validasi();
});
</script>

<script>
function validasi_t(){
    $.ajax({
        url: "<?php echo base_url('web/cek_validasi_t');?>",
        cache: false,
        success: function(msg){
            $("#validasi_t").html(msg);
        }
    });
    var waktu = setTimeout("validasi_t()",2000);
}

$(document).ready(function(){
    validasi_t();
});
</script>

<script>
function validasi_e(){
    $.ajax({
        url: "<?php echo base_url('web/cek_validasi_e');?>",
        cache: false,
        success: function(msg){
            $("#validasi_e").html(msg);
        }
    });
    var waktu = setTimeout("validasi_e()",2000);
}

$(document).ready(function(){
    validasi_e();
});
</script>
<script>
function revisi(){
    $.ajax({
        url: "<?php echo base_url('web/cek_revisi');?>",
        cache: false,
        success: function(msg){
            $("#revisi").html(msg);
            $("#revisi1").html(msg);
        }
    });
    var waktu = setTimeout("revisi()",2000);
}

$(document).ready(function(){
    revisi();
});
</script>

<script>
function cek1(){
    $.ajax({
        url: "<?php echo base_url('web/cek_notif');?>",
        cache: false,
        success: function(msg){
            $("#ps").html(msg);
        }
    });
    var waktu = setTimeout("cek1()",2000);
}

$(document).ready(function(){
    cek1();
	$("#notif1").click(function(){
        $.ajax({
        url: "<?php echo base_url('web/update_notif');?>",
    });

    });
});
</script>
                <ul class="dropdown-menu" style="height:auto;">
                  <li style="height:auto;">
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" style="height:auto;">
					<?php foreach($notif->result_array() as $notif){?>
                      <li>
					  <?php if($notif['kategori']=='tacit'){?>
                        <a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                          <i class="fa fa-comments-o text-blue"></i> <?php echo $notif['nama'];?> <br/>mengomentari masalah & solusi Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                        </a>
					  <?php } ?>
					  <?php if($notif['kategori']=='explicit'){?>
                        <a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                          <i class="fa fa-comments-o text-blue"></i> <?php echo $notif['nama'];?> <br/>mengomentari dokumen Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                        </a>
					  <?php } ?>
					  <?php if($notif['kategori']=='like_t'){?>
								<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-heart text-red"></i> <?php echo $notif['nama'];?> <br/>menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
							<?php if($notif['kategori']=='like_e'){?>
								<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-heart text-red"></i> <?php echo $notif['nama'];?> <br/>menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
					  <?php if($notif['kategori']=='v_tacit'){?>
                        <a href="<?php echo base_url('web/lihat_masalah_solusi');?>" style="height:auto;">
                          <i class="fa fa-certificate text-aqua"></i> Masalah & Solusi divalidasi<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                        </a>
					  <?php } ?>
					  <?php if($notif['kategori']=='v_explicit'){?>
                        <a href="<?php echo base_url('web/lihat_dokumen');?>" style="height:auto;">
                          <i class="fa fa-certificate text-aqua"></i> Dokumen divalidasi<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                        </a>
					  <?php } ?>
					  <?php if($notif['kategori']=='reward'){?>
                        <a href="<?php echo base_url('web/my_reward');?>" style="height:auto;">
                          <i class="fa fa-gift text-yellow"></i> Anda mendapatkan reward<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                        </a>
					  <?php } ?>
                      </li>
                    <?php } ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url('web/semua_notifikasi');?>">Lihat Semua Notifikasi</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Persentase Validasi</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
					<?php 
					foreach($valid_t->result_array() as $t)
					foreach($nvalid_t->result_array() as $nt)
						$v_t			= $t['v_t'];
						$nv_t 			= $nt['v_t'];
						$total_tacit	= $v_t+$nv_t;
						@$pre_t			= $v_t/$total_tacit*100;
					?>
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Data Masalah & Solusi
                            <small class="pull-right"><?php echo substr($pre_t,0,4);?>% dari <?php echo $total_tacit;?> posting</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width:<?php echo $pre_t;?>%" role="progressbar" aria-valuenow="<?php echo $pre_t;?>" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only"><?php echo $pre_t;?>% Valid</span>
                            </div>
                          </div>
                        </a>
						</li><!-- end task item -->
					<?php 
					foreach($valid_e->result_array() as $e)
					foreach($nvalid_e->result_array() as $ne)
						$v_e			= $e['v_e'];
						$nv_e 			= $ne['v_e'];
						$total_e		= $v_e+$nv_e;
						@$pre_e			= $v_e/$total_e*100;
					?>
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Data Dokumen
                            <small class="pull-right"><?php echo substr($pre_e,0,4);?>% dari <?php echo $total_e;?> posting</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $pre_e;?>%" role="progressbar" aria-valuenow="<?php echo $pre_e;?>" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only"><?php echo $pre_e;?>% Valid</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $user['nama'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $user['nama'];?> <br/> <?php echo $user['nama_jabatan'];?> <br/>
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="col-xs-6 text-center">
                      <a href="<?php echo base_url('web/edit_profil');?>">Edit Profil</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="<?php echo base_url('web/edit_password');?>">Edit Password</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('web/profil');?>" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>web/logout" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="position:fixed">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
			  <img src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" alt="User Image">
            </div>
            <div class="pull-left info">
				<p><?php if($user['hak_akses']=='1'){ echo "Login as: Anggota Lumbung";}?></p>
				<p><?php if($user['hak_akses']=='2'){ echo "Login as: Kasubbid";}?></p>
				<p><?php if($user['hak_akses']=='3'){ echo "Login as: Admin";}?></p>
				<p><?php if($user['hak_akses']=='4'){ echo "Login as: Pakar";}?></p>
				<?php echo $user['poin'];?> Poin
            </div>
          </div>
		  <div style="clear:both"></div>
          <!-- search form -->
		  <form action="<?php echo base_url();?>web/search" method="post" enctype="multipart/form-data" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
		  
		  <!----- .menu anggota lumbung -------->
		  <?php if($user['hak_akses']=='1'){?>
          <!-- Menu Sidebar --->
          <ul class="sidebar-menu">
			<li>
              <a href="<?php echo base_url('web/data_masalah_solusi');?>">
                <i class="fa fa-share-alt"></i> <span>Data Masalah & Solusi</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/data_dokumen');?>">
                <i class="fa fa-file-text"></i> <span>Data Dokumen</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Pengetahuan Saya</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Masalah dan Solusi<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web');?>/lihat_masalah_solusi"><i class="fa fa-circle-o"></i>Lihat Masalah dan Solusi</a></li>
						<li><a href="<?php echo base_url('web');?>/input_masalah_solusi"><i class="fa fa-circle-o"></i>Input Masalah dan Solusi</a></li>
					</ul>
				</li>
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Dokumen<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web/lihat_dokumen');?>"><i class="fa fa-circle-o"></i>Lihat Dokumen</a></li>
						<li><a href="<?php echo base_url('web/input_dokumen');?>"><i class="fa fa-circle-o"></i>Input Dokumen</a></li>
					</ul>
				</li>
              </ul>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span>Pengetahuan Yg Dibagikan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/pengetahuan_tacit_dibagikan');?>"><i class="fa fa-circle-o"></i>Masalah & Solusi Yg Dibagikan</a></li>
                <li><a href="<?php echo base_url('web/pengetahuan_explicit_dibagikan');?>"><i class="fa fa-circle-o"></i>Dokumen Yg Dibagikan</a></li>
              </ul>
            </li>
			<li>
              <a href="<?php echo base_url('web/problem_solving');?>">
                <i class="fa fa-gears"></i> <span>Problem Solving</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/posting_disukai');?>">
                <i class="fa fa-heart"></i> <span>Posting disukai</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span> Penerima Rewards</span><i class="fa fa-angle-left pull-right"></i>
              </a>
			  <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/penerima_reward');?>"><i class="fa fa-circle-o"></i>Penerima reward</a></li>
                <li><a href="<?php echo base_url('web/my_reward');?>"><i class="fa fa-circle-o"></i>My Reward</a></li>
              </ul>
            </li>
          </ul>
		  <!----/.menu sidebar-->
		  <?php } ?>
		   <!----- .menu anggota lumbung -------->
		  
		   <!----- menu kasubbid -------->
		  <?php if($user['hak_akses']=='2'){?>
          <!-- Menu Sidebar --->
          <ul class="sidebar-menu">
			<li>
              <a href="<?php echo base_url('web/data_masalah_solusi');?>">
                <i class="fa fa-share-alt"></i> <span>Data Masalah & Solusi</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/data_dokumen');?>">
                <i class="fa fa-file-text"></i> <span>Data Dokumen</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-share-alt"></i> <span>Pengetahuan Saya</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Masalah dan Solusi<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web');?>/lihat_masalah_solusi"><i class="fa fa-circle-o"></i>Lihat Masalah dan Solusi</a></li>
						<li><a href="<?php echo base_url('web');?>/input_masalah_solusi"><i class="fa fa-circle-o"></i>Input Masalah dan Solusi</a></li>
					</ul>
				</li>
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Dokumen<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web/lihat_dokumen');?>"><i class="fa fa-circle-o"></i>Lihat Dokumen</a></li>
						<li><a href="<?php echo base_url('web/input_dokumen');?>"><i class="fa fa-circle-o"></i>Input Dokumen</a></li>
					</ul>
				</li>
              </ul>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span>Pengetahuan Yg Dibagikan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/pengetahuan_tacit_dibagikan');?>"><i class="fa fa-circle-o"></i>Masalah & Solusi Yg Dibagikan</a></li>
                <li><a href="<?php echo base_url('web/pengetahuan_explicit_dibagikan');?>"><i class="fa fa-circle-o"></i>Dokumen Yg Dibagikan</a></li>
              </ul>
            </li>
      <li>
			<li>
              <a href="<?php echo base_url('web/problem_solving');?>">
                <i class="fa fa-gears"></i> <span>Problem Solving</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/posting_disukai');?>">
                <i class="fa fa-heart"></i> <span>Posting disukai</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span> Penerima Rewards</span><i class="fa fa-angle-left pull-right"></i>
              </a>
			  <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/penerima_reward');?>"><i class="fa fa-circle-o"></i>Penerima reward</a></li>
				<li><a href="<?php echo base_url('web/kandidat_reward');?>/"><i class="fa fa-circle-o"></i>Kandidat Reward</a></li>
                <li><a href="<?php echo base_url('web/my_reward');?>"><i class="fa fa-circle-o"></i>My Reward</a></li>
              </ul>
            </li>
			<li>
              <a href="<?php echo base_url('web/laporan');?>">
                <i class="fa fa-line-chart"></i> <span>Laporan</span>
              </a>
            </li>
          </ul>
		  <!----/.menu sidebar-->
		  <?php } ?>
		  <!----- .menu kasubbid -------->
		  
		  <!----- menu admin -------->
		  <?php if($user['hak_akses']=='3'){?>
          <!-- Menu Sidebar --->
          <ul class="sidebar-menu">
			<li>
              <a href="<?php echo base_url('web/data_masalah_solusi');?>">
                <i class="fa fa-share-alt"></i> <span>Data Masalah & Solusi</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/data_dokumen');?>">
                <i class="fa fa-file-text"></i> <span>Data Dokumen</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-share-alt"></i> <span>Pengetahuan Saya</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Masalah dan Solusi<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web');?>/lihat_masalah_solusi"><i class="fa fa-circle-o"></i>Lihat Masalah dan Solusi</a></li>
						<li><a href="<?php echo base_url('web');?>/input_masalah_solusi"><i class="fa fa-circle-o"></i>Input Masalah dan Solusi</a></li>
					</ul>
				</li>
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Dokumen<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web/lihat_dokumen');?>"><i class="fa fa-circle-o"></i>Lihat Dokumen</a></li>
						<li><a href="<?php echo base_url('web/input_dokumen');?>"><i class="fa fa-circle-o"></i>Input Dokumen</a></li>
					</ul>
				</li>
              </ul>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span>Pengetahuan Yg Dibagikan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/pengetahuan_tacit_dibagikan');?>"><i class="fa fa-circle-o"></i>Masalah & Solusi Yg Dibagikan</a></li>
                <li><a href="<?php echo base_url('web/pengetahuan_explicit_dibagikan');?>"><i class="fa fa-circle-o"></i>Dokumen Yg Dibagikan</a></li>
              </ul>
            </li>
			<li>
              <a href="<?php echo base_url('web/problem_solving');?>">
                <i class="fa fa-gears"></i> <span>Problem Solving</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/posting_disukai');?>">
                <i class="fa fa-heart"></i> <span>Posting disukai</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Data Pengguna</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/daftar_pengguna');?>"><i class="fa fa-circle-o"></i>Daftar Pengguna</a></li>
                <li><a href="<?php echo base_url('web/input_pengguna');?>"><i class="fa fa-circle-o"></i>Input Pengguna</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span> Penerima Rewards</span><i class="fa fa-angle-left pull-right"></i>
              </a>
			  <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/penerima_reward');?>"><i class="fa fa-circle-o"></i>Penerima reward</a></li>
                <li><a href="<?php echo base_url('web/my_reward');?>"><i class="fa fa-circle-o"></i>My Reward</a></li>
              </ul>
            </li>
          </ul>
		  <!----/.menu sidebar-->
		  <?php } ?>
		  <!----- .menu admin -------->
		  
		  
		  <!----- menu pakar -------->
		  <?php if($user['hak_akses']=='4'){?>
          <!-- Menu Sidebar --->
          <ul class="sidebar-menu">
			<li>
              <a href="<?php echo base_url('web/data_masalah_solusi');?>">
                <i class="fa fa-share-alt"></i> <span>Data Masalah & Solusi</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url('web/data_dokumen');?>">
                <i class="fa fa-file-text"></i> <span>Data Dokumen</span>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-share-alt"></i> <span>Pengetahuan Saya</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Masalah dan Solusi<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web');?>/lihat_masalah_solusi"><i class="fa fa-circle-o"></i>Lihat Masalah dan Solusi</a></li>
						<li><a href="<?php echo base_url('web');?>/input_masalah_solusi"><i class="fa fa-circle-o"></i>Input Masalah dan Solusi</a></li>
					</ul>
				</li>
                <li>
				<a href="#"><i class="fa fa-circle-o"></i>Dokumen<i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('web/lihat_dokumen');?>"><i class="fa fa-circle-o"></i>Lihat Dokumen</a></li>
						<li><a href="<?php echo base_url('web/input_dokumen');?>"><i class="fa fa-circle-o"></i>Input Dokumen</a></li>
					</ul>
				</li>
              </ul>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span>Pengetahuan Yg Dibagikan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/pengetahuan_tacit_dibagikan');?>"><i class="fa fa-circle-o"></i>Masalah & Solusi Yg Dibagikan</a></li>
                <li><a href="<?php echo base_url('web/pengetahuan_explicit_dibagikan');?>"><i class="fa fa-circle-o"></i>Dokumen Yg Dibagikan</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i> <span>Problem Solving</span><i class="fa fa-angle-left pull-right"></i><small class="label pull-right bg-red" id="revisi"></small>
              </a>
			  <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/problem_solving');?>"><i class="fa fa-circle-o"></i>Problem Solving</a></li>
                <li><a href="<?php echo base_url('web/data_bagian_lumbung');?>"><i class="fa fa-circle-o"></i>Data Bagian Lumbung</a></li>
                <li><a href="<?php echo base_url('web/data_gejala');?>"><i class="fa fa-circle-o"></i>Data Gejala</a></li>
                <li><a href="<?php echo base_url('web/data_kasus');?>"><i class="fa fa-circle-o"></i>Data Kasus</a></li>
                <li><a href="<?php echo base_url('web/revise');?>/"><i class="fa fa-circle-o"></i>Data Revise<small class="label pull-right bg-red" id="revisi1"></small></a></li>
              </ul>
            </li>
			<li>
              <a href="<?php echo base_url('web/posting_disukai');?>">
                <i class="fa fa-heart"></i> <span>Posting disukai</span>
              </a>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-certificate"></i> <span>Validasi Pengetahuan</span> <small class="label pull-right bg-red" id="validasi"></small>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/validasi_masalah_solusi');?>"><i class="fa fa-circle-o"></i>Masalah dan Solusi<small class="label pull-right bg-red" id="validasi_t"></small></a></li>
                <li><a href="<?php echo base_url('web/validasi_dokumen');?>"><i class="fa fa-circle-o"></i>Dokumen<small class="label pull-right bg-red" id="validasi_e"></small></a></li>
              </ul>
            </li>      
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i> <span> Penerima Rewards</span><i class="fa fa-angle-left pull-right"></i>
              </a>
			  <ul class="treeview-menu">
                <li><a href="<?php echo base_url('web/penerima_reward');?>"><i class="fa fa-circle-o"></i>Penerima reward</a></li>
                <li><a href="<?php echo base_url('web/my_reward');?>"><i class="fa fa-circle-o"></i>My Reward</a></li>
              </ul>
            </li>
          </ul>
		  <!----/.menu sidebar-->
		  <?php } ?>
		  
		  <!----- .menu pakar -------->
        </section>
        <!-- /.sidebar -->
      </aside>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="padding-top:50px">
