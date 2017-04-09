<section class="content-header">
    <h1>
        Input Dokumen Pengetahuan
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
                  <h3 class="box-title">Data Dokumen</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url();?>web/submit_dokumen" method="post" enctype="multipart/form-data">
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
                      <label>Judul Dokumen</label>
                      <input type="text" name="judul_explicit" class="form-control" placeholder="Masukkan Judul">
					  <?php echo form_error('judul_explicit'); ?>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea id="editor1" name="keterangan" rows="10" cols="80"></textarea>
					  <?php echo form_error('keterangan'); ?>
                    </div>
                    <div class="form-group">
                      <label>Lampiran (pdf, doc, docx, xls, xlsx, ppt, dan pptx)</label>
                      <input type="file" name="userfile" required>
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