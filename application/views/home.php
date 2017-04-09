        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Halaman Utama
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
		  <div class="col-xs-12">
			<div class="col-lg-12">
				<div class="box box-solid bg-blue">
					<div class="box-header">
						<center>
						<h3 class="box-title">
						<br/>
						<b>SELAMAT DATANG DI KNOWLEDGE MANAGEMENT SYSTEM</b><br/>
						DINAS KETAHANAN PANGAN DAN PETERNAKAN PROV. SUMATERA SELATAN
						</h3>
						</center>
					</div><!-- /.box-header -->
					<div class="box-body">
					<center>
						<div class="col-lg-12">
							<img src="<?php echo base_url();?>asset/big_logo_dkpp.jpg" height="200px"></img>
							<br/>
							<br/>
							<br/>
							<form action="<?php echo base_url();?>web/search" method="post" enctype="multipart/form-data">
							<table>
								<tr>
									<td width="500px"><input type="text" name="search" placeholder="Masukkan Pencarian..." class="form-control"></td>
									<td><button type="submit" class="btn btn-flat btn-warning">Pencarian</button></td>
								</tr>
							</table>
							</form>
						</div>
					</center>
					</div>
					<br/>
				</div>
			</div>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
				<?php 
					foreach($valid_t->result_array() as $t)
					foreach($valid_e->result_array() as $e)
				?>
                  <h3><?php echo $total=$t['v_t']+$e['v_e'];?></h3>
                  <p>Posting Tervalidasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-flag"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
				<?php foreach($pengguna->result_array() as $user)?>
                  <h3><?php echo $user['poin'];?></h3>
                  <p>Poin</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-star"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
				<?php 
					foreach($disukai_t->result_array() as $t)
					foreach($disukai_e->result_array() as $e)
				?>
                <div class="inner">
                  <h3><?php echo $disukai=$t['jml']+$e['jml'];?></h3>
                  <p>Total disukai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-favorite"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
				<?php 
					foreach($reward->result_array() as $r)
				?>
                <div class="inner">
                  <h3><?php echo $r['jml'];?></h3>
                  <p>Rewards</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ribbon-b"></i>
                </div>
              </div>
            </div><!-- ./col -->
			
			
			<div class="col-xs-12">
<div class="box box-solid box-warning">
<div class="box-header">
<h3 class="box-title">Grafik Pengguna</h3>
</div><!-- /.box-header -->
<div class="box-body">
									
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        title: {
            text: 'Grafik Jumlah Posting Pengetahuan Bulanan',
            x: -20 //center
        },
        subtitle: {
            text: 'Knowledge Management System',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Posting Tervalidasi'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Posting'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Masalah dan Solusi',
            data: [
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='01'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='02'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='03'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='04'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='05'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='06'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='07'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='08'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='09'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='10'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='11'){ echo $d['jml'];}?>.0,
			<?php foreach($tc->result_array() as $d) if($d['bulan']=='12'){ echo $d['jml'];}?>.0
			]
        }, {
            name: 'Dokumen',
            data: [
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='01'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='02'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='03'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='04'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='05'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='06'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='07'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='08'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='09'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='10'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='11'){ echo $d['jml'];}?>.0,
			<?php foreach($ex->result_array() as $d) if($d['bulan']=='12'){ echo $d['jml'];}?>.0
			]
        }]
    });
});
		</script>
<script src="<?php echo base_url();?>/asset/highcharts/js/highcharts.js"></script>
<script src="<?php echo base_url();?>/asset/highcharts/js/modules/exporting.js"></script>

<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
			
			
          </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->