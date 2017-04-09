<?php 
$s=0;
foreach($tmp_gejala->result_array() as $t){?>
<!--<?php echo $t['bobot_gejala'];?><br/>-->
<?php
$bobot=$t['bobot_gejala'];
$s=$s+$bobot;
}
echo "W =".$s;?>
<br/>
<br/>
<br/>





<?php 
foreach($kasus->result_array() as $k)
{?>
<?php echo $k['nama_solusi'];?><br/>

	<?php 
	$pe=0;
	foreach($tmp_gejala->result_array() as $t){
		foreach($perbandingan->result_array() as $p)
		if($p['id_solusi']==$k['id_solusi'] && $t['nama_gejala']==$p['nama_gejala']){?>
		<!---<?php echo $p['nama_gejala'];?>=<?php echo $p['bobot_gejala'];?><br/>--->
		<?php 
		$b=$p['bobot_gejala'];
		$pe=$pe+$b;
		} 
	} 
	echo "S x W =".$pe;
	$similarity=$pe/$s;
	echo "<br/>";
	echo "Similarity =".$similarity;
	echo "<br/>";
	echo "<br/>";
} 
?>