<section class="content-header">
    <h1>
        Input Masalah dan Solusi
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
                  <h3 class="box-title">Data Masalah dan Solusi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo base_url();?>web/submit_masalah_solusi" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kategori</label>
                      <select name="id_kategori" class="form-control" style="width: 100%;">
						<?php foreach($kategori->result_array() as $k){?>
							<option value="<?php echo $k['id_kategori'];?>"><?php echo $k['nama_kategori'];?></option>
						<?php } ?>
						</select>
                    </div>
                    <div class="form-group">
                      <label>Judul Masalah</label>
                      <input type="text" name="judul_tacit" class="form-control" placeholder="Masukkan Judul">
					  <?php echo form_error('judul_tacit'); ?>
                    </div>
                    <div class="form-group">
                      <label>Masalah</label>
                      <textarea id="editor1" name="masalah" rows="10" cols="80"></textarea>
					  <?php echo form_error('masalah'); ?>
                    </div>
					<div class="form-group">
                      <label>Solusi</label>
                      <textarea id="editor2" name="solusi" rows="10" cols="80"></textarea>
					  <?php echo form_error('solusi'); ?>
                    </div>
                    <div class="form-group">
                      <label>Bagikan Kepada</label>
                      <select class="select2 full-size" name="tags[]" multiple="multiple" data-placeholder="Pilih User">
                          <?php
                                  $i=0; 
                                  foreach ($list_user->result() as $g) {

                                  switch ($g->hak_akses) {
                                  case '1':
                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                  break;
                                  case '2':
                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                  break;
                                  case '3':
                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                  break;
                                  case '4':
                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                  break;
                                  }
                                      
                                      $dt = mysql_fetch_array($data);

                                              $nama = $dt['nama'];

                            ?>
                            <option value="<?=$g->id_pengguna;?>"><?=$nama;?></option>

                            <?php $i++; }?>
                    </select>
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

        <!-- jQuery -->
    
  <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/plugins/select2/select2.min.js" type="text/javascript"></script>
  <link href="<?php echo base_url();?>asset/plugins/select2/select2.min.css" rel="stylesheet"></script>
