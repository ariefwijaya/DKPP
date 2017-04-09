<section class="content-header">
    <h1>
        Data Bagian Mesin
    </h1>
</section>
<?php foreach($edit->result_array() as $data)?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form action="<?php echo base_url();?>web/update_bagian" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kode Bagian</label>
                      <input type="text" name="id_bagian" value="<?php echo $data['id_bagian'];?>" class="form-control" readonly>
					  <?php echo form_error('id_bagian'); ?>
                    </div>
                    <div class="form-group">
                      <label>Bagian</label>
                      <input type="text" name="nama_bagian" value="<?php echo $data['nama_bagian'];?>" class="form-control" placeholder="Masukkan Bagian">
					  <?php echo form_error('nama_bagian'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
			<div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Bagian</th>
                        <th>Nama Bagian</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($bagian->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_bagian'];?></td>
                        <td><?php echo $data['nama_bagian'];?></td>
                        <td>
							<a href="<?php echo base_url('web/edit_bagian');?>/<?php echo $data['id_bagian'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_bagian');?>/<?php echo $data['id_bagian'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
						</td>
                      </tr>
                    <?php
					$no++;
					}
					?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->