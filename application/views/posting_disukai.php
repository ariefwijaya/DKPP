<style>
.timeline:before{content:'';position:absolute;top:0;bottom:0;width:4px;background:none;left:31px;margin:0;border-radius:2px}
</style>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Posting disukai
          </h1>
        </section>
<?php foreach($pengguna->result_array() as $user)?>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Masalah dan Solusi</a></li>
                  <li><a href="#timeline" data-toggle="tab">Dokumen</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
					<table id="example2" class="table">
                    <thead>
                      <tr>
                        <th>Judul Masalah</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($tacit->result_array() as $data)
					{
					?>
                      <tr>
                        <td>
							<ul class="timeline timeline-inverse" style="before:none">
							<li>
								<i class="fa fa-share-alt bg-blue"></i>
								<div class="timeline-item">
								  <div class="timeline-header"><a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>"><?php echo $data['judul_tacit'];?></a>
								  <br/><a style="font-size:12px;color:gray" href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"> <i class="fa fa-user"></i> <?php echo $data['nama'];?></a>
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <a style="font-size:12px;color:gray"><i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font></a>
								  </div>
								  
								  <div class="timeline-body">
									<?php echo $data['masalah'];?>
								  </div>
								  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>" class="btn btn-primary btn-xs">Lihat Solusi</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $data['komentar'];?> komentar
											</span>
										  </div>
								</div>
							  </li>
							</ul>
						</td>
                      </tr>
                    <?php
					$no++;
					}
					?>
                    </tbody>
                  </table>
					
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    
					<table id="example3" class="table">
                    <thead>
                      <tr>
                        <th>Judul Masalah</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($explicit->result_array() as $data)
					{
					?>
                      <tr>
                        <td>
							<ul class="timeline timeline-inverse" style="before:none">
							<li>
								<i class="fa fa-file-text-o bg-blue"></i>
								<div class="timeline-item">
								  <div class="timeline-header"><a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $data['id_explicit'];?>"><?php echo $data['judul_explicit'];?></a>
								  <br/><a style="font-size:12px;color:gray" href="<?php echo base_url('web/pengguna');?>/<?php echo $data['id_pengguna'];?>"> <i class="fa fa-user"></i> <?php echo $data['nama'];?></a>
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <a style="font-size:12px;color:gray"><i class="fa fa-clock-o"></i> <font class='timeago' title="<?php echo $data['tgl_post'];?>"><?php echo $data['tgl_post'];?></font></a>
								  </div>
								  
								  <div class="timeline-body">
									<?php echo $data['keterangan'];?>
								  </div>
								  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $data['id_explicit'];?>" class="btn btn-primary btn-xs">Selengkapnya</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $data['komentar'];?> komentar
											</span>
										  </div>
								</div>
							  </li>
							</ul>
						</td>
                      </tr>
                    <?php
					$no++;
					}
					?>
                    </tbody>
                  </table>
					
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->