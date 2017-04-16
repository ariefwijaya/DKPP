        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Dokumen
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
                        <th>Judul Dokumen</th>
                        <th>Pengguna</th>
                        <th>Kategori</th>
                        <th>NIP</th>
                        <th>Tanggal Posting</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($explicit->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $data['id_explicit'];?>"><?php echo $data['judul_explicit'];?></a></td>
                        <td><a href="<?php echo base_url('web/kategori');?>/<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori'];?></a></td>
                        <td><a href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"><?php echo $data['nama'];?></a></td>
                        <td><?php echo $data['nip'];?></td>
                        <td><font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font></td>
						<td><?php if($data['validasi_explicit']=="1"){ echo "Tervalidasi";} else { echo "Belum Tervalidasi";}?></td>
                        <td>
							<a href="<?php echo base_url('web/edit_dokumen');?>/<?php echo $data['id_explicit'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
              <a href="<?php echo base_url('web/tag_dokumen');?>/<?php echo $data['id_explicit'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-share-alt"></i></button></a>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_dokumen');?>/<?php echo $data['id_explicit'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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