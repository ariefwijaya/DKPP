<section class="content-header">
    <h1>
        Data Revisi
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
                        <th width="100px">Masalah</th>
                        <th>Gejala</th>
                        <th>Solusi</th>
                        <th>Riwayat</th>
                        <th>Status</th>
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
                        <td><?php echo $data['id_solusi'];?> | <b><?php echo $data['nama_solusi'];?></b></td>
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
							<?php echo $data['solusi_masalah'];?>
							<?php foreach($revisi->result_array() as $re)
							if($re['id_solusi']==$data['id_solusi']){?>
								<br/>
								<br/>
								<div class="box box-solid box-warning">
									<div class="box-header">
										<h3 class="box-title">Dari Pengguna</h3>
									</div><!-- /.box-header -->
									<div class="box-body">
										<?php echo $re['revisi'];?>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							<?php } ?>
							
						</td>
						<td width="50px">
						<?php foreach($riwayat->result_array() as $r)
						if($r['id_solusi']==$data['id_solusi']){
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
							<?php if($data['validasi']==3){ echo "Rekomendasi Pengguna";}?>
							<?php if($data['validasi']==1){ echo "Rekomendasi Sistem";}?>
						</td>
                        <td>
							<a href="<?php echo base_url('web/edit_revisi');?>/<?php echo $data['id_solusi'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_revisi');?>/<?php echo $data['id_solusi'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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