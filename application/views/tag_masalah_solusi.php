
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Tag Masalah dan Solusi
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar User yang Anda Bagikan</h3>
                                    <?php if(count($list_tagged->result()) == 0){?>

                                      <h4 align="center" style="color:red">Anda Belum Membagikan Pengetahuan Ini Kepada Siapapun</h4>

                                    <?php }else{?>

                                    <?php 
                                          foreach ($list_tagged->result() as $g) {

                                              switch ($g->hak_akses) {
                                                  case '1':
                                                  $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '2':
                                                  $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '3':
                                                  $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '4':
                                                  $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  }
                                                  $prf = mysql_fetch_array($profil);

                                                  $nama = $prf['nama'];

                                    ?>
                                  <div class="well">
                                    <span class="mif-tag">&nbsp;<?php echo $nama;?></span></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="delete_tags('<?=$g->id_tag;?>')" ><button style="border-radius:70%;height:auto;width:auto;"><span class="btn btn-danger"></span></button></a>
                                  </div>
                                      <?php }?>

                                  <?php }?>
                                      </td>
                                    </tr>
                                </table>
                              
                              <br></br>
                                  <form method="post" action="<?php echo base_url();?>web/tambah_tag_tacit" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                          <label>Bagikan Kepada User</label>
                                          <select class="select2 full-size" name="tags[]" multiple="multiple" data-placeholder="Pilih User">
                                          <?php
                                                  $i=0; 
                                                  foreach ($list_untagged->result() as $g) {

                                                  switch ($g->hak_akses) {
                                                  case '1':
                                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '2':
                                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '3':
                                                      $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                                  case '4':
                                                  $data = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$g->id_pengguna'");
                                                  break;
                                          }
                                      
                                              $dt = mysql_fetch_array($data);

                                              $nama = $dt['nama'];

                                          ?>
                                          <option value="<?=$g->id_pengguna;?>"><?=$nama;?></option>

                                          <?php $i++; }?>
                                          </select>
                                          </div>
                                          </div>
                                      <div class="box-footer">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                    </form>
                                    </div>
              <!------ MODAL FOR EDIT TAG TACIT KNOWLEDGE ------------!-->
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->

        <!-- jQuery -->
    

  <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/plugins/select2/select2.min.js" type="text/javascript"></script>
  <link href="<?php echo base_url();?>asset/plugins/select2/select2.min.css" rel="stylesheet"></script>

