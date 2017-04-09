<html>
<head>
<link rel="shortcut icon" href="<?php echo base_url();?>asset/dkpp.ico" />
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/js/bootstrap.js" type="text/css"/>
<title>Login KMS Dinas Ketahanan Pangan dan Peternakan</title>
<style>
    .wow:first-child {
      visibility: hidden;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>asset/wow/css/libs/animate.css">
<link rel="stylesheet" href="<?php echo base_url();?>asset/wow/css/site.css">
</head>

<body>
	<div id="background">
		<div id="login_admin" class="wow slideInLeft" data-wow-duration="1s">
			<div style="padding:20px">
				<form action="<?php echo base_url();?>web/masuk" method="post" enctype="multipart/form-data">
				<table>
				<tr>
					<td>
						<input style="width:250px;height:50px;margin:0px;" type="text" name="nip" value="" placeholder="Masukkan NIP">
						<input style="width:250px;height:50px;margin:0px;" type="password" name="password" value="" placeholder="Masukkan Password">
					</td>
				</tr>
				<tr>
					<td>
						<input style="width:250px;height:50px;margin:0px;" class="btn btn-info" type="submit" name="commit" value="Login">
					</td>
				</tr>
				</table>
				</form>
			</div>
		</div>
	<div id="dispora" class="wow fadeInDown" data-wow-delay="1s"></div>
	<div class="clear"></div>
	</div>
<script src="<?php echo base_url();?>asset/wow/dist/wow.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
</script>
</body>
</html>