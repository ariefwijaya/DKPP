

<section class="content-header">
    <h1>
        Edit Password
    </h1>
</section>
<?php foreach($pengguna->result_array() as $row)?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pegawai</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url();?>web/update_password" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIP</label>
					  <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna'];?>"/>
                      <input type="text" name="nip" value="<?php echo $row['nip'];?>" class="form-control" placeholder="Masukkan NIP" readonly>
					  <?php echo form_error('nip'); ?>
                    </div>
                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="text" name="password" class="form-control" placeholder="Masukkan Password Baru">
					  <?php echo form_error('password'); ?>
                    </div>
					<div class="form-group">
                      <label>Konfirmasi Password Baru</label>
                      <input type="text" name="password1" class="form-control" placeholder="Masukkan Konfirmasi Password Baru">
					  <?php echo form_error('password1'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Password</button>
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
