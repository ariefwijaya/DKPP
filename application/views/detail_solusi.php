<?php
if($this->uri->segment('3')==''){
	redirect(base_url('web/problem_solving'), 'refresh');
}
?>
<?php foreach($pengguna->result_array() as $user)?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekomendasi Solusi
          </h1>
        </section>
<?php foreach($detail_solusi->result_array() as $data)?>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-md-12">
						<div class="box box-solid box-default">
							<div class="box-header">
								<div class="form-group col-md-12">
								  <h1 class="box-title"><b><?php  echo $data['nama_solusi']; ?></b></h1><div style="float:right"><?php if($data['validasi']=='3'){ echo "<h1 class='box-title'>Dalam Proses Revisi</h1>";} ?></div>
								</div>
							</div><!-- /.box-header -->
							<div class="box-body">
							<div class="col-md-4">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Gejala</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
									<table class="table table-bordered table-striped">
									<?php foreach($tmp_gejala->result_array() as $gm){?>
										<tr>
											<td width="10px"><?php echo $gm['id_gejala'];?></td>
											<td><?php echo $gm['nama_gejala'];?></td>
										</tr>
									<?php } ?>
									</table>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<div class="col-md-8">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Solusi</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
									<?php echo $data['solusi_masalah']; ?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<?php if($riwayat->num_rows()>0){?>
							<div class="col-md-8">
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Riwayat Solusi</h3>
									</div><!-- /.box-header -->
									<div class="box-body" style="overflow:scroll; height:200px;">
									<table class="table table-bordered table-striped">
									<?php foreach($riwayat->result_array() as $r){?>
									<tr>
										<td><?php echo $r['solusi_masalah']; ?></td>
									</tr>
									<?php } ?>
									</table>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<?php } ?>
							</div><!-- /.box-body -->
							<div class="box-footer">
							<!-- revisi pengguna --->
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
							
							<?php 
							if($data['nama_solusi']!="Kasus belum ada di database"){
							if($data['validasi']!='3'){?>
							<div class="box box-solid box-warning">
							<div id="flip" class="box-header">
								<h3 class="box-title">* Klik disini apabila terdapat kesalahan dalam rekomendasi solusi</h3>
							</div><!-- /.box-header -->
							<div id="panel" class="box-body">
							Mohon masukan revisi yang Anda berikan 
							<form action="<?php echo base_url();?>web/revisi_solusi" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>"/>
								<textarea name="revisi" class="form-control" required></textarea>
								<input type="hidden" name="id_pengguna" value="<?php echo $user['id_pengguna'];?>"/>
								<button type="submit" class="btn btn-primary">Revisi Solusi</button>
							</form>
							</div>
							</div>
							<?php } }?>
							<!-- .revisi pengguna --->
							</div>							
						</div><!-- /.box -->
					</div>
				</div>
			</div>
		</section>
