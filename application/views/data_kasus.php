<section class="content-header">
    <h1>
        Data Kasus
    </h1>
</section>
<?php foreach($kode_kasus->result_array() as $rows)?>
<?php
$no = @$rows['urut'] + 1;
if(strlen($no) == '1'){
  $kd_solusi = "S00".$no;
}elseif(strlen($no) == '2'){
  $kd_solusi = "S0".$no;
}elseif(strlen($no) == '3'){
  $kd_solusi = "S".$no;
}
?>
<script>
var $jj = jQuery.noConflict();
$jj(document).ready(function() {
    var max_fields      = 10; // Batas jumlah baris form
    var wrapper         = $jj(".tambah"); //Pembungkus baris form yang baru (ditambahkan)
    var add_button      = $jj(".tmbh");  // ID tombol untuk menambahkan baris form
    var x = 1;
    $jj(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++; 
            $jj(wrapper).append(
			'<div>'+
			'<div class="form-group col-md-11">'+
				'<label>Gejala '+ x +'</label>'+
					'<input type="hidden" name="inp['+ x +'][id_solusi]id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>'+
					'<select name="inp['+ x +'][id_gejala]" class="form-control select2" style="width: 100%;">'+
					<?php foreach($gejala->result_array() as $g){?>
						'<option value="<?php echo $g['id_gejala'];?>"><?php echo $g['nama_gejala'];?></option>'+
					<?php } ?>
					'</select>'+
            '</div>'+
			'<br/><button class="form-group col-md-1 btn btn-danger hapus"><i class="fa fa-close"></i></button><div style="clear:both"></div>'+
			'</div>'); 
            //Yang akan muncul ketika tombol tambah ditekan
        }
    });
    
    $jj(wrapper).on("click",".hapus", function(e){  //Hapus 1 baris form
        e.preventDefault(); $jj(this).parent('div').remove(); x--;
    })
});
</script>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form action="<?php echo base_url();?>web/submit_kasus" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label>Kode Solusi</label>
                      <input type="text" name="id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>
					  <input type="hidden" name="urut" value="<?php echo $no;?>" class="form-control">
                    </div>
                    <div class="form-group col-md-11">
					<label>Gejala 1</label>
						<input type="hidden" name="inp[0][id_solusi]id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>
						<select name="inp[0][id_gejala]" class="form-control select2" style="width: 100%;">
						<?php foreach($gejala->result_array() as $g){?>
							<option value="<?php echo $g['id_gejala'];?>"><?php echo $g['nama_gejala'];?></option>
						<?php } ?>
						</select>
                    </div>
					<div style="clear:both"></div>
					<div class="tambah"></div>
					<button class="btn btn-xs btn-primary tmbh"><i class="fa fa-plus"></i> Tambah Gejala</button>
                  </div><!-- /.box-body -->
					<div class="form-group col-md-12">
                      <label>Nama Kasus</label>
					  <input type="text" name="nama_solusi" class="form-control">
					  <?php echo form_error('nama_solusi'); ?>
                    </div>
					<div class="form-group col-md-12">
                      <label>Solusi</label>
                      <textarea id="editor1" name="solusi_masalah" rows="10" cols="80"></textarea>
					  <?php echo form_error('solusi_masalah'); ?>
                    </div>
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
                        <th width="10px">No</th>
                        <th>Gejala</th>
						<th width="100px">Masalah</th>
                        <th>Solusi</th>
                        <th>Riwayat</th>
                        <th width="50px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($kasus->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td width="300px">
							<table class="table table-bordered table-striped">
								<tr style="background:orange">
									<td colspan="2"><b>Gejala</b></td>
									<td><b>Bagian</b></td>
								</tr>
							<?php foreach($gejala_masalah->result_array() as $gm){
								if($gm['id_solusi']==$data['id_solusi']) {?>
								<tr>
									<td width="10px"><?php echo $gm['id_gejala'];?></td>
									<td><?php echo $gm['nama_gejala'];?></td>
									<td><?php echo $gm['nama_bagian'];?></td>
								</tr>
							<?php }} ?>
							</table>
						</td>
						<td><?php echo $data['id_solusi'];?> | <b><?php echo $data['nama_solusi'];?></b></td>
                        <td><?php echo $data['solusi_masalah'];?></td>
                        <td width="50px">
						<?php foreach($riwayat->result_array() as $r)
						if($data['id_solusi']==$r['id_solusi']){
							echo $r['jumlah_riwayat']." kali";?><br/>
							(<a href="<?php echo base_url('web/riwayat');?>/<?php echo $data['id_solusi'];?>">Lihat</a>)
						<?php
						}
						if(@$r['id_solusi']!=$data['id_solusi']){
							echo "Belum ada";
						}
						?>
						</td>
                        <td width="100px">
							<a href="<?php echo base_url('web/edit_solusi');?>/<?php echo $data['id_solusi'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_solusi');?>/<?php echo $data['id_solusi'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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
<!-- DataTables -->
    <script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
var $jkk = jQuery.noConflict();
$jkk("#example1").DataTable();
</script>
<script src="<?php echo base_url('asset/plugins/ckeditor');?>/ckeditor.js"></script>
    <script>
	var $j = jQuery.noConflict();
      $j(function () {
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
      });
    </script>