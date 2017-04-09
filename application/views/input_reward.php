<section class="content-header">
    <h1>
        Tambah Reward Pengguna
    </h1>
</section>
<?php foreach($data_pengguna->result_array() as $row)?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Masalah dan Solusi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url();?>web/tambah_reward" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama Pengguna</label>
					  <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna'];?>"/>
                      <input type="text" value="<?php echo $row['nama'];?> (<?php echo $row['nip'];?>)" class="form-control" readonly>
                    </div>
					<div class="form-group">
                      <label>Reward</label>
                      <input type="text" name="reward" class="form-control" placeholder="Masukkan Reward" required>
					  <?php echo form_error('reward'); ?>
                    </div>
                    <div class="form-group">
                      <label>Keterangan Reward</label><br/>
                      <textarea class="form-control" name="keterangan_reward"  rows="5" cols="80" required></textarea>
					  <?php echo form_error('keterangan_reward'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->