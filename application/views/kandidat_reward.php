        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kandidat Penerima Reward
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
                        <th>NIP</th>
                        <th>Foto</th>
                        <th>Jabatan</th>
                        <th>Poin</th>
                        <th>Reward</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($kandidat->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><a href=""><?php echo $data['nama'];?></a></td>
						<td><?php echo $data['nip'];?></td>
                        <td width="100px"><img src="<?php echo base_url('photo');?>/<?php echo $data['userfile'];?>" width="100px"></img></td>
                        <td><?php echo $data['nama_jabatan'];?></td>
                        <td><?php echo $data['poin'];?> Poin</td>
                        <td>
							<a onClick="return confirmSubmit()" href="<?php echo base_url('web/input_reward');?>/<?php echo $data['id_pengguna'];?>"><button class="btn  btn-info btn-sm"><i class="fa fa-gift"></i> Reward</button></a>
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