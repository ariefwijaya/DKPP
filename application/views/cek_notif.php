<?php foreach($cek->result_array() as $j)
{
	if($j['jml']!=0){
?>
	<?php echo $j['jml'];?>
	<?php
} }
?>