        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Reward
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
                        <th>Reward</th>
                        <th>Keterangan</th>
                        <th>Tanggal Reward</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($reward->result_array() as $data)
					{
					?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['reward'];?></td>
                        <td><?php echo $data['keterangan_reward'];?></td>
                        <td><?php echo $data['tgl_reward'];?></td>
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