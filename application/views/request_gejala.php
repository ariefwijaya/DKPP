 
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
                                    <button onClick="terima_gejala('<?php echo $data['id_request'];?>')" class="btn btn-success" type="button"><i class="fa fa-check"></i></button>
                                    <button onClick="terima_gejala_mirip('<?php echo $data['id_request'];?>')" class="btn btn-warning" type="button"><i class="fa fa-exchange"></i></button>

                                                  
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

          <!---- MODAL FOR TERIMA GEJALA -->
          <div class="modal fade" id="modalTerima" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" align="center">Gejala Diterima</h3>
                </div>
                <div class="modal-body">
                  <p>Silahkan Input Bobot Gejala</p>
                  <select name="bobot_gejala" id="bobot_baru" class="form-control">
                  <option value="1">1 (Permasalahan Ringan)</option>
                  <option value="3">3 (Permasalahan Sedang)</option>
                  <option value="5">5 (Permasalahan Berat)</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button onClick="submit_gejala()" type="button" class="btn btn-primary">Submit</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <!---- MODAL FOR TERIMA GEJALA -->

            <!---- MODAL FOR MIRIP GEJALA -->
          <div class="modal fade" id="modalMirip" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" align="center">Gejala Mirip dengan Gejala yang Telah Ada</h3>
                </div>
                <div class="modal-body">
                  <p>Silahkan Pilih Gejala</p>
                  <select id="gejala_mirip" class="select2">
                      <?php foreach($nama_gejala->result_array() as $data)
                      { ?>
                         <option value="<?php echo $data['id_gejala'];?>"><?php echo $data['nama_gejala'];?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button onClick="submit_gejala()" type="button" class="btn btn-primary">Submit</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <!---- MODAL FOR MIRIP GEJALA -->
        </section><!-- /.content -->

<!-- jQuery -->
    
    <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() 
      {
        jQuery("font.timeago").timeago();

      });
  var idG;
  var bobot_gejalaG;
  var status;

      function terima_gejala(id) //apo nis errornyo ? 
      {
        //$("#id_gejala").val(id); //id dari request, diinput ke peubah bantu (input type hidden)
        idG = id;
        status='terima';
        $("#modalTerima").modal('show');
       // alert(idG);
      }

      function submit_gejala() //saat submit diclick, langsung ambil data bobot yg dipilih, dan id yg disimpan tdi. 
      {
        var bobot_gejala = $("#bobot_baru").val();
        var id = idG;
        var gejala_mirip = $("#gejala_mirip").val();

        var url;
        if(status=='terima')
        {
          url = "<?php echo base_url('web/ajax_terima_gejala')?>/";
        }
        else if(status=='mirip')
        {
          url =  "<?php echo base_url('web/ajax_mirip_gejala')?>/";
        }
          $.ajax({
              url : url+ id,  
              type: "POST",
              data: {bobot:bobot_gejala,gejala_mirip:gejala_mirip}, //yg disebelah kiri nama input->post('nah ini namanya'), kalo yg sblah kanan isinya
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

      function terima_gejala_mirip(id)
      {
        //$("#id_gejala").val(id); //id dari request, diinput ke peubah bantu (input type hidden)
        idG = id;
        status='mirip';
        $("#modalMirip").modal('show');
       // alert(idG);
      }

  </script>