<style>
.timeline:before{content:'';position:absolute;top:0;bottom:0;width:4px;background:none;left:31px;margin:0;border-radius:2px}
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Dokumen Yang Dibagikan Kepada Anda
          </h1>
        </section>

        <?php if(count($list_shared_explicit->result()) == 0){?>

		<center>
		<br>
			<h1 style="color:red"> <span style="margin-bottom:20px" class="mif-warning"></span> Maaf, Belum Ada Data Pengetahuan Explicit Yang Dibagikan Kepada Anda !</h1>
		</center>	
	
		<?php }else{ ?>	

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				<table id="example2" class="table">
                    <thead>
                      <tr>
                        <th>Judul Masalah</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($list_shared_explicit->result_array() as $data)
					{
					?>
                      <tr>
                        <td>
							<ul class="timeline timeline-inverse" style="before:none">
							<li>
								<i class="fa fa-file-text-o bg-blue"></i>
								<div class="timeline-item">
								  <div class="timeline-header"><a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $data['id_explicit'];?>"><?php echo $data['judul_explicit'];?></a>
								  <br/><a style="font-size:12px;color:gray" href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"> <i class="fa fa-user"></i> <?php echo $data['nama'];?></a>
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <a style="font-size:12px;color:gray"><i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font></a>
									<div class="pull-right hidden-xs" style="font-size:12px;color:gray">
										<a style="font-size:12px;color:gray" href="<?php echo base_url('web/kategori');?>/<?php echo $data['id_kategori'];?>"> <i class="fa fa-tag"></i> <?php echo $data['nama_kategori'];?></a>
									</div>
									</div>
								  
								  <div class="timeline-body">
									<?php echo $data['keterangan'];?>
								  </div>
								  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $data['id_explicit'];?>" class="btn btn-primary btn-xs">Selengkapnya</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $data['komentar'];?> komentar
											</span>
										  </div>
								</div>
							  </li>
							</ul>
						</td>
                      </tr>
                    <?php
					$no++;
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

	<?php } ?>