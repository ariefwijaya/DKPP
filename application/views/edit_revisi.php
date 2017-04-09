        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Solusi
          </h1>
        </section>
<?php foreach($solusi->result_array() as $data)?>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-md-12">
						<form action="<?php echo base_url();?>web/update_revisi" method="post" enctype="multipart/form-data">
						<div class="box box-solid box-default">
							<div class="box-header">
								<div class="form-group col-md-12">
								  <label>Masalah</label>
								  <input type="text" name="nama_solusi" value="<?php echo $data['nama_solusi'];?>" class="form-control">
								  <input type="hidden" name="r_id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
								  <input type="hidden" name="r_nama_solusi" value="<?php echo $data['nama_solusi'];?>" class="form-control">
								  <input type="hidden" name="r_solusi_masalah" value="<?php echo $data['solusi_masalah'];?>" class="form-control">
								  <?php echo form_error('nama_solusi'); ?>
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
							<?php foreach($gejala_masalah->result_array() as $gm){
								if($gm['id_solusi']==$data['id_solusi']) {?>
								<tr>
									<td width="10px"><?php echo $gm['id_gejala'];?></td>
									<td><?php echo $gm['nama_gejala'];?></td>
									<td width="10px">
										<form action="<?php echo base_url();?>web/delete_gejala_revise" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id_gejala" value="<?php echo $gm['id_gejala'];?>" class="form-control" readonly>
										<input type="hidden" name="id_solusi" value="<?php echo $gm['id_solusi'];?>" class="form-control" readonly>
										<button type="submit" class="btn  btn-danger btn-sm"><i class="fa fa-close"></i></button>
										</form>
									</td>
								</tr>
							<?php }} ?>
								<tr>
									<form action="<?php echo base_url();?>web/tambah_gejala_revise" method="post" enctype="multipart/form-data">
									<td colspan='2'>
										<input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
										<select name="id_gejala" class="form-control" style="width: 100%;">
										<?php foreach($gejala->result_array() as $g){?>
											<option value="<?php echo $g['id_gejala'];?>"><?php echo $g['nama_gejala'];?></option>
										<?php } ?>
										</select>
									</td>
									<td width="10px"><button type="submit" class="btn  btn-info btn-sm"><i class="fa fa-plus"></i></button></td>
									</form>
								</tr>
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
									<?php foreach($revisi->result_array() as $re)
									if($re['id_solusi']==$data['id_solusi']){?>
									<div class="box box-solid box-warning">
									<div class="box-body">
									<?php echo $data['solusi_masalah'];?>									
									<br/>
									</div>
									</div>
									<?php } ?>
									<textarea id="editor1" name="solusi_masalah" rows="10" cols="80"><?php echo @$re['revisi'];?></textarea>
									<?php echo form_error('solusi_masalah'); ?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update Kasus</button>
								<form action="<?php echo base_url();?>web/batal_revisi_pengguna" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
									<button type="submit" class="btn btn-danger">Batal</button>
								</form>
							</div>
						</div><!-- /.box -->
						</form>
					</div>
				</div>
			</div>
		</section>