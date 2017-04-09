<script type="text/javascript" src="<?php echo base_url();?>/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 3; 
	var show_per_page1 = 3; 
	//getting the amount of elements inside content div
	var number_of_items = $('#content').children().size();
	var number_of_items1 = $('#content1').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	var number_of_pages1 = Math.ceil(number_of_items1/show_per_page1);
	
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#current_page1').val(0);
	$('#show_per_page').val(show_per_page);
	$('#show_per_page1').val(show_per_page1);
	
	//now when we got all we need for the navigation let's make it '
	
	/* 
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
	
	var navigation_html1 = '<a class="previous_link1" href="javascript:previous();">Prev</a>';
	var current_link1 = 0;
	while(number_of_pages1 > current_link1){
		navigation_html1 += '<a class="page_link1" href="javascript:go_to_page1(' + current_link1 +')" longdesc="' + current_link1 +'">'+ (current_link1 + 1) +'</a>';
		current_link1++;
	}
	navigation_html1 += '<a class="next_link1" href="javascript:next();">Next</a>';
	
	$('#page_navigation').html(navigation_html);
	$('#page_navigation1').html(navigation_html1);
	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	$('#page_navigation1 .page_link1:first').addClass('active_page1');
	
	//hide all the elements inside content div
	$('#content').children().css('display', 'none');
	$('#content1').children().css('display', 'none');
	
	//and show the first n (show_per_page) elements
	$('#content').children().slice(0, show_per_page).css('display', 'block');
	$('#content1').children().slice(0, show_per_page1).css('display', 'block');
	
});

function previous(){
	
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
	new_page1 = parseInt($('#current_page1').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page1').prev('.page_link1').length==true){
		go_to_page1(new_page1);
	}
	
}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
	new_page1 = parseInt($('#current_page1').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page1').next('.page_link1').length==true){
		go_to_page1(new_page1);
	}
	
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of content div, get specific items and show them
	$('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	
	//update the current page input field
	$('#current_page').val(page_num);
}

function go_to_page1(page_num1){
	//get the number of items shown per page
	var show_per_page1 = parseInt($('#show_per_page1').val());
	
	//get the element number where to start the slice from
	start_from1 = page_num1 * show_per_page1;
	
	//get the element number where to end the slice
	end_on1 = start_from1 + show_per_page1;
	
	//hide all children elements of content div, get specific items and show them
	$('#content1').children().css('display', 'none').slice(start_from1, end_on1).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link1[longdesc=' + page_num1 +']').addClass('active_page1').siblings('.active_page1').removeClass('active_page1');
	
	//update the current page input field
	$('#current_page1').val(page_num1);
}
  
</script>
<style>
#page_navigation a{
	padding:3px;
	border:1px solid gray;
	margin:2px;
	color:black;
	text-decoration:none
}
#page_navigation1 a{
	padding:3px;
	border:1px solid gray;
	margin:2px;
	color:black;
	text-decoration:none
}
.active_page{
	background:darkblue;
	color:white !important;
}
.active_page1{
	background:darkblue;
	color:white !important;
}
</style>



<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profil Pengguna
          </h1>
        </section>
<?php foreach($pengguna->result_array() as $user)?>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive" src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $user['nama'];?></h3>
                  <p class="text-muted text-center"><?php echo $user['nama_jabatan'];?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
						<?php foreach($valid_t->result_array() as $t)?>
                      <b>Total Solusi dan Masalah</b> <a class="pull-right"><?php echo $t['v_t'];?></a>
                    </li>
                    <li class="list-group-item">
						<?php foreach($valid_e->result_array() as $e)?>
                      <b>Total Dokumen</b> <a class="pull-right"><?php echo $e['v_e'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Hak Akses</b> 
					  <a class="pull-right">
					  <?php if($user['hak_akses']=='1'){ echo "Anggota Lumbung";}?>
					  <?php if($user['hak_akses']=='2'){ echo "Kasubbid";}?>
					  <?php if($user['hak_akses']=='3'){ echo "Admin";}?>
					  <?php if($user['hak_akses']=='4'){ echo "Pakar";}?>
					  </a>
                    </li>
                  </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
			
			<!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tentang Saya</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-certificate margin-r-5"></i>  NIP</strong>
                  <p class="text-muted">
                    <?php echo $user['nip'];?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Tempat, Tanggal Lahir</strong>
                  <p class="text-muted"><?php echo $user['tempat_lahir'];?>, <?php echo $user['tanggal_lahir'];?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Masalah dan Solusi</a></li>
                  <li><a href="#timeline" data-toggle="tab">Dokumen</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                     <!-----pagination-->
	
					<!-- the input fields that will hold the variables we will use -->
					<input type='hidden' id='current_page' />
					<input type='hidden' id='show_per_page' />
					
					<div>
						
						<!-- The timeline -->
									<ul id='content' class="timeline timeline-inverse">

									  <!-- timeline item -->
									  <?php foreach($tacit->result_array() as $t){?>
									  <li>
										<i class="fa fa-share-alt bg-blue"></i>
										<div class="timeline-item">
										  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $t['tgl_post'];?></span>
										  <h3 class="timeline-header"><a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $t['id_tacit'];?>"><?php echo $t['judul_tacit'];?></a></h3>
										  <div class="timeline-body">
											<?php echo $t['masalah'];?>
										  </div>
										  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_masalah_solusi');?>/<?php echo $t['id_tacit'];?>" class="btn btn-primary btn-xs">Lihat Solusi</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $t['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $t['komentar'];?> komentar
											</span>
										  </div>
										</div>
									  </li>
									  <?php } ?>
									</ul>

					</div>

					<!-- An empty div which will be populated using jQuery -->
					<div id='page_navigation'></div>
					<!---->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                     <!-----pagination-->
	
					<!-- the input fields that will hold the variables we will use -->
					<input type='hidden' id='current_page1' />
					<input type='hidden' id='show_per_page1' />
					
					<div>
						
						<!-- The timeline -->
									<ul id='content1' class="timeline timeline-inverse">

									  <!-- timeline item -->
									  <?php foreach($explicit->result_array() as $e){?>
									  <li>
										<i class="fa fa-file-text bg-yellow"></i>
										<div class="timeline-item">
										  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $e['tgl_post'];?></span>
										  <h3 class="timeline-header"><a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $e['id_explicit'];?>"><?php echo $e['judul_explicit'];?></a></h3>
										  <div class="timeline-body">
											<?php echo $e['keterangan'];?>
										  </div>
										  <h3 class="timeline-header"></h3>
										  <div class="timeline-footer">
											<a href="<?php echo base_url('web/detail_dokumen');?>/<?php echo $e['id_explicit'];?>" class="btn btn-primary btn-xs">Selengkapnya</a>
											<span style="float:right">
											<i class="fa fa-thumbs-o-up"></i> <?php echo $e['like'];?> menyukai &nbsp;&nbsp;&nbsp;
											<i class="fa fa-comments-o"></i> <?php echo $e['komentar'];?> komentar
											</span>
										  </div>
										</div>
									  </li>
									  <?php } ?>
									</ul>

					</div>

					<!-- An empty div which will be populated using jQuery -->
					<div id='page_navigation1'></div>
					<!---->
					
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
<script type="text/javascript"  src="<?php echo base_url();?>asset/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
	<script type="text/javascript">
		var $j = jQuery.noConflict();
		$j(document).ready(function() 
			{
				$j("font.timeago").timeago();
				$j("font.timeago1").timeago();
			});
	</script>