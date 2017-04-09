<section class="content-header">
    <h1>
        Edit Masalah dan Solusi
    </h1>
</section>
<?php foreach($tacit->result_array() as $row)?>
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
                <form action="<?php echo base_url();?>web/update_masalah_solusi" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kategori</label>
                      <select name="id_kategori" class="form-control" style="width: 100%;">
						<?php foreach($kategori->result_array() as $k){?>
							<option value="<?php echo $k['id_kategori'];?>" <?php if($row['id_kategori']==$k['id_kategori']) echo "selected";?>><?php echo $k['nama_kategori'];?></option>
						<?php } ?>
						</select>
                    </div>
                    <div class="form-group">
                      <label>Judul Masalah</label>
					  <input type="hidden" name="id_tacit" value="<?php echo $row['id_tacit'];?>"/>
                      <input type="text" name="judul_tacit" value="<?php echo $row['judul_tacit'];?>" class="form-control" placeholder="Masukkan Judul">
					  <?php echo form_error('judul_tacit'); ?>
                    </div>
                    <div class="form-group">
                      <label>Masalah</label>
                      <textarea id="editor1" name="masalah"  rows="10" cols="80"><?php echo $row['masalah'];?></textarea>
					  <?php echo form_error('masalah'); ?>
                    </div>
					<div class="form-group">
                      <label>Solusi</label>
                      <textarea id="editor2" name="solusi"  rows="10" cols="80"><?php echo $row['solusi'];?></textarea>
					  <?php echo form_error('solusi'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->