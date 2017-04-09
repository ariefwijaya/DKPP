  <script type="text/javascript">

    function delete_tags(tags_id)
    {
        var dataString = "id_tag=" + tags_id;

        $.ajax({  
            type: "POST",  
            url: "<?php echo base_url('web/Ajax_hapus_tags_tacit');?>",  
            data: dataString,
            success: function(data)
            {
                if(data == "deleted"){
                  javascript:location.reload(true);
          }
            }
        });
    }
  </script>      


        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Tag Masalah dan Solusi
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
                                          <td style="text-transform:uppercase"> <b> Daftar User Yang Dibagikan </b></td>
                                    <td>
                                    <?php if(count($list_tagged->result()) == 0){?>

                                      <h4 align="center" style="color:red">Anda Belum Membagikan Pengetahuan Ini Kepada Siapapun</h4>

                                    <?php }else{?>

                                      <?php 
                                          foreach ($list_tagged->result() as $g) {

                                              switch ($g->hak_akses) {
                                                  case 'anggotalumbung':
                                                      $profil = mysql_query("SELECT * FROM anggotalumbung WHERE id_user='$g->id_user'");
                                                  break;
                                                  case 'kasubbid':
                                                      $profil = mysql_query("SELECT * FROM kasubbid WHERE id_user='$g->id_user'");
                                                  break;
                                                  case 'tenagaahli':
                                                      $profil = mysql_query("SELECT * FROM tenagaahli WHERE id_user='$g->id_user'");
                                                  break;
                                              }
                                                  $prf = mysql_fetch_array($profil);

                                                  $nama = $prf['nama'];

                                      ?>
                                  <div class="well">
                                    <span class="mif-tag">&nbsp;<?php echo $nama;?></span></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="delete_tags('<?=$g->id_tag;?>')" ><button style="border-radius:70%;height:auto;width:auto;"><span class="fa fa-cancel"></span></button></a>
                                  </div>
                                      <?php }?>

                                  <?php }?>
                                      </td>
                                    </tr>
                                </table>
                            
                              <form method="post" action="<?=base_url('web/lihat_pengetahuan_tacit');?>">
                                <input type="hidden" name="id_tacit" value="<?=$a->id_tacit;?>">
                                <table>
                                  
                                   <tr>
                                          <td style="text-transform:uppercase"> <b> Bagikan Kepada Teman Anda </b> <pre>*Ketik Nama Lengkap</pre></td>
                                          <td style="padding:5px;width:100%">
                                            <div style="width:100%" class="input-control full-size" data-role="select" data-multiple="true">
                                                <select style="width:100%" multiple="multiple" class="full-size" name="tag[]">

                                                       <?php 
                                                    foreach ($list_untagged->result() as $g) {

                                                      switch ($g->level) {
                                                          case 'anggotalumbung':
                                                            $profil = mysql_query("SELECT * FROM anggotalumbung WHERE id_user='$g->id_user'");
                                                          break;
                                                          case 'kasubbid':
                                                            $profil = mysql_query("SELECT * FROM kasubbid WHERE id_user='$g->id_user'");
                                                          break;
                                                          case 'tenagaahli':
                                                            $profil = mysql_query("SELECT * FROM tenagaahli WHERE id_user='$g->id_user'");
                                                          break;
                                                      }
                                                      $prf = mysql_fetch_array($profil);

                                                      $nama = $prf['nama'];

                                                    ?>

                                                      <option value="<?=$g->id_user;?>"><?=$nama;?></option>

                                                    <?php }?>

                                                </select>
                                            </div>
                                          </td>
                                     </tr>
                                  <tr>                          
                                    <td align="center" style="padding:5px" align="right" colspan="2"><button class="btn btn-primary">Submit Data</button></td>
                                  </tr>
                                </table>
                              </form>
                            </div>
                          </center>
                  </div>
              <!------ MODAL FOR EDIT TAG TACIT KNOWLEDGE ------------!-->