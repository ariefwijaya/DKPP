

<section class="content-header">
    <h1>
        Input Pengguna
    </h1>
</section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pengguna</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url();?>web/submit_data_pengguna" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP">
					  <?php echo form_error('nip'); ?>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengguna">
					  <?php echo form_error('nama'); ?>
                    </div>
					<div class="form-group">
                      <label>Jenis Kelamin</label><br/>
						<label>
							<input type="radio" name="jenis_kelamin" value="Laki-laki" class="minimal">Laki-laki
						</label>
						<label>
							<input type="radio" name="jenis_kelamin" value="Perempuan" class="minimal">Perempuan
						</label>
					  <?php echo form_error('jenis_kelamin'); ?>
                    </div>
					<div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
					  <?php echo form_error('tempat_lahir'); ?>
                    </div>
					<div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir (ex:1994-06-25)" id="datepicker">
					  <?php echo form_error('tanggal_lahir'); ?>
                    </div>
					<div class="form-group">
                      <label>Jabatan</label>
					  <select name="id_jabatan" class="form-control">
						<option value="" disabled selected>Pilih Jabatan</option>
						<?php foreach($jabatan->result_array() as $j){?>
						<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
						<?php } ?>
					</select>
					  <?php echo form_error('id_jabatan'); ?>
                    </div>
					<div class="form-group">
                      <label>Hak Akses</label>
					  <select name="hak_akses" class="form-control">
						<option value="1">Anggota Lumbung</option>
						<option value="2">Kasubbid</option>
						<option value="3">Administrator</option>
						<option value="4">Pakar</option>
					</select>
					<?php echo form_error('hak_akses'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
<link rel="stylesheet" href="<?php echo base_url();?>asset/jqueryui/themes/base/jquery.ui.all.css">
<script src="<?php echo base_url();?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>asset/jqueryui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jqueryui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jqueryui/ui/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-65:c+10'
		});
	});
</script>
