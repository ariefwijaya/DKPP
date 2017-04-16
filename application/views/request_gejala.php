 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Request Gejala
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
                        <th>Nama Gejala</th>
                        <th>Bagian</th>
                        <th>Tanggal Request</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php

					$no=1;
          //print_r($request_gejala);
					foreach($request_gejala->result_array() as $data)//nah kayak ini
					{
					?> 
                      <tr>
                        <td width="5%"><?php echo $no;?></td>
                        <td width="39%"><?php echo $data['nama_gejala'];?></td>
                        <td width="25%"><?php echo $data['id_bagian'];?></td>
                        <td width="15%"><font class='timeago' title="<?php echo $data['tgl_request'];?>"><?php echo $data['tgl_request'];?></font></td>
            						<td>

                            <?php if($data['status']=="1")
                                    { 
                                      echo "Diterima";
                                    } 
                                  else if($data['status']=="2")
                                    { 
                                      echo "Mirip";
                                    }
                                  else if($data['status']=="3")
                                    { 
                                      echo "Ditolak";
                                    } 
                                  else
                                    { 
                                      echo "Ditunda";
                                    }
                                ?>
                        </td> 
                      <td width="19%">
                           <?php if($data['status']=="0"){?>
                                <div class="btn btn-group">
                                    <button onClick="terima_gejala(<?php echo $data['id_request'];?>)" class="btn btn-success" type="button"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-warning" type="button"><i class="fa fa-exchange"></i></button>
                                    <button class="btn btn-danger" type="button"><i class="fa fa-close"></i></button>
                                </div>
                          <?php }?>
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
   function terima_gejala(id)
      {
          $.ajax({
              url : "<?php echo base_url('web/ajax_terima_gejala/')?>"+ id,  
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {   
                    if(data.status)
                    {
                       alert("Berhasil dipindahkan");
                    }
                   
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  console.log(textStatus);
                  console.log(errorThrown);
              }
          });
      }
		jQuery(document).ready(function() 
			{
				jQuery("font.timeago").timeago();
       

			});
	</script>