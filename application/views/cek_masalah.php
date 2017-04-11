<?php foreach($pengguna->result_array() as $user)?>
<?php foreach($detail->result_array() as $data)?>
<script type="text/javascript"  src="<?php echo base_url();?>asset/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/jquery.livequery.js"></script>

<script type="text/javascript">

	// <![CDATA[	

	var $jk = jQuery.noConflict();
	$jk(document).ready(function(){	
	
		
		/// like 
		
		$jk('.LikeThis').livequery("click",function(e){
			
			var getID   =  $(this).attr('id').replace('id_tacit','');
			
			$jk("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$jk.post("<?php echo base_url('web/like');?>/"+getID, {
	
			}, function(response){
				
				$jk('#like-stats-'+getID).html(response);
				
				$jk('#like-panel-'+getID).html('<a href="javascript: void(0)" id="id_tacit'+getID+'" class="Unlike" title="Batal Suka"><i class="fa fa-thumbs-up"></i> Unlike</a>');
				
				$jk("#like-loader-"+getID).html('');
			});
		});	
		
		/// unlike 
		
		$jk('.Unlike').livequery("click",function(e){
			
			var getID   =  $(this).attr('id').replace('id_tacit','');
			
			$jk("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$jk.post("<?php echo base_url('web/unlike');?>/"+getID, {
	
			}, function(response){
				
				$jk('#like-stats-'+getID).html(response);
				
				$jk('#like-panel-'+getID).html('<a href="javascript: void(0)" id="id_tacit'+getID+'" class="LikeThis" title="Sukai"><i class="fa fa-thumbs-o-up"></i> Like</a>');
				
				$jk("#like-loader-"+getID).html('');
			});
		});	
		
		
		
	});	

	// ]]>

</script>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Masalah dan Solusi
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
							<?php if($data['validasi_tacit']=='0'){?>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/validasi_tacit');?>/<?php echo $data['id_tacit'];?>/<?php echo $data['id_pengguna'];?>"><button class="btn  btn-success btn-sm"><i class="fa fa-check"> Validasi</i></button>
							<div class="box-footer">
							<!-- revisi pakar --->
							<script> 
							$(document).ready(function(){
								$("#flip").click(function(){
									$("#panel").slideDown("medium");
								});
							});
							</script>
							 
							<style> 
							#panel {
								display: none;
							}
							</style>
							
							<div class="box box-solid box-warning">
							<div id="flip" class="box-header">
								<h3 class="box-title">* Klik disini apabila terdapat kesalahan dalam content masalah dan solusi</h3>
							</div><!-- /.box-header -->
							<div id="panel" class="box-body">
							Mohon berikan note revisi
							<form action="<?php echo base_url();?>web/revisi_tacit" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_tacit" value="<?php echo $data['id_tacit'];?>"/>
								<textarea name="note" class="form-control" required></textarea>
								<input type="hidden" name="id_pengguna" value="<?php echo $user['id_pengguna'];?>"/>
								<button type="submit" class="btn btn-primary">Revisi Masalah dan Solusi</button>
							</form>
							</div>
							</div>
							<!-- .revisi pakar --->
							</div>							
						</div><!-- /.box -->
							<?php } 
							else if($data['validasi_tacit']=='2') {?>
									<h3>"Revision is on Review by The Author"</h3>
							<?php } 
							else{?> 
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/batal_validasi_tacit');?>/<?php echo $data['id_tacit'];?>/<?php echo $data['id_pengguna'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-error"> Batalkan Validasi</i></button></a>
							<?php } ?>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
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