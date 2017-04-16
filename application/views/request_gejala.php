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
                    <input type="hidden" id="id_gejala">
                    <input type="hidden" id="bobot_gejala">
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

                                    <!----------------- MODAL FOR TERIMA GEJALA MIRIP ---------------------------!-->



                                    <!----------------- MODAL FOR TERIMA GEJALA MIRIP ---------------------------!-->                                    
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

          <!---- -->
          <div class="modal fade" id="modalTerima" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" align="center">Gejala Diterima</h3>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url();?>web/submit_gejala" method="post" enctype="multipart/form-data">
                  <p>Silahkan Input Bobot Gejala</p>
                  <select name="bobot_gejala" id="bobot_baru" class="form-control">
                  <option value="1">1 (Permasalahan Ringan)</option>
                  <option value="3">3 (Permasalahan Sedang)</option>
                  <option value="5">5 (Permasalahan Berat)</option>
                  </select>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button onClick="submit_gejala()" type="button" class="btn btn-primary">Submit</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <!-- -->
        </section><!-- /.content -->
<!-- jQuery -->
    
    <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
   function terima_gejala(id)
      {
        $("#id_gejala").val(id); //id dari request, diinput ke peubah bantu (input type hidden)
        $("#modalTerima").modal('show');
        
      }

      function submit_gejala() //saat submit diclick, langsung ambil data bobot yg dipilih, dan id yg disimpan tdi. 
      {
        var bobot_gejala = $("#bobot_baru").val();
        var id = $("#id_gejala").val();
          $.ajax({
              url : "<?php echo base_url('web/ajax_terima_gejala')?>/"+ id,  
              type: "POST",
              data: {bobot_gejala:bobot_gejala}, //ini taaulah pasti nis q sok kepinteran :"  okee lanjutt... enggaa mau tanya itu penulisan syntax bobot_gejala begitu kenapaa, yg disebelah kiri nama input->post('nah ini namanyo'), kalo yg sblah kanan isi nyo cuba yuk 
              dataType: "JSON",
              success: function(data)
              {   
                    if(data.status)
                    {
                       alert("Berhasil ditambahkan");
                       location.reload();
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