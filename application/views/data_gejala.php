<section class="content-header">
    <h1>
        Data Gejala
    </h1>
</section>
<?php foreach($kode_gejala->result_array() as $rows)?>
<?php
$no = @$rows['urut'] + 1;
if(strlen($no) == '1'){
  $kd_gejala = "G00".$no;
}elseif(strlen($no) == '2'){
  $kd_gejala = "G0".$no;
}elseif(strlen($no) == '3'){
  $kd_gejala = "G".$no;
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
                <form action="<?php echo base_url();?>web/submit_gejala" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kode Gejala</label>
                      <input type="text" name="id_gejala" value="<?php echo $kd_gejala;?>" class="form-control" readonly>
					  <?php echo form_error('id_gejala'); ?>
                    </div>
					<div class="form-group col-md-12">
                      <label>Bagian Lumbung</label>
					  <select name="id_bagian" class="form-control">
						<?php foreach($bagian->result_array() as $b){?>
						<option value="<?php echo $b['id_bagian'];?>"><?php echo $b['nama_bagian'];?></option>
						<?php } ?>
					  </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label>Gejala</label>
                      <input type="text" name="nama_gejala" class="form-control" placeholder="Masukkan Gejala">
                      <input type="hidden" name="urut" value="<?php echo $no;?>" class="form-control">
					  <?php echo form_error('nama_gejala'); ?>
                    </div>
					<div class="form-group col-md-3">
                      <label>Bobot Gejala</label>
					  <select name="bobot_gejala" class="form-control">
						<option value="1">1 (Permasalahan Ringan)</option>
						<option value="3">3 (Permasalahan Sedang)</option>
						<option value="5">5 (Permasalahan Berat)</option>
					  </select>
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
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Bagian</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($gejala->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_gejala'];?></td>
                        <td><?php echo $data['nama_gejala'];?></td>
                        <td><?php echo $data['nama_bagian'];?></td>
                        <td><?php echo $data['bobot_gejala'];?></td>
                        <td>
							<a href="<?php echo base_url('web/edit_gejala');?>/<?php echo $data['id_gejala'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_gejala');?>/<?php echo $data['id_gejala'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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