<style>
.timeline:before{content:'';position:absolute;top:0;bottom:0;width:4px;background:none;left:31px;margin:0;border-radius:2px}
</style>
<?php foreach($tacit->result_array() as $data1)?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Masalah dan Solusi Yang Dibagikan Kepada Anda
          </h1>
        </section>

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
					foreach($list_shared_tacit->result_array() as $data)
					{
					?>
                      <tr>
                        <td>
							<ul class="timeline timeline-inverse" style="before:none">
							<li>
								<i class="fa fa-share-alt bg-blue"></i>
								<div class="timeline-item">
								  <div class="timeline-header"><a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>"><?php echo $data['judul_tacit'];?></a>
								  <br/><a style="font-size:12px;color:gray" href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"> <i class="fa fa-user"></i> <?php echo $data['nama'];?></a>
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <a style="font-size:12px;color:gray"><i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font></a>
									<div class="pull-right hidden-xs" style="font-size:12px;color:gray">
										<a style="font-size:12px;color:gray" href="<?php echo base_url('web/kategori');?>/<?php echo $data['id_kategori'];?>"> <i class="fa fa-tag"></i> <?php echo $data['nama_kategori'];?></a>
									</div>
								  </div>
								  
								  <div class="timeline-body">
									<?php echo $data['masalah'];?>
								  </div>
								  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>" class="btn btn-primary btn-xs">Lihat Solusi</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $data1['komentar'];?> komentar
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
    
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() 
			{
				jQuery("font.timeago").timeago();
			});
	</script>