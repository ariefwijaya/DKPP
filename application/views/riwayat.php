<section class="content-header">
    <h1>
        Data Kasus
    </h1>
</section>
<!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="10px">No</th>
                        <th>Gejala</th>
						<th width="500px">Riwayat</th>
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
                        <td width="10px"><?php echo $no;?></td>
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
						<td>
						<table class="table table-bordered table-striped">
						<tr style="background:orange">
							<td>Nama Masalah</td>
							<td>Solusi</td>
						</tr>
						<tr>
							<td><?php echo $data['id_solusi'];?> | <b><?php echo $data['nama_solusi'];?><b/></td>
							<td><?php echo $data['solusi_masalah'];?></td>
						</tr>
						<?php foreach($riwayat->result_array() as $r){?>
						<tr>
							<td><?php echo $r['id_solusi'];?> | <b><?php echo $r['nama_solusi'];?><b/></td>
							<td><?php echo $r['solusi_masalah'];?></td>
						</tr>
						<?php } ?>
						</table>
						</b>
						</td>
                        <td width="70px">
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