<script type="text/javascript"  src="<?php echo base_url();?>asset/jquery.min.js"></script>
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
							<div class="col-md-12">
								<div class="box box-solid box-warning">
									<div class="box-body">
									<span id="like-panel-<?php  echo $data['id_tacit']?>">
									<?php
									$likes =  $data['like'];
									foreach($cek_user->result_array() as $l)
									if($l['count(*)']>0){?>
										<a href="javascript: void(0)" id="id_tacit<?php  echo $data['id_tacit']?>" class="Unlike" title="Batal Suka"><i class="fa fa-thumbs-up"></i> Unlike</b></a>
									<?php }else{?>
										<a href="javascript: void(0)" id="id_tacit<?php  echo $data['id_tacit']?>" class="LikeThis" title="Sukai"><i class="fa fa-thumbs-o-up"></i> Like</a>
									<?php }?>
									</span>
									<span id="like-stats-<?php  echo $data['id_tacit']?>"> <?php echo $likes;?> </span> menyukai
				
									<span id="like-loader-<?php  echo $data['id_tacit']?>">&nbsp;</span>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>


							<!--komentar-->
							
							<div class="col-md-12">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Komentar</h3>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<form action="<?php echo base_url();?>web/submit_komentar_tacit" method="post" enctype="multipart/form-data">
										  <div class='col-sm-9'>
											<input type="hidden" name="id_penerima" value="<?php echo $data['id_pengguna'];?>"/>
											<input type="hidden" name="id_tacit" value="<?php echo $data['id_tacit'];?>"/>
											<input type="text" name="isi_komentar_tacit" class="form-control input-sm" placeholder="Masukkan Komentar" required>
										  </div>                          
										  <div class='col-sm-3'>
											<button class='btn btn-danger pull-right btn-block btn-sm'>Send</button>
										  </div>
										</form>
										</div>
									<div class="box-body">
									<?php foreach($komentar->result_array() as $k){?>
									<!-- Post -->
									<div class="post clearfix">
									  <div class='user-block'>
										<img class='img-circle img-bordered-sm' src='<?php echo base_url();?>photo/<?php echo $k['userfile'];?>' alt='user image'>
										<span class='username'>
										  <a href="<?php echo base_url('web/pengguna');?>/<?php echo $k['id_pengguna'];?>"><?php echo $k['nama'];?></a>
										  <?php if($k['id_pengguna']==$user['id_pengguna']) {?>
										  <form action="<?php echo base_url();?>web/hapus_komentar_tacit" method="post" enctype="multipart/form-data">
										  <input type="hidden" name="id_tacit" value="<?php echo $k['id_tacit'];?>"/>
										  <input type="hidden" name="id_komentar_tacit" value="<?php echo $k['id_komentar_tacit'];?>"/>
										  <button type="submit" class='btn pull-right btn-box-tool'><i class='fa fa-times'></i></button>
										  </form>
										  <?php } ?>
										</span>
										<span class='description'><?php echo $k['nip'];?> - <i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $k['tgl_komentar'];?>"><?php echo $k['tgl_komentar'];?></font></span>
									  </div><!-- /.user-block -->
									  <p>
										<?php echo $k['isi_komentar_tacit'];?>
									  </p>
									</div><!-- /.post -->
									<?php } ?>
										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							
							
							
							
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