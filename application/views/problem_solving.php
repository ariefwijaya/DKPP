<?php foreach($pengguna->result_array() as $user)?>       
		<!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-md-12">
						<form action="<?php echo base_url();?>web/cari_solusi" method="post" enctype="multipart/form-data">
						<div class="box box-solid box-warning">
							<div class="box-header">
								<center><h3 class="box-title">Gejala-Gejala Permasalahan</h3></center>
							</div><!-- /.box-header -->
							<div class="box-body" style="overflow:scroll; height:600px;">
							<table id="example7" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="10px">No</th>
									<th width="100px">Gejala</th>
									<th>Bagian</th>
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
								<button type="submit" class="btn btn-primary">Cari Solusi</button>
							</div>
						</div><!-- /.box -->
						</form>
					</div>
				</div>
			</div>
		</section>