<section class="content-header">
    <h1>
        Data Bagian Lumbung
    </h1>
</section>
<?php foreach($kode_bagian->result_array() as $rows)?>
<?php
$no = @$rows['urut'] + 1;
if(strlen($no) == '1'){
  $kd_bagian = "M00".$no;
}elseif(strlen($no) == '2'){
  $kd_bagian = "M0".$no;
}elseif(strlen($no) == '3'){
  $kd_bagian = "M".$no;
}
?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form action="<?php echo base_url();?>web/submit_bagian" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kode Bagian</label>
                      <input type="text" name="id_bagian" value="<?php echo $kd_bagian;?>" class="form-control" readonly>
					  <?php echo form_error('id_bagian'); ?>
                    </div>
                    <div class="form-group">
                      <label>Bagian</label>
                      <input type="text" name="nama_bagian" class="form-control" placeholder="Masukkan Bagian">
                      <input type="hidden" name="urut" value="<?php echo $no;?>" class="form-control">
					  <?php echo form_error('nama_bagian'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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