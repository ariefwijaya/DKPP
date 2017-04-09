<?php foreach($pengguna->result_array() as $user)?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Semua Notifikasi
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Notifikasi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($notif->result_array() as $notif){?>
                      <tr>
                        <td>
							<?php if($notif['kategori']=='tacit'){?>
								<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-comments-o text-aqua"></i> <?php echo $notif['nama'];?> mengomentari masalah & solusi Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
							<?php if($notif['kategori']=='explicit'){?>
								<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-comments-o text-aqua"></i> <?php echo $notif['nama'];?> mengomentari dokumen Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
							<?php if($notif['kategori']=='like_t'){?>
								<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-heart text-aqua"></i> <?php echo $notif['nama'];?> menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
							<?php if($notif['kategori']=='like_e'){?>
								<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
								  <i class="fa fa-heart text-aqua"></i> <?php echo $notif['nama'];?> menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
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
								  <i class="fa fa-gift text-aqua"></i> Anda mendapatkan reward<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
								</a>
							<?php } ?>
						</td>
                      </tr>
                    <?php
					}
					?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<!-- jQuery -->
    
    <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() 
			{
				jQuery("font.timeago").timeago();
			});
	</script>