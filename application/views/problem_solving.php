<?php foreach($pengguna->result_array() as $user)?>       
		<!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
						<form action="<?php echo base_url();?>web/cari_solusi" method="post" enctype="multipart/form-data">
						<div class="box box-solid box-warning">
							<div class="box-header">
								<center><h3 class="box-title">Gejala-Gejala Permasalahan</h3></center>
							</div><!-- /.box-header -->
							<div class="box-body" style="overflow:scroll; height:700px;">
							<table id="example7" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="10px">No</th>
									<th width="80%">Gejala</th>
									<th width="20%">Bagian</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=0;
								foreach($gejala->result_array() as $g){?>
								<tr>
									<td width="10px">
										<input type="checkbox" name="inp[<?php echo $no;?>][id_gejala]" value="<?php echo $g['id_gejala'];?>" class="minimal">
									</td>
									<td><?php echo $g['nama_gejala'];?></td>
									<td><?php echo $g['nama_bagian'];?></td>
								</tr>
								<?php 
								$no++;
								}
								?>
							</tbody>
							</table>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<div class="box-footer">
								<button type="submit" class="btn btn-primary">Cari Solusi</button>
							</div>
							</div><!-- /.box -->
							</form>
							</div>
						</div>
					</div>	
							
							<!-------------- ADD GEJALA BARU ------------->
							<script> 
							$(document).ready(function(){
								$("#flip").click(function(){
									$("#panel").slideDown("medium");
								});
							});
							</script>
							 
							<style> 
							#panel {
								display: none;
							}
							</style
							
							<div class="box box-solid box-warning">
							<div id="flip" class="box-header">
								<h3 class="box-title">* Klik disini apabila gejala tidak ada dalam list diatas</h3>
							</div><!-- /.box-header -->
							<div id="panel" class="box-header">
							<div class="row">
				              <!-- general form elements -->
				              <div class="box box-primary">
				                <!-- form start -->
				                <form action="<?php echo base_url();?>web/request_gejala" method="post" enctype="multipart/form-data">
				                  <div class="box-body">
				                  	<div class="form-group">
				                      <label>Bagian Lumbung</label>
									  <select name="id_bagian" class="form-control">
										<?php foreach($bagian->result_array() as $b){?>
										<option value="<?php echo $b['id_bagian'];?>"><?php echo $b['nama_bagian'];?></option>
										<?php } ?>
									  </select>
				                    </div>
				                  	<div class="form-group">
				                      <label>Gejala</label>
				                      <input type="text" name="nama_gejala" class="form-control" placeholder="Masukkan Gejala">
									  <?php echo form_error('nama_gejala'); ?>
				                    </div> 
				                  </div><!-- /.box-body -->
				                  <div class="box-footer">
				                   <button class="btn btn-sm btn-success tmbh"><i class="fa fa-plus"></i> Request Gejala</button>
				                  </div>
				                </form>
				              </div><!-- /.box -->

          					</div>   <!-- /.row -->

							<!-------------- ADD GEJALA BARU ------------->
							</div>							
							</div><!-- /.box -->
							</div><!-- /.box-body -->
						</div><!-- /.box -->
						


			 </section>
