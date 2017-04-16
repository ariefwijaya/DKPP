<?php foreach($pengguna->result_array() as $user)?>
<?php foreach($detail->result_array() as $data)?>
<?php foreach($detail_revisi_t->result_array() as $data1)?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Revisi Masalah dan Solusi
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-md-12">
						<div class="box box-solid box-default">
							<div class="box-header">
								<b><div style="font-size:20px;"><?php echo $data['judul_tacit'];?></div></b><br/>
									<i class="fa fa-user"></i> <a href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"><?php echo $data['nama'];?></a>
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font>
									<div class="pull-right hidden-xs" style="font-size:12px;color:gray">
										<a style="font-size:12px;color:gray" href="<?php echo base_url('web/kategori');?>/<?php echo $data['id_kategori'];?>"> <i class="fa fa-tag"></i> <?php echo $data['nama_kategori'];?></a>
									</div>
							</div><!-- /.box-header -->
							<div class="box-body">
							<div class="col-md-5">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Masalah</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
									<?php echo $data['masalah'];?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<div class="col-md-7">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Solusi</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
									<?php echo $data['solusi'];?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							

							<div class="col-md-3">
							<p>
							<a href="<?php echo base_url('web/edit_revisi_masalah_solusi');?>/<?php echo $data['id_tacit'];?>" class="btn btn-info btn-xl">Edit Masalah dan Solusi</a></p>
							</div>

							
							<div class="col-md-12">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Note</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
									<?php echo $data1['note'];?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							
						
					</div>
				</div>
			</div>
		</section>
<script type="text/javascript"  src="<?php echo base_url();?>asset/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
		var $j = jQuery.noConflict();
		$j(document).ready(function() 
			{
				$j("font.timeago").timeago();
				$j("font.timeago1").timeago();
			});
	</script>