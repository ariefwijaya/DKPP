<?php foreach($pengguna->result_array() as $user)?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Pengguna
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Photo</th>
                        <th>NIP</th>
                        <th>TTL</th>
                        <th>Jabatan</th>
                        <th>Hak Akses</th>
						<?php if($user['hak_akses']=='3'){?>
                        <th>Aksi</th>
						<?php } ?>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($pengguna->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><a href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"><?php echo $data['nama'];?></a></td>
                        <td width="100px"><img src="<?php echo base_url('photo');?>/<?php echo $data['userfile'];?>" width="100px"/></td>
                        <td><?php echo $data['nip'];?></td>
                        <td><?php echo $data['tempat_lahir'];?>,<br/><?php echo $data['tanggal_lahir'];?></td>
						<td><?php echo $data['nama_jabatan'];?></td>
						<td>
							<?php if($data['hak_akses']=='1'){ echo "Anggota Lumbung";}?>
							<?php if($data['hak_akses']=='2'){ echo "Kasubbid";}?>
							<?php if($data['hak_akses']=='3'){ echo "Administrator";}?>
							<?php if($data['hak_akses']=='4'){ echo "Pakar";}?>
						</td>
						<?php if($user['hak_akses']=='3'){?>
                        <td width="120px">
							<a href="<?php echo base_url('web/edit_pengguna');?>/<?php echo $data['id_pengguna'];?>" title="Edit Data"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_pengguna');?>/<?php echo $data['id_pengguna'];?>" title="Hapus Data"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/reset_password');?>/<?php echo $data['id_pengguna'];?>" title="Reset Password"><button class="btn  btn-warning btn-sm"><i class="fa fa-key"></i></button></a>
						</td>
						<?php } ?>
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
          </div><!-- /.row -->
        </section><!-- /.content -->
<!-- jQuery -->
    
    <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() 
			{
				jQuery("font.timeago").timeago();
			});
	</script>
	
	<!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>  